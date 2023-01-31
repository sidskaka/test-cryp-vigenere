<?php
class MysqlConnect
{
   public static $DB_USER = "root";
   public static $DB_PSWD = "root";
   public static $DB_HOST = "localhost";
   public static $DB_NAME = "cryptdb";

   /**
    * This function return object
    */
   public function connect(): object
   {
      $conn = array();
      $conn = new mysqli(MysqlConnect::$DB_HOST, MysqlConnect::$DB_USER, MysqlConnect::$DB_PSWD, MysqlConnect::$DB_NAME);

      return $conn;
   }
}
