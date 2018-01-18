<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

spl_autoload_register(function ($class_name) {
    $file = dirname(filter_input(INPUT_SERVER, "DOCUMENT_ROOT")) . "/lib/classes/" . $class_name . ".php";
    if (file_exists($file)) {
        require_once($file);
    }
});
//require_once "../lib/random_compat/lib/random.php"; //Use random_compat library for PHP 5.x

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$rememberMe = filter_input(INPUT_POST, "remember-me");

$visitor = new Visitor();

if ($visitor->SelectVisitorBy("email", $email) && password_verify($password, $visitor->password)) {
    $_SESSION["visitor_id"] = $visitor->visitorId;
    $_SESSION["last_active"] = time();
    
    if ($rememberMe == 1) {
        $identifier = bin2hex(random_bytes(6));
        $token = bin2hex(random_bytes(32));
        $expireDate = strtotime("+1 week", time());

        setcookie("identifier", $identifier, $expireDate);
        setcookie("token", $token, $expireDate);

        $sql = "INSERT INTO remember_me (visitor_id, identifier_key, token_key, expire_date) VALUES (:visitor_id, :identifier_key, :token_key, :expire_date)";
        $param = [
            ":visitor_id" => $visitor->visitorId, 
            ":identifier_key" => $identifier, 
            ":token_key" => $token, 
            ":expire_date" => $expireDate
        ];
        Database::ExecuteNonQuery($sql, $param);
    }
    echo("ok");
}