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

$emailToCheck = filter_input(INPUT_POST, "emailToCheck", FILTER_SANITIZE_EMAIL);

$sql = "SELECT email FROM visitor WHERE email=:email";
$param = array(":email" => $emailToCheck);

if (!empty(Database::ExecuteReader($sql, $param))) {
    echo(json_encode("This email address is already used for another order!"));
}
else {
    echo("true");
}