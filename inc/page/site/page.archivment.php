<?php
require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';
$adm = $GLOBALS['SEC']->checkAdm();
$archiv = new \Info\Archivment;
if(!isset($_POST['id'])){
	$msg = $archiv->getArchivment($_SESSION['id']);
}
else{
	$msg = $archiv->getArchivment($_POST['id']);
}
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/arch.tpl');
?>