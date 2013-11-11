<?php
require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/get.info.php';
require_once PROJECT_DOCUMENT_ROOT.'/inc/class/search/class.search.php';
$search = new System\search;
$users = $search->getAll();
$msg = "<table width='100%' style='text-align:center;border:silver;' rules='all'>";
$msg .= "<tr><th width='40%;'>Username</th><th width='30%;'>zur Pinnwand</th><th width='30%;'>Zu den Erfolgen</th></tr>";
for($i = 0; $i < count($users); $i++){
	$msg .= '</td><td>';
	$msg .= $users[$i]['user'];
	$msg .= '</td><td>';
	$msg .= '<form method="post"><input type="hidden" value="'.$users[$i]['id'].'" name="id"><input type="submit" value="Pinnwand" name="pin"></form>';
	$msg .= '</td><td>';
	$msg .= '<form method="post"><input type="hidden" value="'.$users[$i]['id'].'" name="id"><input type="submit" value="erfolge" name="erf"></form>';
	$msg .= '</td></tr>';
}
$msg .= "</table>";

$adm = $GLOBALS['SEC']->checkAdm();


$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/search.tpl');
?>