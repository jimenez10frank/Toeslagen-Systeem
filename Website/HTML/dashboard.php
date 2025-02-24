<?php

// SS
session_start();
// DB ophalen
require_once './../Database/user.php';


// controleer of de gebruiker ingelogd is...
$userDB->pdo->sendAway();




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" href="./../Assets/Icons/relIcon.png">
  <link rel="stylesheet" href="./../CSS/body.css">
  <link rel="stylesheet" href="./../CSS/dashboard.css">
  <link rel="stylesheet" href="./../CSS/dashNavbar.css">
  <link rel="stylesheet" href="./../CSS/footer.css">
  <link rel="stylesheet" href="./../CSS/toast.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
</head>

<body>
  <div class="bg"></div>
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
          <a href="controle.php" class="nav-link">
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
  <div class="dContainer">
    <div class="dWrapper">
      <div class="dHeader">
        <h2>Welkom op belastingdienst <?=  ucfirst(strtolower(htmlspecialchars($_SESSION['voornaam']))) ?></h2>
        <span class="spanStyle"><?=  htmlspecialchars(date("l jS \\ F Y h:i")) . "<br>" ?></span>
      </div>
      <div class="dContent">
        <div class="dControle">
          <a href="controle.php">
            <span class="material-symbols-rounded">
              money_bag
            </span>
            <p>Toeslagrecht controle</p>
            <span class="material-symbols-rounded naar">
              chevron_right
            </span>
          </a>
        </div>
        <div class="dMeldingen">
          <a href="#">
            <span class="material-symbols-rounded">
              inbox
            </span>
            <p>Meldingen</p>
            <span class="material-symbols-rounded naar">
              chevron_right
            </span>
          </a>
        </div>
        <div class="dGegevens">
          <a href="#">
            <span class="material-symbols-rounded">
              person
            </span>
            <p>Mijn gegevens</p>
            <span class="material-symbols-rounded naar">
              chevron_right
            </span>
          </a>
          <span class="sGrijs">bekijk uw persoonlijke gegevens</span>
          <ul>
            <li>Email</li>
            <li>Adress</li>
            <li>Telefoon</li>
            <li>Inkomen</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Fancy Feedback  -->
  <div id="toastbox">
    <!-- // Toast weergeven  als die bestaat//  -->
    <?php if (isset($_SESSION['gebruikerFeedback'])): ?>
      <div class="toast uflp"> dashboard toast !!
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
  <script src="./../JavaScript/dashNavbar.js"></script>
  <script src="./../JavaScript/toastFeedback.js"></script>
</body>

</html>