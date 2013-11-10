<?php
session_start();
require_once 'common.php';
if($_GET['page'] == 'Logout'){
	$_GET['page'] = 'main';
	session_destroy();
}
if(isset($_POST['Login']) && $_POST['Login'] === 'Login'){
	$security = new SYSTEM\Security;
	if($security->checkLogin($_POST['user'], $_POST['pass'])){
		$_SESSION['login'] = time()+600;
		$_SESSION['user'] = md5($_POST['user']);
		$result = $GLOBALS['DB']->query("SELECT * FROM uni1_users WHERE username='".$_POST['user']."'");
		foreach($result as $data){
			$_SESSION['id'] = $data['id'];
			$_SESSION['adm'] =$data['forum_adm'];
		}
	}
	else{
		$_SESSION['login'] = '';
		session_destroy();
	}
}

if(!isset($_SESSION['login']) || $_SESSION['login'] < time() && !isset($_SESSION['user']) && $_GET['page']!='adm'){
	$_SESSION['login'] = '';
	session_destroy();
	if(!isset($_GET['page']) || empty($_GET['page'])){
		$page = 'main';
	}
	else{
		$page = $_GET['page'];
	}
	switch ($page){
		case 'main'	:
					require_once PROJECT_DOCUMENT_ROOT.'/inc/page/Login/page.main.php';
					break;
		default:
					require_once PROJECT_DOCUMENT_ROOT.'/inc/page/page.error.php';
					break;
	}
}
elseif(isset($_SESSION['adm']) && ($_SESSION['adm'] !=0 || $_SESSION['adm'] != 4)&& $_GET['page'] == 'adm'){
	require_once PROJECT_DOCUMENT_ROOT.'/adm.php';
}
else{
	require_once PROJECT_DOCUMENT_ROOT.'/site.php';
}
?>