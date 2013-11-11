<?php
namespace System;

class ownwall{
	private $wall;
	private $all;
	private $friends;
	private $allow;
	
	public function getWall($owner){
		$this->getOptions($owner);
		$this->wall = $GLOBALS['DB']->query("SELECT * FROM uni1_wall WHERE owner='".$owner."'");
		$array_user = array();
		$array_msg = array();
		$array_time = array();
		foreach($this->wall as $data){
			$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$data['poster']."'");
			foreach($result as $Data){
				array_push($array_user, $Data['username']);
			}
			array_push($array_msg, $data['wall']);
			array_push($array_time, $data['time']);
		}
		$msg = '';
		for($i = 0; $i < count($this->wall); $i++){
			$msg .= '<div id="message" width="100%;" align="center">';
			$msg .= '<table width="75%" frame="void">';
			$msg .= '<tr><td style="text-align:left;width:50%;">';
			$msg .= $array_user[$i];
			$msg .= '</td><td style="text-align:right;width:50%;">';
			if((time()-(60*60*24)) > $array_time[$i]){
				$msg .= date("d.m.Y", $array_time[$i]);
			}
			else{
				$help = (time()) - $array_time[$i];
				if($help > 60*60){
					$msg .= date("H:i:s", $help).'<br/>';
				}
				else{
					$msg .= date("i:s", $help).'<br/>';
				}
			}
			$msg .= '</td></tr><tr><td colspan="2" style="text-align:center;">';
			$msg .= $array_msg[$i];
			$msg .= '</td></tr></table>';
			$msg .= '</div>';
			$text = $GLOBALS['BBCode']->parse($msg);
			
		}
		return $text;
	}
	
	public function setWall($owner, $text){
		$this->getOptions();
		if($this->all == 1){
			$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', wall='".$GLOBALS['DB']->escape($text)."', poster='".$_SESSION['id']."', time='".time()."'");
		}
		elseif($this->friends == 1){
			$result = $GLOBALS['DB']->query("SELECT * FROM uni1_buddy WHERE sender='".$owner."' AND owner='".$_SESSION['id']."'");
			if(empty($result)){
				$result = $GLOBALS['DB']->query("SELECT * FROM uni1_buddy WHERE owner='".$owner."' AND sender='".$_SESSION['id']."'");
				if(empty($result)){
					return false;
				}
			}
			if(count($result) >= 1){
				$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', wall='".$GLOBALS['DB']->escape($text)."', poster='".$_SESSION['id']."', time='".time()."'");
			}
		}
		else{
			if($owner == $_SESSION['id']){
				$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', wall='".$GLOBALS['DB']->escape($text)."', poster='".$_SESSION['id']."', time='".time()."'");
			}
			else{
				return false;
			}
		}
		if($GLOBALS['DB']->lastSQLStatus){
			return true;
		}
		else{
			print_r($GLOBALS['DB']->lastSQLStatus);
			return false;
		}
	}
	
	public function setOptions($owner, $friends, $all){
		foreach($this->wall_setings as $data){
			($data['is_allow'] == 1)? $allow = true : $allow = false;
			($data['is_all'] == 1)? $all_s = true : $all = false;
			($data['is_friends'] == 1)? $friends_s = true : $friends = false;
		}
		if(($friends == true && $friends_s == false) || ($friends == false && $friends_s == true)){
			if($friends){
				$GLOBALS['DB']->query("UPDATE uni1_wall_settings SET is_friends='1' WHERE id='".$owner."'");
			}
			else{
				$GLOBALS['DB']->query("UPDATE uni1_wall_settings SET is_friends='0' WHERE id='".$owner."'");
			}
		}
		if(($all == true && $all_s == false) || ($all == false && $all_s == true)){
			if($friends){
				$GLOBALS['DB']->query("UPDATE uni1_wall_settings SET is_all='1' WHERE id='".$owner."'");
			}
			else{
				$GLOBALS['DB']->query("UPDATE uni1_wall_settings SET is_all='0' WHERE id='".$owner."'");
			}
		}
	}
	
	public function getOptions($owner){
		$result = $GLOBALS['DB']->query("SELECT * FROM uni1_wall_settings WHERE id='".$owner."'");
		if(empty($result)){
			$GLOBALS['DB']->query("INSERT INTO uni1_wall_settings SET id='".$owner."'");
			$result = $GLOBALS['DB']->query("SELECT * FROM uni1_wall_settings WHERE id='".$owner."'");
		}
		foreach($result as $data){
			$this->all = $data['is_all'];
			$this->friends = $data['is_friends'];
			$this->allow = $data['is_allow'];
		}
	}
}
?>