<?php
namespace INFO;

class Archivment{
	public function getArchivment($user){
		$array_lvl = array();
		$array_name = array();
		$array_time = array();
		$result = $GLOBALS['DB']->query("SELECT * FROM uni1_erfolge WHERE owner='".$user."'");
		foreach($result as $data){
			array_push($array_lvl, $data['lvl']);
			array_push($array_name, $data['what']);
			array_push($array_time, $data['time']);
		}
		$erfolg = '<table width="100%" rules="all"><tr><th width="33%">LvL</th><th width="33%">Was</th><th>Zeitpunkt</th></tr>';
		for($i = 0; $i < count($array_lvl); $i++){
			if($i%2 != 0){
				$erfolg .= '<tr><td>';
				$erfolg .= $array_lvl[$i];
				$erfolg .= '</td><td>';
				$erfolg .= $this->getArchivmentTitle($array_lvl[$i], $array_name[$i]);
				$erfolg .= '</td><td>';
				$erfolg .= date("H:i:s d.m.Y", $array_time[$i]);
				$erfolg .= '</td></tr>';
			}
			else{
				$erfolg .= '<tr><td style="background:grey;">';
				$erfolg .= $array_lvl[$i];
				$erfolg .= '</td><td style="background:grey;">';
				$erfolg .= $this->getArchivmentTitle($array_lvl[$i], $array_name[$i]);
				$erfolg .= '</td><td style="background:grey;">';
				$erfolg .= date("H:i:s d.m.Y", $array_time[$i]);
				$erfolg .= '</td></tr>';
			} 
		}
		$erfolg .= '</table>';
		return $erfolg;
	}
	
	private function getArchivmentTitle($lvl, $archivment){
		switch ($archivment){
			case 'test'	:
						if($lvl == 1){
							return "Test Archivment I";
						}
						elseif($lvl == 2){
							return "Test Archivment II";
						}
						elseif($lvl == 3){
							return "Test Archivment III";
						}
						elseif($lvl == 4){
							return "Test Archivment IV";
						}
						elseif($lvl == 5){
							return "Test Archivment V";
						}
						else{
							return "Test Archivment VI";
						}
						break;
			case 'archievments_mine'	:
						if($lvl == 1){
							return "Die erste Produktion";
						}
						elseif($lvl == 2){
							return "Den Bergbau Entdeckt";
						}
						elseif($lvl == 3){
							return "Neue Mittel";
						}
						elseif($lvl == 4){
							return "Gold-Möglichkeiten";
						}
						elseif($lvl == 5){
							return "Ein Schatz";
						}
						else{
							return "HARDCORE Level";
						}
						break;
			case 'archievments_research'	:
						if($lvl == 1){
							return "Anfänger-Wissenschaftler";
						}
						elseif($lvl == 2){
							return "Hacken für Anfänger";
						}
						elseif($lvl == 3){
							return "Schnelle Schiffe";
						}
						elseif($lvl == 4){
							return "Vergoldete Mittel...";
						}
						elseif($lvl == 5){
							return "Das Handwerk des Krieges";
						}
						else{
							return "HARDCORE Level";
						}
						break;
			case 'archievments_battle'	:
						if($lvl == 1){
							return "Neue-Weltordnung";
						}
						elseif($lvl == 2){
							return "Auslöscher";
						}
						elseif($lvl == 3){
							return "Tod von Oben";
						}
						elseif($lvl == 4){
							return "Stiller Ehrgeiz";
						}
						elseif($lvl == 5){
							return "Die Kunst des Krieges";
						}
						else{
							return "HARDCORE Level";
						}
						break;
			case 'archievments_ship'	:
						if($lvl == 1){
							return "Schlachtschiff-Spezialist";
						}
						elseif($lvl == 2){
							return "Zerstörer-Spezialist";
						}
						elseif($lvl == 3){
							return "Todesstern-Spezialist";
						}
						elseif($lvl == 4){
							return "Lune Noire-Spezialist";
						}
						elseif($lvl == 5){
							return "Avatar-Spezialist";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_defence'	:
						if($lvl == 1){
							return "Gauss-Kanonen Spezialist";
						}
						elseif($lvl == 2){
							return "Ionen-Kanonen Spezialist";
						}
						elseif($lvl == 3){
							return "Plasma-Kanonen Spezialist";
						}
						elseif($lvl == 4){
							return "Graviton-Kanonen Spezialist";
						}
						elseif($lvl == 5){
							return "Ein Unschlagbarer Schild";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_storage'	:
						if($lvl == 1){
							return "Das erste Volle";
						}
						elseif($lvl == 2){
							return "Mittel voraus!";
						}
						elseif($lvl == 3){
							return "Es regnet Rohstoffe";
						}
						elseif($lvl == 4){
							return "Reserve";
						}
						elseif($lvl == 5){
							return "Reserve";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_moon'	:
						if($lvl == 1){
							return "Camping auf dem Mond";
						}
						elseif($lvl == 2){
							return "Spione, überall!";
						}
						elseif($lvl == 3){
							return "Beam mich hoch Scotti!";
						}
						elseif($lvl == 4){
							return "Reserve";
						}
						elseif($lvl == 5){
							return "Reserve";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_colony'	:
						if($lvl == 1){
							return "Grundkenntnisse Zivilisation";
						}
						elseif($lvl == 2){
							return "Planetare Zivilisation";
						}
						elseif($lvl == 3){
							return "Die Zivilisation des Weltalls";
						}
						elseif($lvl == 4){
							return "Die Gründung von Kolonien";
						}
						elseif($lvl == 5){
							return "Zivilisation für Fortgeschrittene";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_friend'	:
						if($lvl == 1){
							return "Die Bruderschaft";
						}
						elseif($lvl == 2){
							return "Der erste Musketier";
						}
						elseif($lvl == 3){
							return "Reserve";
						}
						elseif($lvl == 4){
							return "Reserve";
						}
						elseif($lvl == 5){
							return "Reserve";
						}
						else{
							return "Reserve";
						}
						break;
			case 'archievments_statpoints'	:
						if($lvl == 1){
							return "Schlacht um Einhunderttausend";
						}
						elseif($lvl == 2){
							return "Schlacht um Millionen";
						}
						elseif($lvl == 3){
							return "Schlacht um weitere Millionen";
						}
						elseif($lvl == 4){
							return "Schlacht um einhundert Millionen";
						}
						elseif($lvl == 5){
							return "Schlacht um fünfhundert Millionen";
						}
						else{
							return "Schlacht um Milliarden";
						}
						break;
			case 'archievments_destroy'	:
						if($lvl == 1){
							return "Scharfschütze";
						}
						elseif($lvl == 2){
							return "Zu den Waffen";
						}
						elseif($lvl == 3){
							return "Und noch eine Flottenjagd";
						}
						elseif($lvl == 4){
							return "Töte Sie alle";
						}
						elseif($lvl == 5){
							return "Explosives aus dem All";
						}
						else{
							return "Ich bin der Inbegriff des Todes";
						}
						break;
			case 'archievments_debris'	:
						if($lvl == 1){
							return "Trümmer wiederverwerten";
						}
						elseif($lvl == 2){
							return "Schrottsammler";
						}
						elseif($lvl == 3){
							return "Die Galaxie nach mehr Schrott durchsuchen";
						}
						elseif($lvl == 4){
							return "Recycling für Profis";
						}
						elseif($lvl == 5){
							return "Verwerte das Unverwertbare";
						}
						else{
							return "Reserve";
						}
						break;
			default :	return "Benutzer Archivment";
						break;			
			
		}
	}	
}
?>