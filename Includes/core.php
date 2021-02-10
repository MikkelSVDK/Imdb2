<?php
session_start();
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/config.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/database.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/user.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/comment.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/writer.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/star.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/Genre.php");
require(realpath($_SERVER["DOCUMENT_ROOT"])."/includes/classes/movie.php");

$Database = null;
try{
  $Database = new Database($DatabaseConnection["host"], $DatabaseConnection["username"], $DatabaseConnection["password"], $DatabaseConnection["database"]);
}catch(Exception $error){
  print_r($error->getMessage());
}
$User = null;
if(isset($_SESSION["uid"])){
  $User = new User($Database);
  try{
    $User->Get($_SESSION["uid"]);
  }catch(Exception $error){
    print_r($error->getMessage());
  }
}