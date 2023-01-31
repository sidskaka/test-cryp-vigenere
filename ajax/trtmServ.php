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

   // DB data
   $date = date("Y-m-d H:i:s");
   $ip = $_SERVER["REMOTE_ADDR"];

   $conn = new MysqlConnect();

   if ($conn->connect()->connect_error) {
      $retour = "retour=Erreur connexion base|";
   }

   if ($_POST["action"] == "C") {
      $dataCrypted = $CryptDecryptData->crypt($value, $key);
      $retour .= "dataCrypted=" . $dataCrypted;

      $sql = "INSERT INTO `historytab` (datedb, cledb, actiondb, statusdb, ipdb) VALUES ('" . $date . "','" . $key . "','" . $action . "','" . $status . "','" . $ip . "')";
      $res = $conn->connect()->query($sql);
   } else if ($_POST["action"] == "D") {
      $dataCrypted = $CryptDecryptData->decrypt($value, $key);
      $retour .= "dataDecrypted=" . $dataCrypted;

      $sql = "INSERT INTO `historytab` (datedb, cledb, actiondb, statusdb, ipdb) VALUES ('" . $date . "','" . $key . "','" . $action . "','" . $status . "','" . $ip . "')";
      $res = $conn->connect()->query($sql);
   }

   die($retour);
}
