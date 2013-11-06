<?php
$result = $GLOBALS['DB']->query("SELECT COUNT(*) FROM uni1_users");
foreach($result as $data){
	$nr_user = $data['COUNT(*)'];
}
$GLOBALS['smarty']->assign('total_user', $nr_user);
$GLOBALS['smarty']->display('Login/index.tpl');
?>