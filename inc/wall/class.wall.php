<?php
namespace System;

class wall{
	private $wall;
	private $wall_settings;
	public function __construct(){
		$this->wall = $GLOBALS['DB']->query("SELECT * FROM uni1_wall WHERE owner='".$_POST['id']."'");
		$result = $GLOBALS['DB']->query("SELECT COUNT(id) FROM uni1_wall_settings WHERE id='".$_POST['id']."'");
		foreach($result as $data){
			if($data['COUNT(id)'] == 0){
				$msg = "[b]Herzlich Willkommen,[/b]<br/>Bitte Prüfe die [url='http://www.spaceoflegends.de/index.php?page=option']Einstellungen[/url] der Wall!<br/> Standartmäßig darf jeder Angemeldete User an deine Wall Posten!";
				$GLOBALS['DB']->query("INSERT INTO uni1_wall_settings SET id='".$_POST['id']."'");
				$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$_POST['id']."', poster='1', time='".time()."', wall='".$msg."'");
			}
		}
		$this->wall_settings = $GLOBALS['DB']->query("SELECT * FROM uni1_wall_settings WHERE id='".$_POST['id']."'");
	}
	
	public function getWall(){
		$array_user = array();
		$array_msg = array();
		$array_time = array();
		foreach($this->wall as $data){
			array_push($array_user, $data['poster']);
			array_push($array_msg, $data['wall']);
			array_push($array_time, $data['time']);
		}
		$msg = '';
		for($i = 0; $i < count($array_time); $i++){
			$msg .= '<div id="message">';
			$msg .= $array_user[$i];
			if((time()-(60*60*24)) > $array_time[$i]){
				$msg .= date("d.m.Y", $array_time[$i]);
			}
			else{
				$help = time() - $array_time[$i];
				$msg .= date("H:i:s", $help).'<br/>';
			}
			$msg .= $array_msg[$i];
			$msg .= '</div>';
			$text = $GLOBALS['BBCode']->parse($msg);
		}
		return $text;
	}
	
	public function insertWall($owner, $text){
		foreach($this->wall_setings as $data){
			($data['is_allow'] == 1)? $allow = true : $allow = false;
			($data['is_all'] == 1)? $all = true : $all = false;
			($data['is_friends'] == 1)? $friends = true : $friends = false;
		}
		if($all){
			$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', poster='".$_SESSION['id']."', time='".time()."', wall='".$GLOBALS['DB']->escape($text)."'");
			return true;
		}
		elseif($friends){
			$result = $GLOBALS['DB']->query("SELECT COUNT(*) FROM uni1_buddy WHERE sender='".$owner."' AND owner='".$_SESSION['id']."'");
			foreach ($result as $data){
				if($data['COUNT(*)'] != 0){
					$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', poster='".$_SESSION['id']."', time='".time()."', wall='".$GLOBALS['DB']->escape($text)."'");
					return true;
				}
				else{
					$result_one = $GLOBALS['DB']->query("SELECT COUNT(*) FROM uni1_buddy WHERE sender='".$_SESSION['id']."' AND owner='".$owner."'");
					foreach ($result_one as $data_one){
						if($data_one['COUNT(*)'] != 0){
							$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', poster='".$_SESSION['id']."', time='".time()."', wall='".$GLOBALS['DB']->escape($text)."'");
							return true;
						}
						else{
							return false;
						}
					}
				}
			}
		}
		else{
			if($owner != $_SESSION['id']){
				return false; 
			}
			else{
				$GLOBALS['DB']->query("INSERT INTO uni1_wall SET owner='".$owner."', poster='".$_SESSION['id']."', time='".time()."', wall='".$GLOBALS['DB']->escape($text)."'");
				return true;
			}
		}
	}
}
?>