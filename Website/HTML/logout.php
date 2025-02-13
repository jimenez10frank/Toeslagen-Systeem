<?php

session_start();

if (!isset($_SESSION['gebruikerID']) || !isset($_SESSION['logged'])) {
    header('Location: login.php');
    exit;
}


// vernietig sessie,  start een nieuwe en verwijs gebruiker naar login pagina  met een feedback
session_destroy();
session_start();

// Feedback
$_SESSION['gebruikerFeedback'] = [
    'message' => 'Je bent succesvol uitgelogd.',
    'icon' => 'information'
];

header("Location: login.php");
exit;
