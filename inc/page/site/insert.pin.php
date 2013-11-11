<?php

if(isset($_POST['text'])){
	$walls = new System\ownwall;
	if($walls->setWall($_POST['id'], $_POST['text'])){
		$wall = $walls->getWall($_POST['id']);
	}
	else{
		$wall = 'error1';
	}
}
else{
	$wall = 'error2';
}


 

require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';

$adm = $GLOBALS['SEC']->checkAdm();
(!isset($_POST['id']))? $id= $_SESSION['id'] : $id = $_POST['id'];

$GLOBALS['smarty']->assign('id', $id);
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $wall);
$GLOBALS['smarty']->display('site/wall.tpl');
?>