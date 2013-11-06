<?php
include(__DIR__.'/paths.php');
require_once PROJECT_DOCUMENT_ROOT.'/settings.php';
require_once PROJECT_DOCUMENT_ROOT.'/inc/includeAllClass.php';

if(!isset($GLOBALS['DB'])){
	$DB = new System\Database\MySQL(DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);
}

require('/usr/local/lib/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('/var/www/vhosts/spaceoflegends.de/httpdocs/smarty/templates');
$smarty->setCompileDir('/var/www/vhosts/spaceoflegends.de/httpdocs/smarty/templates_c');
$smarty->setCacheDir('/var/www/vhosts/spaceoflegends.de/httpdocs/smarty/cache');
$smarty->setConfigDir('/var/www/vhosts/spaceoflegends.de/httpdocs/smarty/configs');
?>