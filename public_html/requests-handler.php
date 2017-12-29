<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!empty($_POST)) {
    if (isset($_POST["emailToCheck"])) {
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
        require("../lib/login.php");
    }
}
else {
    header("Location: index.php");
}
