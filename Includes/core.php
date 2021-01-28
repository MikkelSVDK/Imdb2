<?php
session_start();
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/config.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/database.php");

$Database = null;
try{
  $Database = new Database($DatabaseConnection["host"], $DatabaseConnection["username"], $DatabaseConnection["password"], $DatabaseConnection["database"]);
}catch(Exception $error){
  print_r($error->getMessage());
}