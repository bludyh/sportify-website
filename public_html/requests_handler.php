<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (filter_input(INPUT_POST, "form-name") == "ticket-registration") {
    require("../lib/ticket_registration.php");
}