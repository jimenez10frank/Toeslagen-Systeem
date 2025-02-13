<?php

// SS
session_start();
// DB ophalen
require_once './../Database/user.php';

$userDB->pdo->sendToDashboard();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // gegevens van de gebruiker ophalen, als hij niet bestaat wordt dit een "False" boolean
    $gebruiker = $userDB->loginGebruiker($_POST['email']);

    // bestaat de gebruiker ? 
    if ($gebruiker) {
        // wachtwoor verifieren
        if (password_verify($_POST['wachtwoord'], $gebruiker['wachtwoord'])) {
            $_SESSION['logged'] = true;
            $_SESSION['gebruikerID'] = $gebruiker['id'];
            $_SESSION['voornaam'] = $gebruiker['voornaam'];
            $_SESSION['achternaam'] = $gebruiker['achternaam'];
            $_SESSION['geboortedatum'] = $gebruiker['geboortedatum'];
            $_SESSION['geslacht'] = $gebruiker['geslacht'];
            $_SESSION['email'] = $gebruiker['email'];
            $_SESSION['telefoonNummer'] = $gebruiker['telefoonNummer'];

            $userDB->pdo->pageRef("dashboard.php");
        } else {
            // verkeerde wachtwoord ingevoerd 
            $userDB->pdo->feedback("Inloggen mislukt. Controleer je e-mailadres en wachtwoord en probeer het opnieuw.", "information");

        }
        # account bestaat niet :P
    } else {
        $userDB->pdo->feedback("Inloggen mislukt. Controleer je e-mailadres en wachtwoord en probeer het opnieuw.", "information");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="icon" href="./../Assets/Icons/relIcon.png">
    <link rel="stylesheet" href="./../CSS/body.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./../CSS/login.css">
    <link rel="stylesheet" href="./../CSS/toast.css">
    <script src="./../JavaScript/toastFeedback.js" defer></script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="./../Assets/Icons/belastingdienst.svg" alt="logo van de overheid">
        </div>
        <div class="hypers">
            <a href="index.html"><i><button>Terug naar Overzicht</button></i></a>
        </div>
    </header>
    <div class="container">
        <div class="formDiv">
            <div class="lft">
                <img src="./../Assets/Icons/rijksoverheid.png" alt="Login icon">
            </div>
            <form method="post" class="formS">
                <div class="title">
                    IDentificeren
                </div>
                <div class="naam">
                    <img src="./../Assets/Icons/email.png" alt="Email icon">
                    <input type="email" required placeholder="Email" name="email">
                </div>
                <div class="wachtwoord">
                    <img src="./../Assets/Icons/password.png" alt="">
                    <input type="password" required placeholder="Wachtwoord" name="wachtwoord">
                </div>
                <div class="knopje">
                    <input type="submit" value="Inloggen " name="knop">
                </div>
                <div class="register">
                    <button><a href="sign_up.php">Registreren</a></button>
                    <button><a href="#">Wachtwoord vergeten?</a></button>
                </div>
            </form>
        </div>
        <div class="tips">
            <article>
                <h1>Veilig Inloggen</h1>
                <ul>
                    <li>Gebruik een sterk wachtwoord om je account te beschermen.</li>
                    <li>Schakel tweestapsverificatie (2FA) in voor extra beveiliging, indien beschikbaar.</li>
                    <li>Controleer altijd of je op de officiële inlogpagina bent, vooral bij het invoeren van je
                        gegevens.</li>
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