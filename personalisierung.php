<?php
error_reporting(0);
require_once('functions/fileFunctions.php');
$postData = $_POST['testpersonAuswahl'];
$userData = explode('|', $postData);
$fileCount = countSounds($userData[2]);
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Personalisiert für <?php echo $userData[2] ?></title>
  </head>
  <body>
  <?php
  for ($i = 1; $i <= $fileCount; $i++){
    echo 
    '<div class="interaction">
        <div class="content">
            <h2>Antwort '.$i.'</h2> 
            <p>Erwartete Aussage: <b>'.expectedAnswers($userData[$i], $i, $fileCount).'</b></p>
            '.getsound($userData[2], $i).'  
        </div>
    </div>
    <br>
    <br>
    ';
  }
  ?>
    <div></div>
  </body>
</html>