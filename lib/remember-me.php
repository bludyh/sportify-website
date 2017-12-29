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

function ValidateCookie() {
    if (isset($_COOKIE["remember-me"])) {
        $visitorId = Database::ExecuteReader("SELECT visitor_id FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["visitor_id"];
        $visitor = new Visitor(array("visitor_id" => $visitorId));
        if ($visitor->visitorId != NULL) {
            $expire = Database::ExecuteReader("SELECT expire_date FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["expire_date"];
            if ($expire > time()) {
                $token = Database::ExecuteReader("SELECT token_key FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["token_key"];
                $hashedToken = hash("sha256", $_COOKIE["token"]);
                if (hash_equals($token, $hashedToken)) {
                    return TRUE;
                }
            }
        }
    }
    return FALSE;
}
