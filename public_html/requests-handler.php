<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!empty(filter_input_array(INPUT_POST))) {
    if (filter_input(INPUT_POST, "emailToCheck") !== NULL) {
        require("../lib/check-email.php");
    }

    if (filter_input(INPUT_POST, "form-name") == "ticket-registration") {
        require("../lib/ticket-registration.php");
    }

    if (filter_input(INPUT_POST, "form-name") == "forgot-password") {
        require("../lib/forgot-password.php");
    }

    if (filter_input(INPUT_POST, "form-name") == "reset-password") {
        require("../lib/forgot-password.php");
    }
    if (filter_input(INPUT_POST, "form-name") == "login") {
        require("../lib/authentication.php");
    }
    if (filter_input(INPUT_POST, "form-name") == "logout") {
        require("../lib/logout.php");
    }
}
else {
    header("Location: index.php");
    exit();
}
