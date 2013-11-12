<?php
$GLOBALS['SEC']->checkSession();
require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';


$adm = $GLOBALS['SEC']->checkAdm();

$msg = 'Hier wird mal der Commander Bericht auftauchen!';

$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/c_b.tpl');
?>