<?php
class MysqlConnect
{
   public static $DB_USER = "root";
   public static $DB_PSWD = "root";
   public static $DB_HOST = "localhost";
   public static $DB_NAME = "cryptdb";


   /**
    * This function return boolean data type.
    */
   public function connect(): object
   {
      $conn = array();
      $conn = new mysqli(MysqlConnect::$DB_HOST, MysqlConnect::$DB_USER, MysqlConnect::$DB_PSWD, MysqlConnect::$DB_NAME);

      // try {
      //    $conn = new PDO("mysql:host=" . MysqlConnect::$DB_HOST . ";port=" . MysqlConnect::$DB_PORT . ";dbname=" . MysqlConnect::$DB_NAME, MysqlConnect::$DB_USER, MysqlConnect::$DB_PSWD);
      //    // set the PDO error mode to exception
      //    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //    var_dump("Connected successfully");
      // } catch (PDOException $e) {
      //    var_dump("Connection failed: " . $e->getMessage());
      // }

      return $conn;
   }
}
