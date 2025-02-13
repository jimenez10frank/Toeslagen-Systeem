<?php

class Database
{
    public $pdo;
    # connectie dets
    public function __construct($db = "belastingdienst", $user = "root", $pwd = "", $host = "127.0.0.1:3306")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    // Run je queries, maar sneller :)
    public function run($sql, $plcd = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($plcd);
        return $stmt;
    }

    // controleert of de gebruiker is ingelogd; en verwijst ze naar dashboard
    public function sendToDashboard()
    {
        // verwijst ingelogde gebruikers naar dashboard
        if (isset($_SESSION['logged']) && isset($_SESSION['gebruikerID'])) {
            $this->feedback("Je dient eerst uit te loggen om deze actie te kunnen uitvoeren.", "information");
            $this->pageRef("dashboard.php");
        }
    }

    // controleert of de gebruiker autorisatie heeft
    public function sendAway()
    {
        // verwijst gebruiker naar inlog pagina
        if (!isset($_SESSION['logged']) || !isset($_SESSION['gebruikerID'])) {
            // feedback/return
            $this->feedback("Je hebt geen autorisatie!", 'cross');
            $this->pageRef('login.php');
        }
    }

    // maakt een feedback session met gegeven bericht en icoontje, dit wordt vervolgens weergegevens als een toast(feedback)(serverside)
    public function feedback($msg, $icon)
    {
        // Feedback
        $_SESSION['gebruikerFeedback'] = [
            'message' => $msg,
            'icon' => $icon
        ];
    }


    // verwijst gebruikers naar gegeven lokatie(serverSide)
    public function pageRef($loc)
    {
        // header
        header("Location: " . strval($loc));
        exit();
    }
}

