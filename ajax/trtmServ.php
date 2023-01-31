<?php
require_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/test-crypt-data/entity/CryptDecryptData.php";
$CryptDecryptData = new CryptDecryptData();

if (isset($_POST)) {
   $retour = "";
   $action = htmlspecialchars($_POST["action"]);
   $value = htmlspecialchars($_POST["val"]);
   $key = htmlspecialchars($_POST["key"]);

   if ($_POST["action"] == "E") {
      $dataCrypted = $CryptDecryptData->crypt($value, $key);
      $retour = "dataCrypted|" . $dataCrypted;
   } else if ($_POST["action"] == "D") {
      $dataCrypted = $CryptDecryptData->decrypt($value, $key);
      $retour = "dataDecrypted|" . $dataCrypted;
   }
   die($retour);
}
