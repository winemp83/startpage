<?php
namespace System;

class search{
	private $user_name = array();
	private $user_id = array();
	private $user = array();
	
	public function __construct(){
		$result = $GLOBALS['DB']->query("SELECT * FROM uni1_users ORDER BY username ASC ");
		foreach($result as $data){
			array_push($this->user_name, $data['username']);
			array_push($this->user_id, $data['id']);
		}
	}
	
	public function getAll(){
		$array = array();
		for($i = 0; $i < count($this->user_name); $i++){
			$array = array('user' => $this->user_name[$i], 'id' => $this->user_id[$i]);
			array_push($this->user, $array);
		}
		return $this->user;
	}	
}
?>