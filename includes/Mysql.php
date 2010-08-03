<?php

require_once 'includes/constants.php';

class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('No se pudo conectar a la base de datos.');
	}
	
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT *
				FROM admin
				WHERE user_login = ? AND user_password = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
		
	}
}