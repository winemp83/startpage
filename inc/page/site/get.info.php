<?php
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
	$result_one = $GLOBALS['DB']->query("SELECT * FROM uni1_statpoints WHERE id_owner='".$_SESSION['id']."' AND stat_type='1'");
	foreach($result_one as $data_one){
		$stat_lvl 	 = $data_one['total_rank'];
		$stat_points = $data_one['total_points'];
	}
}

$result = $GLOBALS['DB']->query("SELECT COUNT(id) FROM uni1_users WHERE onlinetime > '".(time()-300)."'");
foreach($result as $data){
	$player_online = $data['COUNT(id)'];
}

$info = '<b>Username :</b><br/>'.$Username.'<br/>'.
		'<b>Letzter Login :</b><br/> '.$last_login.'<br/>'.
		'<b>Dunkle Materie :</b><br/> '.$darkmatter.'<br/>'.
		'<b>Allianz :</b><br/> '.$alliance.'<br/>'.
		'<b>Allianz Rank :</b><br/> '.$ally_rank.'<br/>'.
		'<b>Platz :</b><br/> '.$stat_lvl.'<br/>'.
		'<b>Punkte :</b><br/> '.$stat_points.'<br/>'.
		'<b>Spieler Online :</b><br/> '.$player_online.'<br/>';
?>