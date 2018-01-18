<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PurchaseHistory
 *
 * @author thanh
 */
class PurchaseHistory extends History{
    //put your code here
    private $purchaseDetails;
    private $totalPrice;
    
    public function __construct($visitorId, $purchaseDetails, $time) {
        parent::__construct($visitorId, $time);
        
        $this->purchaseDetails = $purchaseDetails;
        
        $total = 0;
        foreach ($this->purchaseDetails as $detail) {
            $total += $detail["item"]->item_price * $detail["purchase_quantity"];
        }
        
        $this->totalPrice = number_format((float)$total, 2, '.', '');
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function ToString() {
        $numItems = 0;
        foreach ($this->purchaseDetails as $detail) {
            $numItems += $detail["purchase_quantity"];
        }
        
        $msg = $numItems . " item(s) purchased from " . $this->purchaseDetails[0]["item"]->store->store_name . " ";
        return $msg . parent::ToString();
    }
}
