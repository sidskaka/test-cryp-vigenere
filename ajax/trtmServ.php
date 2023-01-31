<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/test-crypt-data/entity/CryptDecryptData.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/test-crypt-data/services/dbconnect.php";

$CryptDecryptData = new CryptDecryptData();

if (isset($_POST)) {
   $retour = "";
   $action = htmlspecialchars($_POST["action"]);
   $value = htmlspecialchars($_POST["val"]);
   $key = htmlspecialchars($_POST["key"]);
   $status = htmlspecialchars($_POST["status"]);
   $connectRet = "";
   $date = date("Y-m-d H:i:s");
   $ip = $_SERVER["REMOTE_ADDR"];

   // Initialize the database connexion
   $conn = new MysqlConnect();

   // Check if they haven't error
   if ($conn->connect()->connect_error) {
      $retour = "retour=Erreur connexion base|";
   }

   // Verify the request action
   if ($_POST["action"] == "C") {
      // Call the crypt method
      $dataCrypted = $CryptDecryptData->crypt($value, $key);
      $retour .= "dataCrypted=" . $dataCrypted;

      // Insert data for the history
      $sql = "INSERT INTO `historytab` (datedb, cledb, actiondb, statusdb, ipdb) VALUES ('" . $date . "','" . $key . "','" . $action . "','" . $status . "','" . $ip . "')";
      $res = $conn->connect()->query($sql);
   } else if ($_POST["action"] == "D") {
      // Call the decrypt method
      $dataCrypted = $CryptDecryptData->decrypt($value, $key);
      $retour .= "dataDecrypted=" . $dataCrypted;

      // Insert data for the history
      $sql = "INSERT INTO `historytab` (datedb, cledb, actiondb, statusdb, ipdb) VALUES ('" . $date . "','" . $key . "','" . $action . "','" . $status . "','" . $ip . "')";
      $res = $conn->connect()->query($sql);
   }
   // Close the connexion
   $conn->connect()->close();

   die($retour);
}
