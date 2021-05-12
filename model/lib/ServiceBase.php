<?php

class ServiceBase {

    protected static $db;

    public function __construct() {
        $dbhost     = "localhost";
        $dbname     = "certificate";
        $dbuser     = "root";
        $dbpass     = "password";
        $dbdriver   = "mysql";

        try {
            self::$db = new PDO("$dbdriver:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            echo json_encode(array('message' => 'Connection error: ' . $e->getMessage()));			
        }
    }

    public static function connect() {
        if (!self::$db) {
            new ServiceBase();
        }

        return self::$db;
    }

    public static function error($e, $method) {
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $today = new DateTime("now", $timezone);

        $day = $today->format("Y_m_d");
        $hour = $today->format("H:i:s");
        
        file_put_contents("../logs/error_".$day.".log", $hour." --> ".$e->getMessage()."\n".$method." in line ".$e->getLine()."\n", FILE_APPEND);
        echo json_encode(array('message' => 'We can`t continue.'));
    }

}

?>