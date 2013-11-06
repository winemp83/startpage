<?php
session_start();
require_once 'common.php';
if(!isset($_SESSION['login']) || $_SESSION['login'] < time()){
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
elseif(isset($_SESSION['adm']) && $_SESSION['adm'] == true){
	require_once PROJECT_DOCUMENT_ROOT.'/adm.php';
}
else{
	require_once PROJECT_DOCUMENT_ROOT.'/site.php';
}
?>