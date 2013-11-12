<?php
$GLOBALS['SEC']->checkSession();
require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';
$mes = new SYSTEM\getMessages;

$adm = $GLOBALS['SEC']->checkAdm();

if($_POST['art'] == 'bau'){
	$msg = $mes->getBauMSG();
}
elseif($_POST['art'] == 'sup'){
	$msg = $mes->getSupMSG();
}
elseif($_POST['art'] == 'new'){
	$msg = $mes->getNewsMSG();
}
elseif($_POST['art'] == 'mar'){
	$msg = $mes->getMarktMSG();
}
elseif($_POST['art'] == 'sys'){
	$msg = $mes->getSysMSG();
}
elseif($_POST['art'] == 'spi'){
	$msg = $mes->getSpielerMSG();
}
else{
	$msg = $mes->showAllMessages();
}
if(!isset($msg) || empty($msg)){
	$msg = "Sie haben zurzeit keine Nachrichten!";
}
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/news.tpl');
?>