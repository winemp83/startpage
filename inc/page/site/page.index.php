<?php
$GLOBALS['SEC']->checkSession();
require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';

$result = $GLOBALS['DB']->query("SELECT COUNT(*) FROM uni1_users");
foreach($result as $data){
	$nr_user = $data['COUNT(*)'];
}

$adm = $GLOBALS['SEC']->checkAdm();

$msg =  "Willkommen bei Space of Legends,<br/>".
		"Leider befinden sich viele Funktionen noch im Aufbau.<br/>".
		"Bitte gedulden Sie sich ein wenig!";

$GLOBALS['smarty']->assign('title', TITLE);
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/main.tpl');
?>