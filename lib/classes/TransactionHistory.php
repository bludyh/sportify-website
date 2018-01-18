<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransactionHistory
 *
 * @author thanh
 */
class TransactionHistory extends History {
    //put your code here
    
    private $transactionAmount;
    private $transactionAction;
    private $depositMethod;
    
    public function __construct($visitorId, $transactionAmount, $transactionAction, $depositMethod, $time) {
        parent::__construct($visitorId, $time);
        
        $this->transactionAmount = $transactionAmount;
        $this->transactionAction = $transactionAction;
        $this->depositMethod = $depositMethod;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function ToString() {
        $msg = "";
        
        if ($this->transactionAction === "DEPOSIT") {
            $msg .= "Deposited ";
        }
        else {
            $msg .= "Withdrew ";
        }
        
        $msg .= "€" . $this->transactionAmount . " ";
        
        return $msg . parent::ToString();
    }
}
