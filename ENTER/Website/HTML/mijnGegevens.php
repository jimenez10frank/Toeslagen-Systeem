<?php 

    require '../Database/user.php';
    session_start();

    //moet later verandert worden
    $dummy = "dummy";
    $postadresInformatie = $userDB->postadresOphalen($dummy);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn gegevens</title>
    <link rel="icon" href="./../Assets/Icons/relIcon.png">
    <link rel="stylesheet" href="./../CSS/body.css">
    <link rel="stylesheet" href="./../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/mijnG.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <nav class="navb"></nav>
    <div class="container">
        <div class="leftSide">
            <h1 class="kopje">Mijn gegevens</h1>
            <div class="leftBox1">
                <h3 class="left">Rekeningnummer</h3>
                <div class="lijn"></div>
                <a class="aLink" href="#">Mijn rekeningnummer doorgeven of wijzigen</a>
            </div>
            <div class="leftBox2">
                <h3 class="left">Postadres</h3>
                <div class="lijn"></div>
                <a class="aLink" href="#">Postadres doorgeven of wijzigen</a>
            </div>
            <div class="leftBox3">
                <h3 class="left">Inkomensverklaring en geregistreerd inkomen</h3>
                <p>Hier kunt u uw inkomensverklaring downloaden. Bijvoorbeeld om aan uw woningbouwvereniging te laten zien. <br> <br>Daarnaast kunt u uw geregistreerd inkomen bekijken. Dit inkomen wordt door andere organisaties gebruikt om bijvoorbeeld de hoogte van een eigen bijdrage of toelage te berekenen.</p>
                <div class="lijn"></div>
                <a class="aLink" href="#">Inkomensverklaring downloaden en geregistreerd inkomen bekijken</a>
            </div>
            <div class="leftBox4">
                <h3 class="left">Verklaring geen privegebruik auto</h3>
                <p>Kunt u aantonen dat u per kalenderjaar niet meer dan 500 kilometer privé rijdt in een auto van de zaak? Dan betaalt u daarover geen belasting; u hebt dan geen 'bijtelling'. U kunt hiervoor een 'Verklaring geen privégebruik auto' aanvragen.</p>
                <div class="lijn"></div>
                <a class="aLink" href="#">Verklaring aanvragen, wijzigen of intrekken</a>
            </div>
            <div class="leftBox5">
                <h3 class="left">Bezoeken aan Mijn Belastingdienst</h3>
                <p>De laatste keer dat u uw gegevens hebt bekeken of gewijzigd, was op donderdag 30 januari 2025 om 20:59 uur.</p>
                <div class="lijn"></div>
                <a class="aLink" href="#">Toon eerdere bezoeken</a>
            </div>
        </div>
        <div class="rightSide">
            <div class="rightBox1">
                <span><h3>? &nbsp;&nbsp;Meer informatie</h3></span>
                <h2>Rekeningnummer inkom-<br>stenbelasting en toeslagen</h2>
                <p>U ziet hier welk rekeningnummer bij ons <br> bekend is voor uw toeslagen, inkomstenbelasting en bijdrage Zvw.</p>
                <h3>Rekeningnummer motorrijtuigenbelasting</h3>
                <p>Wilt u weten welk rekeningnummer wij gebruiken voor uw motorrijtuigenbelasting? Of wilt u dat wijzigen? Kijk dan op <a href="#">hoe geef ik mijn rekeningnummer door -en hoe pas ik het aan?</a></p>
                <h2>Geregistreerd inkomen</h2>
                <p>Wij registreren uw inkomen. De volgende organisaties gebruiken dit inkomen om bijvoorbeeld de hoogte van een eigen bijdrage of toelage te berekenen:
                     <li>CAK (Centraal administratiekantoor)</li>
                     <li>Raad voor de rechtsbijstand</li>
                     <li>Belastingdienst/Toeslagen</li>
                     <li>DUO (Dienst Uitvoering Onderwijs)</li>
                </p>
            </div>
        </div>
    </div>

</body>
</html>