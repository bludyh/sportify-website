<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History
 *
 * @author thanh
 */
class History {
    //put your code here
    protected $visitorId;
    protected $time;
    
    protected function __construct($visitorId, $time) {
        $this->visitorId = $visitorId;
        $this->time = strtotime($time);
    }
    
    protected function ToString() {
        $msg = "at " . date("H:i:s l, d F Y", $this->time);
        return $msg;
    }
}
