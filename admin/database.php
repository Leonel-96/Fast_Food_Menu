<?php
    
    class Database{

        private static $DB_HOST = "localhost";
        private static $DB_NAME = "Burger_code";
        private static $DB_USER = "root";
        private static $DB_PASSWORD = "";

        private static $connection = null;

        public static function connect(){

            try{
                self::$connection = new PDO("mysql:host=" . self::$DB_HOST .";dbname=" .self::$DB_NAME, self::$DB_USER ,self::$DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
    
                die('Error :'. $e->getMessage());
            }

            return self::$connection;
        }

        public static function disconnect(){
            self::$connection = null;
        }
    }

    Database::connect();
?>