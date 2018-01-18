<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentalHistory
 *
 * @author thanh
 */
class RentalHistory extends History {
    //put your code here
    
    private $rentalDetails;
    private $totalPrice;

    public function __construct($visitorId, $rentalDetails, $time) {
        parent::__construct($visitorId, $time);
        
        $this->rentalDetails = $rentalDetails;
        
        $total = 0;
        foreach ($this->rentalDetails as $detail) {
            $total += $detail["item"]->item_price + $detail["item"]->deposit_price;
        }
        
        $this->totalPrice = number_format((float)$total, 2, '.', '');
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function ToString() {
        $numItems = count($this->rentalDetails);
        
        $msg = $numItems . " item(s) rented from " . $this->rentalDetails[0]["item"]->store->store_name . " ";
        return $msg . parent::ToString();
    }
}
