<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckingHistory
 *
 * @author thanh
 */
class CheckingHistory extends History {
    //put your code here
    private $checkingAction;
    private $checkingLocation;
    
    public function __construct($visitorId, $checkingAction, $checkingLocation, $time) {
        parent::__construct($visitorId, $time);
        
        $this->checkingAction = $checkingAction;
        $this->checkingLocation = $checkingLocation;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function ToString($full = TRUE) {
        $msg = "Checked ";
        
        if ($this->checkingAction === "IN") {
            $msg .= "in ";
        }
        else {
            $msg .= "out ";
        }
        
        if ($this->checkingLocation === "ENTRANCE") {
            $msg .= "Entrance ";
        }
        else {
            $msg .= "Campsite ";
        }
        
        if ($full) {
            return $msg . parent::ToString();
        }
        else {
            return $msg;
        }
    }
}
