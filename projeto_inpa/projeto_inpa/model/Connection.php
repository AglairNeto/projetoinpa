<?php

class Connection {
  public static function open (){

      $host = 'mysql:host=localhost;dbname=projeto_inpa';
      $user = 'root';
      $password = 'root';

      $conn = new PDO($host,$user,$password);
      return $conn;
  }
}
?>
