<?php
 $server='localhost';
 $username = 'root';
 $password = '';
 $database = 'aplicacion2';


  try{
    $conect = new PDO("mysql:host=$server;dbname=$database;",$username, $password);

  } catch (PDOException $e) {
     die ('Conexion fallida:' .$e->getMessage());
  }


?>