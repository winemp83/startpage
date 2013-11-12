<?php
namespace SYSTEM;

class getMessages{
	private $reciveMessages;
	private $sendMessages;
	
	public function __construct(){
		$this->reciveMessages 	= $GLOBALS['DB']->query("SELECT * FROM uni1_messages WHERE message_owner='".$_SESSION['id']."' ORDER BY message_time DESC");
		$this->sendMessages 	= $GLOBALS['DB']->query("SELECT * FROM uni1_messages WHERE message_sender='".$_SESSION['id']."' AND message_type='1'");
	}
	
	public function showAllMessages(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="NEWS MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			$all .= '<div id="news" width="100%"; align="center">';
			$all .= '<table width="75%" border="silver">';
			$all .= '<tr><th>';
			$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
			foreach($result as $user){
				$all .= $user['username'];
			}
			$all .= '</th><th>';
			$all .= $MSG['message_subject'];
			$all .= '</th><th>';
			$all .= date("H:i:s d.m.Y", $MSG['message_time']);
			$all .= '</th></tr>';
			$all .= '<tr><td colspan="3">';
			$all .= $MSG['message_text'];
			$all .= '</td></tr></table>';
		}
		return $all;
	}
	
	public function getBauMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="NEWS MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == $this->bauliste){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}
	
	public function getSupMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="Bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="NEWS MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == 99){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}
	
	public function getNewsMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == 50){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}

	public function getMarktMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="News MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == 1 && $MSG['message_from'] == 'Markt'){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}

	public function getSysMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="News MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="spi" name="art">';
		$all .= '<input type="submit" value="Spieler MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == 1 && $MSG['message_from'] == 'System'){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}
	
	public function getSpielerMSG(){
		$all  = '<table width="100%">';
		$all .= '<tr><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="all" name="art">';
		$all .= '<input type="submit" value="ALLE MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="bau" name="art">';
		$all .= '<input type="submit" value="Bau MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sup" name="art">';
		$all .= '<input type="submit" value="Support MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="new" name="art">';
		$all .= '<input type="submit" value="News MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="mar" name="art">';
		$all .= '<input type="submit" value="Markt MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th><th>';
		$all .= '<form action="index.php?page=news" method="post">';
		$all .= '<input type="hidden" value="sys" name="art">';
		$all .= '<input type="submit" value="System MSG" name="sub">';
		$all .= '</form>';
		$all .= '</th></tr></table>';
		$messages = $this->reciveMessages;
		foreach($messages as $MSG){
			if($MSG['message_type'] == 1 && ($MSG['message_from'] != 'System' || $MSG['message_from'] != 'Markt')){
				$all .= '<div id="news" width="100%"; align="center">';
				$all .= '<table width="75%" border="silver">';
				$all .= '<tr><th>';
				$result = $GLOBALS['DB']->query("SELECT username FROM uni1_users WHERE id='".$MSG['message_sender']."'");
				foreach($result as $user){
					$all .= $user['username'];
				}
				$all .= '</th><th>';
				$all .= $MSG['message_subject'];
				$all .= '</th><th>';
				$all .= date("H:i:s d.m.Y", $MSG['message_time']);
				$all .= '</th></tr>';
				$all .= '<tr><td colspan="3">';
				$all .= $MSG['message_text'];
				$all .= '</td></tr></table>';
			}
		}
		return $all;
	}
}
?>