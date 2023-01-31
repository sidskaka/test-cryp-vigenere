<?php
interface Cipher
{
   public function crypt(string $publicdata, string $privatekey): string;
   public function decrypt(string $publicdata, string $privatekey): string;
}
