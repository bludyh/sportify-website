<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activity
 *
 * @author thanh
 */
class Activity {
    //put your code here
    
    public $activities;
    
    public function __construct($visitorId) {
        $this->activities = [];
        
        // Get all visitor's activities
        $this->GetActivities("checking_history", $visitorId);
        $this->GetActivities("purchase", $visitorId);
        $this->GetActivities("rental", $visitorId);
        $this->GetActivities("transaction", $visitorId);
        
        // Sort activities by time
        usort($this->activities, function($a, $b) {
            return strcmp($b->time, $a->time);
        });
    }
    
    private function GetActivities($tableName, $visitorId) {
        $result = Database::ExecuteReader("SELECT * FROM " . $tableName . " WHERE visitor_id=:visitor_id", [":visitor_id" => $visitorId]);
        
        if ($tableName === "checking_history") {
            for ($i = 0; $i < count($result); $i++) {
                $this->activities[] = new CheckingHistory($visitorId, $result[$i]["checking_action"], $result[$i]["checking_location"], $result[$i]["checking_time"]);
            }
        }
        else if ($tableName === "purchase") {
            $purchases = [];
            
            for ($i = 0; $i < count($result); $i++) {
                $item = (object) Database::ExecuteReader("SELECT * FROM item WHERE item_id=:item_id", [":item_id" => $result[$i]["item_id"]])[0];
                $item->store = (object) Database::ExecuteReader("SELECT * FROM store WHERE store_id=:store_id", [":store_id" => $item->store_id])[0];
                
                $purchases[$result[$i]["purchase_time"]][] = [
                    "item" => $item,
                    "purchase_quantity" => $result[$i]["purchase_quantity"]
                ];                
            }
            
            foreach ($purchases as $time => $purchaseDetails) {
                $this->activities[] = new PurchaseHistory($visitorId, $purchaseDetails, $time);
            }
        }
        else if ($tableName === "rental") {
            $rentals = [];
            
            for ($i = 0; $i < count($result); $i++) {
                $item = (object) Database::ExecuteReader("SELECT * FROM item WHERE item_id=:item_id", [":item_id" => $result[$i]["item_id"]])[0];
                $item->store = (object) Database::ExecuteReader("SELECT * FROM store WHERE store_id=:store_id", [":store_id" => $item->store_id])[0];
                
                $rentals[$result[$i]["rent_time"]][] = [
                    "item" => $item,
                    "return_time" => $result[$i]["return_time"]
                ];
            }
            
            foreach ($rentals as $time => $rentalDetails) {
                $this->activities[] = new RentalHistory($visitorId, $rentalDetails, $time);
            }
        }
        else if ($tableName === "transaction") {
            for ($i = 0; $i < count($result); $i++) {
                $this->activities[] = new TransactionHistory($visitorId, $result[$i]["transaction_amount"], $result[$i]["transaction_action"], $result[$i]["deposit_method"], $result[$i]["transaction_time"]);
            }
        }
    }
}
