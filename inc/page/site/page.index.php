<?php
$result = $GLOBALS['DB']->query("SELECT COUNT(*) FROM uni1_users");
foreach($result as $data){
	$nr_user = $data['COUNT(*)'];
}
$result = $GLOBALS['DB']->query("SELECT * FROM uni1_users WHERE id='".$_SESSION['id']."'");
foreach($result as $data){
	$Username 	= $data['username'];
	$last_login = date("H:i:s d.m.Y",$data['onlinetime']);
	$darkmatter	= $data['darkmatter'];
	if($data['ally_id'] != 0){
		$result_one = $GLOBALS['DB']->query("SELECT `ally_name` FROM uni1_alliance WHERE id='".$data['ally_id']."'");
		foreach($result_one as $data_one){
			$alliance = $data_one['ally_name'];
		}
	}
	else{
		$alliance = '-/-';
	}
	if($data['ally_rank_id'] != 0){
		$result_two = $GLOBALS['DB']->query("SELECT `rankName` FROM uni1_alliance_ranks WHERE rankID='".$data['ally_rank_id']."'");
		foreach($result_two as $data_two){
			$ally_rank = $data_two['rankName'];
		}
	}
	else{
		$ally_rank = '-/-';
	}
}

$info = '<b>Username :</b><br/>'.$Username.'<br/>'.
		'<b>Letzter Login :</b><br/> '.$last_login.'<br/>'.
		'<b>Dunkle Materie :</b><br/> '.$darkmatter.'<br/>'.
		'<b>Allianz :</b><br/> '.$alliance.'<br/>'.
		'<b>Allianz Rank :</b><br/> '.$ally_rank.'<br/>';

$msg =  "Willkommen bei Space of Legends,<br/>".
		"Leider befinden sich viele Funktionen noch im Aufbau.<br/>".
		"Bitte gedulden Sie sich ein wenig!";
(isset($_SESSION['adm']) && ($_SESSION['adm'] != 0 || $S_SESSION['adm'] == 4)) ? $adm = true : $adm = false;
$GLOBALS['smarty']->assign('adm', $adm);
$GLOBALS['smarty']->assign('info', $info);
$GLOBALS['smarty']->assign('content', $msg);
$GLOBALS['smarty']->display('site/main.tpl');
?>