<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./../Assets/Icons/relIcon.png">
  <link rel="stylesheet" href="./../CSS/body.css">
  <link rel="stylesheet" href="./../CSS/dashboard.css">
  <link rel="stylesheet" href="./../CSS/dashNavbar.css">
  <link rel="stylesheet" href="./../CSS/footer.css">
  <link rel="stylesheet" href="./../CSS/toast.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
  <link rel="stylesheet" href="./../CSS/partnerGegevens.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Partner Gegevens</title>
</head>
<body>

<!-- SOURCE van sidebar menu: https://www.codingnepalweb.com/sidebar-with-dropdown-menu-html-css/ -->
<!-- Mobile Sidebar Menu Button -->
<button class="sidebar-menu-button">
  <span class="material-symbols-rounded">menu</span>
</button>
<aside class="sidebar collapsed">
  <!-- Sidebar Header -->
  <header class="sidebar-header">
    <a href="#" class="header-logo">
      <img src="./../Assets/Icons/rijksoverheid.png" alt="CodingNepal" />
    </a>
    <button class="sidebar-toggler">
      <span class="material-symbols-rounded">chevron_left</span>
    </button>
  </header>
  <nav class="sidebar-nav">
    <!-- Primary Top Nav -->
    <ul class="nav-list primary-nav">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <span class="material-symbols-rounded">dashboard</span>
          <span class="nav-label">Dashboard</span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Dashboard</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <span class="material-symbols-rounded">pending_actions</span>
          <span class="nav-label">Toeslagrecht controle</span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Toeslagrecht controle</a></li>
        </ul>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown-container">
        <a href="#" class="nav-link dropdown-toggle">
          <span class="material-symbols-rounded">description</span>
          <span class="nav-label">Aanvragen</span>
          <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
        </a>
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Aanvragen</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Zorgtoeslag</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Kinderopvangtoeslag</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Zorgtoeslag</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Bekijken</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Wijzigen</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Verwijderen</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Status</a></li>
        </ul>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown-container">
        <a href="#" class="nav-link dropdown-toggle">
          <span class="material-symbols-rounded">groups</span>
          <span class="nav-label">Partnergegevens</span>
          <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
        </a>
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Partnergegevens</a></li>
          <li class="nav-item"><a href="../HTML/partnergegevens.php" class="nav-link dropdown-link">Toevoegen</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Verwijderen</a></li>
          <li class="nav-item"><a href="#" class="nav-link dropdown-link">Wijzigen</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <span class="material-symbols-rounded">notifications</span>
          <span class="nav-label">Meldingen</span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Meldingen</a></li>
        </ul>
      </li>
    </ul>

    <!-- Secondary Bottom Nav -->
    <ul class="nav-list secondary-nav">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <span class="material-symbols-rounded">manage_accounts</span>
          <span class="nav-label">Profiel</span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Profiel</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <span class="material-symbols-rounded">logout</span>
          <span class="nav-label">Uitloggen</span>
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a class="nav-link dropdown-title">Uitloggen</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>
<!-- Fancy Feedback  -->
<div id="toastbox">
  <!-- // Toast weergeven  als die bestaat//  -->
  <?php if (isset($_SESSION['gebruikerFeedback'])): ?>
    <div class="toast uflp"> <!-- dashboard toast !! -->
      <i>
        <img src="./../Assets/Icons/<?php echo $_SESSION['gebruikerFeedback']['icon']; ?>.png" alt="logo">
      </i>
      <p>
        <?php echo $_SESSION['gebruikerFeedback']['message']; ?>
      </p>
    </div>
    <?php unset($_SESSION['gebruikerFeedback']); endif; // Verwijder de sessie variabele ?>
</div>
<!-- hier is de php script voor het versturen van de gegevens -->
 <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verbinden met de database
    require_once '../Database/user.php';
    // Gegevens ophalen
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $geboorteland = $_POST['geboorteland'];
    $bsnnummer = $_POST['bsnnummer'];
    $nationaliteit = $_POST['nationaliteit'];
    // Query voorbereiden
    try {
      // query uitvoeren
      $userDB->insertPartnerDetails(
          $_POST['naam'],
          $_POST['achternaam'],
          $_POST['geboortedatum'],
          $_POST['geboorteland'],
          $_POST['bsnnummer'],
          $_POST['nationaliteit']
      );
    } catch (PDOException $e) {
      // Als er een fout is, geef een foutmelding
      echo "Error: " . $e->getMessage();
    }
  }


?>
  <!-- Main Content -->
  <div class="container">
    <div class="gegevensContainer">
      <form method="POST">
        <!-- formulier -->
        <div class="partnerGegevens">
          <h1 class="titels">Partnergegevens Toevoegen</h1>
          <i class="fa-regular fa-user">
            <input type="text" name="naam" id="naam" placeholder="Naam" required>
          </i>
          <i class="fa-regular fa-user">
            <input type="text" name="achternaam" id="achternaam" placeholder="Achternaam" required>
          </i>
          <i class="fa-solid fa-cake-candles">
            <input type="date" name="geboortedatum" id="geboortedatum" placeholder="Geboortedatum" required>
          </i>
          <i class="fa-solid fa-flag">
            <input type="text" name="geboorteland" id="geboorteland" placeholder="Geboorteland" required>
          </i>
          <i class="fa-solid fa-id-card">
            <input type="number" name="bsnnummer" id="bsnnummer" placeholder="bsnnummer" required>
          </i>
          <i class="fa-solid fa-globe">
            <input type="text" name="nationaliteit" id="nationaliteit" placeholder="Nationaliteit" required>
          </i>
          <i class="submitlogo"><input type="submit" value="Toevoegen" id="submit">
          <img src="../Assets/Icons/rijksoverheid.png" alt="rijksoverheid" class="logo">
        </i>
        </div>
      </form>
    </div>
    <!-- tips container -->
    <div class="tipsContainer">
      <h3 class="titels">Tips voor het invullen:</h3>
      <ul>
        <li>Vul de volledige naam in zoals vermeld op officiële documenten.</li>
        <li>Controleer of het BSN-nummer correct is ingevuld (indien van toepassing).</li>
        <li>Gebruik geen speciale tekens in velden zoals naam en adres om fouten te voorkomen.</li>
        <li>Vermijd dubbele invoer: controleer of de persoon nog niet eerder is toegevoegd.</li>
        <li>Controleer alle gegevens voordat je op "Toevoegen" klikt om fouten te voorkomen.</li>
        <li>Bij foutmeldingen: lees de melding goed door en pas de invoer indien nodig aan.</li>
        <li>Let op de verplichte velden: deze moeten ingevuld worden voordat je het formulier kunt indienen.</li>
      </ul>
      
    </div>
  </div>
<!-- preloader -->
<script src="./../JavaScript/loader.js"></script>
<script src="./../JavaScript/dashNavbar.js"></script>
<script src="./../JavaScript/toastFeedback.js"></script>
</body>

</html>
</body>
</html>