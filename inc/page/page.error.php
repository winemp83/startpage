<?php
$GLOBALS['SEC']->checkSession();
$GLOBALS['smarty']->assign('err_msg', 'Die Seite exestiert nicht!');
$GLOBALS['smarty']->display('error.tpl');
?>