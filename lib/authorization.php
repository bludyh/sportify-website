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

// Function for authorizing access to reset password page

function IsResetPasswordAccessible() {
    if (filter_input(INPUT_GET, "token") !== NULL) {        
        $result = Database::ExecuteReader("SELECT * FROM password_recovery WHERE token_key=:token_key", [":token_key" => filter_input(INPUT_GET, "token", FILTER_SANITIZE_STRING)]);
        
        if (!empty($result) && $result[0]["expire_date"] > time()) {
            return TRUE;
        }
    }
    return FALSE;
}

// Function for authorizing member session

function IsLoggedIn() {
    if (isset($_SESSION["visitor_id"], $_SESSION["last_active"]) && time() - $_SESSION["last_active"] < 1800) {
        $_SESSION["last_active"] = time();
        return TRUE;
    }
    return FALSE;
}

// Function for checking if RememberMe is enabled

function IsRememberMeEnabled() {
    if (filter_input(INPUT_COOKIE, "identifier") !== NULL && filter_input(INPUT_COOKIE, "token") !== NULL) {
        $result = Database::ExecuteReader("SELECT * FROM remember_me WHERE identifier_key=:identifier_key", [":identifier_key" => filter_input(INPUT_COOKIE, "identifier")]);

        if (!empty($result) && $result[0]["expire_date"] > time() && filter_input(INPUT_COOKIE, "token") == $result[0]["token_key"]) {
            $expireDate = strtotime("+1 week", time());

            $identifier = filter_input(INPUT_COOKIE, "identifier");
            setcookie("identifier", $identifier, $expireDate);
            $token = filter_input(INPUT_COOKIE, "token");
            setcookie("token", $token, $expireDate);

            Database::ExecuteNonQuery("UPDATE remember_me SET expire_date=:expire_date WHERE identifier_key=:identifier_key", [":expire_date" => $expireDate, ":identifier_key" => filter_input(INPUT_COOKIE, "identifier")]);
            return TRUE;
        }
    }
    return FALSE;
}