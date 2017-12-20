<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author thanh
 */

class Database {    
    private static $dbInfo;
    private static $conn;
    private static $initialized = false;

    public static function Initialize() {
        if (self::$initialized) { return; }
        
        self::$dbInfo = require(dirname($_SERVER["DOCUMENT_ROOT"]) . "/lib/config.php");
        self::$initialized = true;
    }
    
    private static function Open() {
        self::Initialize();
        try {
            self::$conn = new PDO("mysql:host=" . self::$dbInfo["host"] . ";dbname=" . self::$dbInfo["name"], self::$dbInfo["user"], self::$dbInfo["pass"]);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    private static function Close() {
        self::Initialize();
        self::$conn = null;
    }
    
    public static function ExecuteScalar($sql, array $param = array()) {
        self::Initialize();
        try {
            Database::Open();
            
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($param);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        Database::Close();
        $result = $stmt->fetch()[0];
        return $result;
    }
    
    public static function ExecuteReader($sql, array $param = array()) {
        self::Initialize();
        try {
            Database::Open();
            
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($param);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        Database::Close();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public static function ExecuteNonQuery($sql, array $param = array()) {
        self::Initialize();
        try {
            Database::Open();
            
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($param);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        Database::Close();
        $result = $stmt->rowCount();
        return $result;
    }
}
