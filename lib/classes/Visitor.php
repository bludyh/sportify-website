<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Visitor
 *
 * @author thanh
 */

class Visitor {
    //put your code here
    private $visitorId;
    private $ticketId;
    private $rfid;
    private $spotId;
    private $firstName;
    private $lastName;
    private $birthday;
    private $email;
    private $password;
    private $phone;
    private $balance;
            
    function __construct($ticketId = null, $spotId = null, $firstName = null, $lastName = null, $birthday = null, $email = null, $password = null, $phone = null) {
        $args = func_get_args();
        if (!empty($args)) {
            $this->ticketId = $ticketId;
            $this->spotId = $spotId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthday = $birthday;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            
            $sql = "INSERT INTO visitor (ticket_id, spot_id, first_name, last_name, birthday, email, password, phone) VALUES (:ticket_id, :spot_id, :first_name, :last_name, :birthday, :email, :password, :phone)";
            $param = [
                ":ticket_id" => $this->ticketId, 
                ":spot_id" => $this->spotId, 
                ":first_name" => $this->firstName, 
                ":last_name" => $this->lastName, 
                ":birthday" => $this->birthday, 
                ":email" => $this->email,
                ":password" => $this->password,
                ":phone" => $this->phone
            ];
            Database::ExecuteNonQuery($sql, $param);
        }
    }
    
    function __get($name) {
        return isset($this->$name) ? $this->$name : null;
    }
    
    function SelectVisitorBy($columnName, $value) {
        $sql = "SELECT * FROM visitor WHERE " . $columnName . "=:value";
        $param = [":value" => $value];
        $result = Database::ExecuteReader($sql, $param);
        
        if (sizeof($result) > 0) {
            $this->visitorId = $result[0]["visitor_id"];
            $this->ticketId = $result[0]["ticket_id"];
            $this->rfid = $result[0]["rfid"];
            $this->spotId = $result[0]["spot_id"];
            $this->firstName = $result[0]["first_name"];
            $this->lastName = $result[0]["last_name"];
            $this->birthday = $result[0]["birthday"];
            $this->email = $result[0]["email"];
            $this->password = $result[0]["password"];
            $this->phone = $result[0]["phone"];
            $this->balance = $result[0]["balance"];
            
            return TRUE;
        }
        return FALSE;
    }
    
    function UpdateInfo($args = array()) {
        foreach ($args as $k => $v) {
            $sql = "UPDATE visitor SET " . $k . "=:value WHERE visitor_id=:visitor_id";
            $param = [
                ":value" => $v,
                ":visitor_id" => $this->visitorId
            ];
            Database::ExecuteNonQuery($sql, $param);
        }
    }
    
    function Delete() {
        $sql = "DELETE FROM visitor WHERE visitor_id=:visitor_id";
        $param = [":visitor_id" => $this->visitorId];
        Database::ExecuteNonQuery($sql, $param);
    }
    
}
