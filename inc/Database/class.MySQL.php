<?php
namespace SYSTEM\Database;

class MySQL{
	public $MySQLiObj;
	public $lastSQLQuery;
	public $lastSQLStatus;
	
	public function __construct($server, $user, $password, $db, $port){
		$this->MySQLiObj = new \mysqli($server, $user, $password, $db, $port);
		if(mysqli_connect_errno()){
			echo "Keine Verbindung zur Datenbank möglich.";
			trigger_error("MySQL-Connection-Error", E_USER_ERROR);
			die();
		}
		
		$this->query("SET NAMES utf8");
	}
	
	public function __destruct(){
		$this->MySQLiObj->close();
	}
	
	public function query($sqlQuery, $resultset = false){
		$this->lastSQLQuery = $sqlQuery;
		$result = $this->MySQLiObj->query($sqlQuery);
		if($resultset == true){
			if($result == false){
				$this->lastSQLStatus = false;
			}
			else{
				$this->lastSQLStatus = true;
			}
			
			return $result;
		}
		
		$return = $this->makeArrayResult($result);
		return $return;
	}
	
	public function lastSQLError(){
		$return = $this->MySQLiObj->error;
		$return .= '</br>'.$this->MySQLiObj->errno;
		return $return;
	}
	
	private function makeArrayResult($resultObj){
		if($resultObj === false){
			$this->lastSQLStatus = false;
			return false;
		}
		elseif ($resultObj === true) {
			$this->lastSQLStatus = true;
			return true;
		}
		elseif ($resultObj->num_rows == 0) {
			$this->lastSQLStatus = true;
			return array();
		}
		else{
			$array = array();
			while($line = $resultObj->fetch_array(MYSQLI_ASSOC)){
				array_push($array, $line);
			}
			$this->lastSQLStatus = true;
			return $array;
		}
	}
	
}
?>