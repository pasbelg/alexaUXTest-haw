Diese Webapplikation wurde zum erleichterten Testen der Usibilitiy eines Sprachassistenten entwickelt. Es ist statisch auf das Alexa Golden Morning Projekt von tell-me.io (https://tell-me.io/workshop/workshop_goldenmorning.html) ausgelegt.

Vorraussetzungen:
1. Sounddateien, die die Antworten von Alexa immitieren, und nach der Reihenfolge mit dem Namen 1.mp3,2.mp3,3.mp3,usw. im Verzeichnis sounds abgelegt werden
2. Eine CSV-Datei mit dem Namen userData.csv welche bestenfalls die zuvor erhobenen Angaben der Testpersonen und die jeweilige Zuteilung zu den Testpersonen enthalten
3. Einen Computer mit PHP-fähigem Webserverdienst
4. Einen Browser

Ablauf:
1. Zu erst müssen die zu erwartenden Angaben der Testpersonen erhoben werden. Hierfür wurde ein Google Formular verwendet (https://forms.gle/rkHe56H1C2yWx9P98). Die erhobenen Angaben müssen außerdem in userData.csv eingetragen werden.
2. Dann müssen die Sounddateien, welche die Antworten von Alexa enthalten für die jeweiligen Angaben der Testpersonen erstellt werden. Die Beispiel-Sounds wurden über https://notevibes.com/cabinet.php erstellt.
3. Die Sounddateien müssen dann im Richtigen Format (siehe Vorraussetzungen 2. oder /sounds/) im Verzeichnis /sounds/ abgelegt werden.
4. Ist alles vorbereitet kann mit der Alexa-Simulation begonnen werden, indem man index.php über den Browser aufruft.

Besonderheiten:
Der Sound für die Korrektur und die Bestätigung dieser muss als korrektur.mp3 und angepasst.mp3 in /sounds/ abgespeichert werden
Das Verzeichnis in /sounds/ muss zwangsläufig den gleichen string besitzen, wie das, was unter Rolle in der userData.csv steht.