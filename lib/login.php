<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

spl_autoload_register(function ($class_name) {
    $file = dirname($_SERVER["DOCUMENT_ROOT"]) . "/lib/classes/" . $class_name . ".php";
    if (file_exists($file)) {
        require_once($file);
    }
});

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$rememberMe = filter_input(INPUT_POST, "remember-me");

$visitor = new Visitor();

if ($visitor->SelectVisitorBy("email", $email)) {
    if (password_verify($password, $visitor->password)) {
        if ($rememberMe == 1) {
            $identifier = bin2hex(random_bytes(6));
            $token = bin2hex(random_bytes(32));
            $expireDate = strtotime("+1 week", time());

            setcookie("remember-me", TRUE, $expireDate);
            setcookie("identifer", $identifier, $expireDate);
            setcookie("token", $token, $expireDate);
            setcookie("expire-date", $expireDate, $expireDate);

            $sql = "INSERT INTO auth_tokens (visitor_id, identifier, token_key, expire_date) VALUES (:visitor_id, :identifier, :token_key, :expire_date)";
            $param = array(":visitor_id" => $visitor->visitorId, ":identifier" => $identifier, ":token_key" => hash("sha256", $token), ":expire_date" => $expireDate);
            Database::ExecuteNonQuery($sql, $param);
        }
        echo("ok");
    }
}