<?php
error_reporting(0);
require_once('functions/fileFunctions.php');
$selectBoxes = genOptions();
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Testpersonen Auswahl</title>
  </head>
  <body>
<div id="mainSelector">
  <form id="selectionForm" action="personalisierung.php" method="post">
        <label><h1>Auswahl der Testpersonen:<h1>
                <select name="testpersonAuswahl" required>
                <option value="" disabled selected hidden>Bitte Testperson auswählen</option>
                    <?php  echo $selectBoxes;?>
                </select>
                <br>
            <button type="submit" name="submit" value="">Testperson auswählen</button>
        </label>
    </form>
</div>
  </body>
</html>