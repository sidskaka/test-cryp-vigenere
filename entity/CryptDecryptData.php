<?php
require_once "interface/cipher.php";

class CryptDecryptData implements Cipher
{
   public static $TAB = ["A" => 0, "B" => 1, "C" => 2, "D" => 3, "E" => 4, "F" => 5, "G" => 6, "H" => 7, "I" => 8, "J" => 9, "K" => 10, "L" => 11, "M" => 12, "N" => 13, "O" => 14, "P" => 15, "Q" => 16, "R" => 17, "S" => 18, "T" => 19, "U" => 20, "V" => 21, "W" => 22, "X" => 23, "Y" => 24, "Z" => 25];
   /**
    * This function return string data type.
    *
    * @param string $publicdata
    * @param string $privatekey
    */
   public function crypt($publicdata, $privatekey): string
   {

      //global $TAB;
      // Compléter le tableau de clé
      $key = strlen($publicdata) > strlen($privatekey) ? str_pad($privatekey, strlen($publicdata), $privatekey) : $privatekey;

      // Transformer les données en tableau
      $key = str_split($key);
      $public = str_split($publicdata);
      $secret = array();

      for ($i = 0; $i < count($public); $i++) {
         $long = CryptDecryptData::$TAB[$public[$i]] + CryptDecryptData::$TAB[$key[$i]];
         if ($long > 25) {
            $res = $long - 25 - 1;
            foreach (CryptDecryptData::$TAB as $k => $v) {
               if ($v == $res) {
                  array_push($secret, CryptDecryptData::$TAB[$k]);
               }
            }
         } else {
            array_push($secret, $long);
         }
      }

      $SECRETKEY = array();
      foreach ($secret as $k => $v) {
         foreach (CryptDecryptData::$TAB as $kk => $vv) {
            if ($vv == $v) {
               array_push($SECRETKEY, $kk);
            }
         }
      }
      //var_dump($secret);

      return implode("", $SECRETKEY);
   }
   /**
    * This function must return string.
    *
    * @param null
    */
   public function decrypt($publicdata, $privatekey): string
   {
      // Compléter le tableau de clé
      $key = strlen($publicdata) > strlen($privatekey) ? str_pad($privatekey, strlen($publicdata), $privatekey) : $privatekey;

      // Transformer les données en tableau
      $key = str_split($key);
      $public = str_split($publicdata);
      $secret = array();

      for ($i = 0; $i < count($public); $i++) {
         $long = CryptDecryptData::$TAB[$public[$i]] - CryptDecryptData::$TAB[$key[$i]];
         if ($long < 0) {
            $res = $long + 25 + 1;
            foreach (CryptDecryptData::$TAB as $k => $v) {
               if ($v == $res) {
                  array_push($secret, CryptDecryptData::$TAB[$k]);
               }
            }
         } else {
            array_push($secret, $long);
         }
      }

      $SECRETKEY = array();
      foreach ($secret as $k => $v) {
         foreach (CryptDecryptData::$TAB as $kk => $vv) {
            if ($vv == $v) {
               array_push($SECRETKEY, $kk);
            }
         }
      }

      return implode("", $SECRETKEY);
   }
}
