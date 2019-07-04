<?php
//Ließt die userData.csv aus um erwartete Antworten zu speichern
function getUserData(){
    $fp = fopen("userData.csv", "r");
    $zeilen = array();
    while( !feof($fp) ) {
        $zeilen[] = fgetcsv  ( $fp  , 4096 , ";" , "\"" );
    }
    return $zeilen;
    fclose($fp);
}

//Generiert die Auswahloptionen der Testpersonen auf der Startseite
function genOptions(){ 
    $userData = getUserData();
    $testpersonen = array_diff(scandir('sounds/'), array('.', '..'));
    $totalFiles = count($testpersonen);
    foreach ($testpersonen as $testpersonenDir){
        for($i=1;$i<=$totalFiles;$i++){
            //Nur wenn das Soundverzeichnis der jeweiligen Testperson auch in der CSV-Datei steht wird die Auswahloption generiert
            if($testpersonenDir == $userData[$i][1]){
                //Speichern der Daten der jeweiligen Testperson mit | getrennt in eine Variable um diese mit POST übergeben zu können
                foreach ($userData[$i] as $data){
                    $dataRow .= '|' . $data ;
                }
                $testpersonOptionen .= '<option value="'.$dataRow.'">'.$testpersonenDir.'</option>';
                $dataRow = '';
            }
        }          
    }
    return $testpersonOptionen;
}

//Gibt die Anzahl der Sounddateien für die jeweilige Testperson aus
function countSounds($testperson){
    $totalSounds = array_diff(scandir('sounds/'.$testperson.'/'), array('.', '..'));
    return count($totalSounds);
}

//Gibt jeweils die Sounddateien in 'sounds/testperson{X}/' aus (Abhängig vom Schleifendurchlauf in personalisierung.php)
function getSound($testperson, $antwortCount){
    //Bei Schleifendurchlauf 10 fragt Alexa ob alles Korrekt ist. Falls nicht kann korrektur.mp3 und angepasst.mp3 abgespielt werden
    if($antwortCount == 10){
        $output = '
        <audio controls>
        <source src="sounds/'.$testperson.'/'.$antwortCount.'.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>
        Falls nicht Korrekt:
        <audio controls>
        <source src="sounds/'.$testperson.'/korrektur.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>
        Bestätigung:
        <audio controls>
        <source src="sounds/'.$testperson.'/angepasst.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>';
      }else{
        $output = '<audio controls>
        <source src="sounds/'.$testperson.'/'.$antwortCount.'.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>';
      }
    return $output;
}

//Verarbeitung verschiedener erwarteter Antworten und Schleifendurchläufe (Erweiterbar)
function expectedAnswers($userExpection, $antwortCount, $antwortTotal){
    //Ausgabe für den ersten Schleifendurchlauf
    if ($antwortCount == '1'){
        return 'Golden Morning';
    }
    //Ausgabe von Ja und Nein anstatt 1 und 0
    elseif($userExpection == '1'){ 
        return 'ja';
    }elseif($userExpection === '0'){
        return 'nein';
    }else{
        return $userExpection;
    }
    //IF-Abfragen können nach Bedarf erweitert werden
}
?>