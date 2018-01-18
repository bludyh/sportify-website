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

$depositAmount = filter_input(INPUT_POST, "deposit-amount");

$visitor = new Visitor();
$visitor->SelectVisitorBy("visitor_id", $_SESSION["visitor_id"]);

$updatedBalance = $visitor->balance + $depositAmount;
$visitor->UpdateInfo(["balance" => $updatedBalance]);

$sql = "INSERT INTO transaction (visitor_id, transaction_amount, transaction_action, deposit_method, transaction_time) VALUES (:visitor_id, :transaction_amount, :transaction_action, :deposit_method, :transaction_time)";
$param = [
    ":visitor_id" => $visitor->visitorId,
    ":transaction_amount" => $depositAmount,
    ":transaction_action" => "DEPOSIT",
    ":deposit_method" => "ONLINE",
    ":transaction_time" => date("Y-m-d H:i:s")
];
Database::ExecuteNonQuery($sql, $param);

header("Location: dashboard.php");
exit();