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

Database::ExecuteNonQuery("DELETE FROM password_recovery WHERE expire_date < :now", array(":now" => time()));