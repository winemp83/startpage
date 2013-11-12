<?php
$GLOBALS['SEC']->checkSession();
if(!isset($_POST['id'])){
	$id = $_SESSION['id'];
}
else{
	$id = $_POST['id'];
}		
$walls = new System\ownwall;
$wall = $walls->getWall($id);

require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';

$adm = $GLOBALS['SEC']->checkAdm();
(!isset($_POST['id']))? $id= $_SESSION['id'] : $id = $_POST['id'];

$GLOBALS['smarty']->assign('id', $id);
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $wall);
$GLOBALS['smarty']->display('site/wall.tpl');

?>