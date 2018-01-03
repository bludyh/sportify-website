<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
spl_autoload_register(function ($class_name) {
    $file = dirname(filter_input(INPUT_SERVER, "DOCUMENT_ROOT")) . "/lib/classes/" . $class_name . ".php";
    if (file_exists($file)) {
        require_once($file);
    }
});

function GeneratePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $pass[] = $alphabet[random_int(0, $alphaLength)];
    }
    return implode($pass); //turn the array into a string
}

$numberOfTickets = filter_input(INPUT_POST, "number-tickets", FILTER_SANITIZE_NUMBER_INT);
$noAvailTickets = Database::ExecuteScalar("SELECT COUNT(*) FROM ticket WHERE ticket_price IS NULL");

if ($noAvailTickets < $numberOfTickets) {
    echo ("Sorry! We only have " . $noAvailTickets . " ticket(s) left");
}
else {
    try {
        for ($i = 0; $i < $numberOfTickets; $i++) {

            //Get visitor information from POST form

            $ticketId = Database::ExecuteReader("SELECT ticket_id FROM ticket WHERE ticket_price IS NULL")[0]["ticket_id"];     //Assign visitor an available ticket
            $spotId = filter_input(INPUT_POST, "spotid", FILTER_SANITIZE_NUMBER_INT);
            $firstName = filter_input(INPUT_POST, "firstname-" . ($i + 1), FILTER_SANITIZE_STRING);
            $lastName = filter_input(INPUT_POST, "lastname-" . ($i + 1), FILTER_SANITIZE_STRING);
            $birthday = filter_input(INPUT_POST, "birthday-" . ($i + 1), FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email-" . ($i + 1), FILTER_SANITIZE_EMAIL);
            $phone = filter_input(INPUT_POST, "phone-" . ($i + 1), FILTER_SANITIZE_STRING);
            $password = GeneratePassword();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //Create visitor object and insert information into table visitor

            $visitor = new Visitor($ticketId, $spotId, $firstName, $lastName, $birthday, $email, $hashedPassword, $phone);

            //Update table ticket

            Database::ExecuteNonQuery("UPDATE ticket SET ticket_price=55.00 WHERE ticket_id=:ticket_id", array(":ticket_id" => $visitor->ticketId));

            //Update table camping_spot

            $spotPrice = $numberOfTickets * 20 + 10;
            Database::ExecuteNonQuery("UPDATE camping_spot SET spot_price=:spot_price WHERE spot_id=:spot_id", array(":spot_price" => $spotPrice, ":spot_id" => $visitor->spotId));

            //Prepare information to be sent to visitor via email

            $fullName = $visitor->firstName . " " . $visitor->lastName;
            $qrcode = "https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=" . $visitor->ticketId ."&amp;choe=UTF-8";
            if ($visitor->spotId != null) {
                $foo = Database::ExecuteReader("SELECT spot_id, location FROM camping_spot WHERE spot_id=:spot_id", array(":spot_id" => $visitor->spotId));
                $campingSpot = "Spot No." . $foo[0]["spot_id"] . ", " . $foo[0]["location"];
            }
            else {
                $campingSpot = "None";
            }
            $body = str_replace(array("%fullName%", "%email%" , "%password%", "%ticketId%", "%url%", "%campingSpot%"), array($fullName, $visitor->email, $password, $visitor->ticketId, $qrcode, $campingSpot), file_get_contents("../lib/templates/email.inc.html"));
            $ticket = str_replace(array("%fullName%", "%email%" , "%password%", "%ticketId%", "%url%", "%campingSpot%"), array($fullName, $visitor->email, $password, $visitor->ticketId, $qrcode, $campingSpot), file_get_contents("../lib/templates/ticket.inc.html"));

            //Send email

            $mail = new Email("ticket@sportify.nl", "Team Sportify", $visitor->email, $fullName, $body, "Sportify Festival 2018", $ticket);
            $mail->Send();

            $response = "ok";
        }
    }
    catch (Exception $e) {
        $response = "Some thing went wrong! Please try again later";
    }
    finally {
        echo($response);
    }
}