<?php
class Database {
  private $Conn;
  
  public function Query($query, $type, &...$params) {
	$stmt = $this->Conn->prepare($query);
	call_user_func_array(array($stmt, "bind_param"), array_merge([$type], $params));
	$stmt->execute();
	return $stmt->get_result();
  }
  
  public function GetLastInsertedId(){
	return $this->Conn->insert_id;
  }
  
  public function __construct($host, $username, $password, $database, $port = 3306){
	$conn = new mysqli($host, $username, $password, $database, $port);
	$conn->set_charset("utf8mb4");
	if($conn->connect_errno)
	  throw new Exception($conn->connect_error);
	
	$this->Conn = $conn;
  }
}