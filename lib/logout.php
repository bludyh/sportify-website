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

if (filter_input(INPUT_COOKIE, "identifier") !== NULL && filter_input(INPUT_COOKIE, "token") !== NULL) {
    Database::ExecuteNonQuery("DELETE FROM remember_me WHERE identifier_key=:identifier_key", [":identifier_key" => filter_input(INPUT_COOKIE, "identifier")]);
    
    setcookie("identifier", "", time() - 3600);
    setcookie("token", "", time() - 3600);
}

session_destroy();

header("Location: login.php");
exit();