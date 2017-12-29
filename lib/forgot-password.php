<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

spl_autoload_register(function ($class_name) {
    $file = dirname($_SERVER["DOCUMENT_ROOT"]) . "/lib/classes/" . $class_name . ".php";
    if (file_exists($file)) {
        require_once($file);
    }
});

if (filter_input(INPUT_POST, "form-name") == "forgot-password") {
    $email = filter_input(INPUT_POST, "reset-email", FILTER_SANITIZE_EMAIL);
    $visitor = new Visitor();
    
    if ($visitor->SelectVisitorBy("email", $email)) {
        $token = bin2hex(random_bytes(32));
        $expireDate = strtotime("+1 day", time());
        
        $sql = "INSERT INTO password_recovery (visitor_id, token_key, expire_date) VALUES (:visitor_id, :token_key, :expire_date)";
        $param = [
            ":visitor_id" => $visitor->visitorId,
            ":token_key" => $token,
            ":expire_date" => $expireDate
        ];
        Database::ExecuteNonQuery($sql, $param);

        $fullName = $visitor->firstName . " " . $visitor->lastName;
        $resetLink = "localhost/reset-password.php?token=" . urlencode($token);
        $body = str_replace(["%fullName%", "%resetLink%"], [$fullName, $resetLink], file_get_contents("../lib/templates/reset-email.inc.html"));

        $mail = new Email("support@sportify.nl", "Team Sportify", $visitor->email, $fullName, $body, "Sportify Account Support");
        $mail->Send();
    }
    echo("ok");
}
if (filter_input(INPUT_POST, "form-name") == "reset-password") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $newPassword = filter_input(INPUT_POST, "new-password", FILTER_SANITIZE_STRING);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
    $visitor = new Visitor();
    
    if ($visitor->SelectVisitorBy("email", $email)) {
        $expireDate = Database::ExecuteReader("SELECT expire_date FROM password_recovery WHERE visitor_id=:visitor_id", [":visitor_id" => $visitor->visitorId])[0]["expire_date"];
        
        if ($expireDate > time()) {
            $visitor->UpdateInfo(["password" => $hashedPassword]);
            Database::ExecuteNonQuery("DELETE FROM password_recovery WHERE visitor_id=:visitor_id", [":visitor_id" => $visitor->visitorId]);
            echo("ok");
        }
        else {
            echo("expired");
        }
    }
    else {
        echo("error");
    }
    
}