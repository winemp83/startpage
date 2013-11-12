<?php
namespace SYSTEM;

class Security{
	public function checkLogin($user, $pass){
		$password = crypt($pass, '$2a$09$'.SALT.'$');
		$result = $GLOBALS['DB']->query("SELECT COUNT(id) FROM uni1_users WHERE username='".$user."' AND password='".$password."'");
		foreach($result as $data){
			if($data['COUNT(id)'] != 1){
				return false;
			}
			else{
				return true;
			}
		}
	}
	
	public function checkAdm(){
		(isset($_SESSION['adm']) && ($_SESSION['adm'] != 0 && $_SESSION['adm'] != 4)) ? $adm = true : $adm = false;
		return $adm;
	}
	
	public function checkSession(){
		if($_SESSION['login'] > time()){
			$_SESSION['login'] = time()+600;
		}
		else{
			session_destroy();
			header('Location: http://www.spaceoflegends.de/');
			exit;
		}
	}
}
?>