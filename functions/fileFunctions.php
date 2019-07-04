<?php
function genOptions(){
    $userData = getUserData();
    $testpersonen = array_diff(scandir('sounds/'), array('.', '..'));
    $totalFiles = count($testpersonen);
    foreach ($testpersonen as $testpersonenDir){
        for($i=1;$i<=$totalFiles;$i++){
            if($testpersonenDir == $userData[$i][1]){
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

function countSounds($testperson){
    $totalSounds = array_diff(scandir('sounds/'.$testperson.'/'), array('.', '..'));
    return count($totalSounds);
}

function genSoundTags($testperson, $i){
    if ($i == '6'){
        return '
        Wetter Ja
        <audio controls>
           <source src="sounds/'.$testperson.'/6-1.mp3" type="audio/mpeg">
             Your browser does not support the audio element.
        </audio>
        Wetter Nein
        <audio controls>
            <source src="sounds/'.$testperson.'/6-2.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>';
    }if ($i == '10'){
        return '
        Wet Ja Ter Ja
        <audio controls>
           <source src="sounds/'.$testperson.'/10-1-1.mp3" type="audio/mpeg">
             Your browser does not support the audio element.
        </audio>
        Wet Ja Ter Nein
        <audio controls>
            <source src="sounds/'.$testperson.'/10-1-0.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        Wet Nein Ter Ja
        <audio controls>
            <source src="sounds/'.$testperson.'/10-0-1.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        Wet Nein Ter Nein
        <audio controls>
            <source src="sounds/'.$testperson.'/10-0-0.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>';
    }else{
        return '
        <audio controls>
            <source src="'.getSound($testperson, $i).'.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>';
    }
}
function getSound($testperson, $antwortCount){
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

function getUserData(){
    $fp = fopen("userData.csv", "r");
    $zeilen = array();
    
    while( !feof($fp) ) {
        $zeilen[] = fgetcsv  ( $fp  , 4096 , ";" , "\"" );
    }
    return $zeilen;
    fclose($fp);
}

function expectedAnswers($userExpection, $antwortCount, $antwortTotal){
    //IF für Unterscheidung verschiedener Antworten
    
    if ($antwortCount == '1'){
        return 'Golden Morning';
    }elseif($userExpection == '1'){
        return 'ja';
    }elseif($userExpection === '0'){
        return 'nein';
    }else{
        return $userExpection;
    }
    //IF für Konvertierung verschiedener userExpections
}
?>