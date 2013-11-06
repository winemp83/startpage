<?php
define('PROJECT_DOCUMENT_ROOT', __DIR__);
$project = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace("\\", '/', __DIR__));
(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') ? $protocol ='http://' : $protocol = 'https://';
define('PROJECT_HTTP_ROOT', $protocol.$_SERVER['HTTP_HOST'].$project);
define('ADM', 'adm/');
define('LOGIN', 'Login/');
define('SITE', 'Page/');
?>