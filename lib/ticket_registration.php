<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require("../lib/classes/Database.php");
require("../lib/classes/Email.php");

function GeneratePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $pass[] = $alphabet[random_int(0, $alphaLength)];
    }
    return implode($pass); //turn the array into a string
}

$numberOfTickets = filter_input(INPUT_POST, "number-tickets", FILTER_SANITIZE_STRING);

for ($i = 0; $i < $numberOfTickets; $i++) {
    
    //Prepare information to be inserted into table visitor
    
    $ticketId = Database::ExecuteReader("SELECT ticket_id FROM ticket WHERE ticket_price IS NULL")[0]["ticket_id"];     //Assign visitor an available ticket
    $spotId = null;
    $firstName = filter_input(INPUT_POST, "firstname-" . ($i + 1), FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, "lastname-" . ($i + 1), FILTER_SANITIZE_STRING);
    $birthday = filter_input(INPUT_POST, "birthday-" . ($i + 1), FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email-" . ($i + 1), FILTER_SANITIZE_EMAIL);
    $password = GeneratePassword();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    //Insert visitor information into table visitor
    
    $sql = "INSERT INTO visitor (ticket_id, spot_id, first_name, last_name, birthday, email, password) VALUES (:ticket_id, :spot_id, :first_name, :last_name, :birthday, :email, :password)";
    $param = array(":ticket_id" => $ticketId, ":spot_id" => $spotId, ":first_name" => $firstName, ":last_name" => $lastName, ":birthday" => $birthday, ":email" => $email, ":password" => $hashed_password);
    Database::ExecuteNonQuery($sql, $param);
    
    //Update table ticket
    
    Database::ExecuteNonQuery("UPDATE ticket SET ticket_price=55.00 WHERE ticket_id=:ticket_id", array(":ticket_id" => $ticketId));
    
    //Prepare information to be sent to visitor via email
    
    $fullName = $firstName . " " . $lastName;
    $qrcode = "https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=" . $ticketId ."&amp;choe=UTF-8";
    if ($spotId != null) {
        $foo = Database::ExecuteReader("SELECT spot_id, location FROM camping_spot WHERE spot_id=:spot_id", array(":spot_id" => $spotId));
        $campingSpot = "Spot No." . $foo[0]["spot_id"] . ", " . ucfirst($foo[0]["location"]);
    }
    else {
        $campingSpot = "None";
    }
    
    //Send email

    $mail = new Email($fullName, $email, $password, $ticketId, $qrcode, $campingSpot);
}
echo("You have successfully ordered " . $numberOfTickets . " tickets!");