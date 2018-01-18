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

$newPassword = filter_input(INPUT_POST, "new-password", FILTER_SANITIZE_STRING);
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$visitor = new Visitor();
$visitor->SelectVisitorBy("visitor_id", $_SESSION["visitor_id"]);
$visitor->UpdateInfo(["password" => $hashedPassword]);

Database::ExecuteNonQuery("DELETE FROM remember_me WHERE visitor_id=:visitor_id", [":visitor_id" => $_SESSION["visitor_id"]]);

echo("ok");
