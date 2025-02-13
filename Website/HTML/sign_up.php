<?php

// SS/DB
session_start();
require_once './../Database/user.php';


// controleer of de gebruiker ingelogd is...
$userDB->pdo->sendToDashboard();




// aanvrag opvangen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // is het email al in gebruik?
    if ($userDB->selectUserEmail($_POST['email'])) {
        $userDB->pdo->feedback("Dit e-mailadres is al in gebruik. Kies een ander e-mailadres of log in.", "information");
        $userDB->pdo->pageRef($_SERVER['PHP_SELF']);
    }

    // email validatie
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $userDB->pdo->feedback("Ongeldig e-mailadres. Voer een correct e-mailadres in.", "cross");
        $userDB->pdo->pageRef($_SERVER['PHP_SELF']);
    }


    // probeer om from te verwerken
    try {
        // query uitvoeren
        $userDB->registerUser(
            $_POST['voornaam'],
            $_POST['achternaam'],
            $_POST['geboortedatum'],
            $_POST['geslacht'],
            $_POST['email'],
            $_POST['telefoonNummer'],
            $_POST['wachtwoord']
        );

        $userDB->pdo->feedback("Registratie succesvol! Je account is aangemaakt.", "check");
        $userDB->pdo->pageRef("login.php");
        // debug ._.
    } catch (Throwable $e) {
        $userDB->pdo->feedback("er is iets fout gegaan, probeer later opnieuw!", "information");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="icon" href="./../Assets/Icons/relIcon.png">
    <link rel="stylesheet" href="./../CSS/body.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./../CSS/sign_up.css">
    <link rel="stylesheet" href="./../CSS/toast.css">
    <script src="./../JavaScript/toastFeedback.js" defer></script>
    <script src="./../JavaScript/validations.js" defer></script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="./../Assets/Icons/belastingdienst.svg" alt="logo van de overheid">
        </div>
        <div class="hypers">
            <a href="index.html"><i><button>Terug naar Overzicht</button></i></a>
            <a href="login.php"><i><button>Inloggen</button></i></a>
        </div>
    </header>
    <div class="container">
        <div class="formDiv">
            <div class="lft">
                <div class="tips">
                    <article>
                        <h1>Veilige Registratie</h1>
                        <ul>
                            <li>Gebruik een sterk en uniek wachtwoord voor je accountbeveiliging.</li>
                            <li>Controleer of je persoonlijke gegevens correct en volledig zijn voordat je ze indient.
                            </li>
                            <li>Verifieer altijd de betrouwbaarheid van de website en controleer de URL om te zorgen dat
                                je je gegevens enkel deelt met de officiële instantie.</li>
                            <li>Wees voorzichtig met het delen van gevoelige informatie, zoals je burgerservicenummer
                                (BSN), en zorg ervoor dat je dit alleen invoert op vertrouwde websites.</li>
                            <li>Gebruik tweestapsverificatie (2FA) voor extra beveiliging, indien beschikbaar.</li>
                            <li>Houd je accountgegevens privé en deel ze niet met anderen om fraude te voorkomen.</li>
                            <li>Zorg ervoor dat je browser up-to-date is en dat je gebruik maakt van een beveiligde
                                internetverbinding (https://).</li>
                            <li>Als je denkt dat je account is gecompromitteerd, wijzig dan onmiddellijk je wachtwoord
                                en neem contact op met de betreffende instantie.</li>
                        </ul>
                    </article>
                </div>
            </div>
            <form method="post" class="formS">
                <div class="title">
                    Registratie voor het Belastingportaal
                </div>
                <div class="naam">
                    <img src="./../Assets/Icons/signature.png" alt="icon">
                    <input type="text" required placeholder="Voornaam" name="voornaam">
                </div>
                <div class="achternaam">
                    <img src="./../Assets/Icons/id-card.png" alt="ID icon">
                    <input type="text" required placeholder="Achternaam" name="achternaam">
                </div>
                <div class="geboorteDatum">
                    <img src="./../Assets/Icons/calendar.png" alt="icon">
                    <input type="date" max="2006-02-01" min="1930-01-01" required name="geboortedatum">
                </div>
                <div class="geslacht">
                    <img src="./../Assets/Icons/gender-neutral.png" alt="logo">
                    <select name="geslacht" required id="geslacht">
                        <option value="" selected disabled>Kies uw geslacht</option>
                        <option value="man">Man</option>
                        <option value="vrouw">Vrouw</option>
                        <option value="anders">Anders</option>
                    </select>
                </div>
                <div class="email">
                    <img src="./../Assets/Icons/email.png" alt="icon">
                    <input type="email" required placeholder="Email" name="email" id="email">
                </div>
                <div class="nummer">
                    <img src="./../Assets/Icons/iphone.png" alt="icon">
                    <input id="telefoonNummer" value="+31 6 " type="text" name="telefoonNummer" required>
                </div>
                <div class="wachtwoord">
                    <img src="./../Assets/Icons/password.png" alt="icon">
                    <input type="password" required placeholder="Wachtwoord" name="wachtwoord" minlength="8">
                </div>
                <div class="knopje">
                    <input type="submit" value="Account Aanmaken " name="knop" id="verstuurKnop">
                </div>
            </form>
        </div>
        <div class="tips hidden">
            <article>
                <h1>Veilige Registratie</h1>
                <ul>
                    <li>Gebruik een sterk en uniek wachtwoord voor je accountbeveiliging.</li>
                    <li>Controleer of je persoonlijke gegevens correct en volledig zijn voordat je ze indient.</li>
                    <li>Verifieer altijd de betrouwbaarheid van de website en controleer de URL om te zorgen dat je je
                        gegevens enkel deelt met de officiële instantie.</li>
                    <li>Wees voorzichtig met het delen van gevoelige informatie, zoals je burgerservicenummer (BSN), en
                        zorg ervoor dat je dit alleen invoert op vertrouwde websites.</li>
                    <li>Gebruik tweestapsverificatie (2FA) voor extra beveiliging, indien beschikbaar.</li>
                    <li>Houd je accountgegevens privé en deel ze niet met anderen om fraude te voorkomen.</li>
                    <li>Zorg ervoor dat je browser up-to-date is en dat je gebruik maakt van een beveiligde
                        internetverbinding (https://).</li>
                    <li>Als je denkt dat je account is gecompromitteerd, wijzig dan onmiddellijk je wachtwoord en neem
                        contact op met de betreffende instantie.</li>
                </ul>
            </article>
        </div>
    </div>
    <!-- Fancy Feedback  -->
    <div id="toastbox">
        <!-- // Toast weergeven  als die bestaat//  -->
        <?php if (isset($_SESSION['gebruikerFeedback'])): ?>
            <div class="toast">
                <i>
                    <img src="./../Assets/Icons/<?php echo $_SESSION['gebruikerFeedback']['icon']; ?>.png" alt="logo">
                </i>
                <p>
                    <?php echo $_SESSION['gebruikerFeedback']['message']; ?>
                </p>
            </div>
            <?php unset($_SESSION['gebruikerFeedback']); endif; // Verwijder de sessie variabele ?>
    </div>
    <!-- preloader -->
    <script src="./../JavaScript/loader.js"></script>
</body>

</html>