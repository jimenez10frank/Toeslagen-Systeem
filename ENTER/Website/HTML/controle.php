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
    <title>Document</title>
    <link rel="stylesheet" href="./../CSS/body.css">
    <link rel="stylesheet" href="./../CSS/dashNavbar.css">
    <link rel="stylesheet" href="./../CSS/footer.css">
    <link rel="stylesheet" href="./../CSS/toast.css">
    <link rel="stylesheet" href="./../CSS/controle.css">
    <script src="./../JavaScript/dashNavbar.js" defer></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.2.2/swiper-bundle.min.css">
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
                    <a href="dashboard.php" class="nav-link">
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
                        <li class="nav-item"><a href="#" class="nav-link dropdown-link">Toevoegen</a></li>
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
    <div class="tContainer">
        <div class="tWrapper">
            <!--  slider container -->
            <div class="card">
                <div class="swiper">
                    <!-- wrapper  -->
                    <div class="swiper-wrapper">
                        <!-- slides -->
                        <div class="swiper-slide">
                            <img src="./../Assets/Images/income.png" alt="foto">
                            <h2>Controleer uw recht op toeslagen</h2>
                            <h3 class="curv cSpec">Vul uw gegevens in en ontdek of u in aanmerking komt voor toeslagen
                                zoals
                                zorgtoeslag, huurtoeslag of kinderopvangtoeslag.</h4>
                        </div>
                        <div class="swiper-slide">
                            <img src="./../Assets/Images/investment.png" alt="foto">
                            <h2>Bruto jaarinkomen</h2>
                            <h3 class="curv">Vul hier uw geschatte bruto jaarinkomen in.</h3>
                            <input class="inkomen" type="number" name="inkomen" placeholder="€XX.XXX Bruto jaarinkomen">
                        </div>
                        <div class="swiper-slide">
                            <div>
                                <img src="./../Assets/Images/family.png" alt="foto">
                            </div>
                            <h2>Gezinssituatie</h2>
                            <h3 class="curv" id="tAantalK">Kies of u alleenstaand bent, een partner heeft of kinderen
                                heeft.</h3>
                            <div class="tInputs">
                                <label>
                                    <input type="radio" name="gezinssituatie" value="alleenstaand">
                                    Alleenstaand
                                </label>
                                <label>
                                    <input type="radio" name="gezinssituatie" value="met_partner">
                                    Met Partner
                                </label>
                                <label>
                                    <input type="radio" name="gezinssituatie" value="met_kinderen">
                                    Met Kinderen
                                </label>
                            </div>

                            <div id="kinderen_aantal" style="display: none;">
                                <input type="number" id="aantal_kinderen" name="aantal_kinderen" min="1"
                                    placeholder="Aantal kinderen">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./../Assets/Images/management.png" alt="foto">
                            <h2>Huurprijs</h2>
                            <h3 class="curv">Voer uw maandelijkse huurprijs in (indien van toepassing)</h3>
                            <div>
                                <input type="number" name="inkomen" placeholder="Huurprijs" id="huurprijs">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="./../Assets/Images/insurance.png" alt="foto">
                            <h2>Type verzekering</h2>
                            <h3 class="curv">Geef aan of u een basis- of aanvullende zorgverzekering heeft.</h3>
                            <div class="tVerzekering">
                                <select name="verzekering" id="verzekering">
                                    <option value="" selected disabled>👉 Welke zorgverzekering heeft u?</option>
                                    <option value="basisverzekering">Basisverzekering</option>
                                    <option value="aanvullende_verzekering">Aanvullende verzekering</option>
                                    <option value="Geen verzekering">Geen verzekering</option>
                                </select>
                            </div>
                        </div>
                        <div class="swiper-slide tOpvanguren" style="display: none;">
                            <img src="./../Assets/Images/boy.png" alt="foto">
                            <h2>Kinderopvanguren</h2>
                            <h3 class="curv">Vul het aantal opvanguren per week in (indien van toepassing).</h3>
                            <div>
                                <input type="number" name="kinderopvanguren" placeholder="Kinderopvanguren"
                                    id="kinderopvanguren">
                            </div>
                        </div>
                        <div class="swiper-slide finishlijn">
                            <div>
                                <img src="./../Assets/Images/achievement.png" alt="foto">
                            </div>
                            <h2>Finishlijn</h2>
                            <h3>U heeft alles ingevuld</h3>
                            <input class="tFbutton" type="submit" value="Controleer mijn toeslagen">
                        </div>
                        <!-- Swiper -->
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="toastbox">
    </div>
    <script src="./../JavaScript/toastFeedback.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./../JavaScript/carousel.js"></script>
</body>

</html>