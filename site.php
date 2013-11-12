<?php
if(!isset($_SESSION['login']) || empty($_SESSION['login']) || $_SESSION['login'] <= time()){
	session_destroy();
	header('Location: http://www.spaceoflegends.de/');
	exit;
}
if(!isset($_GET['page']) || empty($_GET['page'])){
	$page = 'main';
}
else{
	$page = $_GET['page'];
}
switch ($page){
	case 'main' :
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.index.php';
				 break;
	case 'bote' :
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.commander_bericht.php';
				 break;
	case 'archivment' :
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.archivment.php';
				 break;
	case 'wall'	:
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.wall.php';
				 break;
	case 'search':
				if((isset($_POST['pin']) || isset($_POST['erf'])) && isset($_POST['id'])){
					if(isset($_POST['pin'])){
						require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.wall.php';
					}
					else{
						require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.archivment.php';
					}
				}
				else{
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.search.php';
				}
				 break;
	case 'insertPin':
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/insert.pin.php';
				 break;
	case 'news' :
			 	 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/site/page.news.php';
				 break;
	default 	:
				 require_once PROJECT_DOCUMENT_ROOT.'/inc/page/page.error.php';
				 break;
}
?>