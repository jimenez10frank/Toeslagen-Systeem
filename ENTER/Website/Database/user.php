<?php

require 'db.php';
$userDB = new User();



class User
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }


    // Gebruikers gegevens ophalen met email voor het verificatie van inlog
    public function loginGebruiker($email)
    {
        // retourneert gegevens of False; gegevens als de query succesvol uitgevoerd is en gebruiker gevonden is, anders False
        return $this->pdo->run("SELECT * FROM gebruiker WHERE email = :email", ["email" => $email])->fetch();
    }



    // Gebruiker gegevens opslaan in de database 
    public function registerUser($voornaam, $achternaam, $geboortedatum, $geslacht, $email, $telefoonNummer, $wachtwoord)
    {
        $hashed = password_hash($wachtwoord, PASSWORD_DEFAULT);

        // retourneert True of False; True als de query succesvol uitgevoerd is, anders False
        return $this->pdo->run("INSERT INTO gebruiker (voornaam, achternaam, geboortedatum, geslacht, email, telefoonNummer, wachtwoord) 
        VALUES (:voornaam, :achternaam, :geboortedatum, :geslacht, :email, :telefoonNummer, :wachtwoord)",
            [
                "voornaam" => $voornaam,
                "achternaam" => $achternaam,
                "geboortedatum" => $geboortedatum,
                "geslacht" => $geslacht,
                "email" => $email,
                "telefoonNummer" => $telefoonNummer,
                "wachtwoord" => $hashed
            ]
        );
    }

    // gebruikers email ophalen voor duidelijke feedbacks
    public function selectUserEmail($email)
    {
        // dit retourneert een True of False; True als het email gevonden is anders False
        return $this->pdo->run("SELECT email FROM gebruiker WHERE email = :email", ['email' => $email])->fetch();
    }

    // gebruikers postadres ophalen met id (werkt nog niet, omdat ID niet in een session variabel zit)
    public function postadresOphalen($id) {

        // retourneert de adres, stad en postcode van de gebruiker
        return $this->pdo->run("SELECT adres, stad, postcode FROM adres WHERE gebruiker_id = :id", ['id' => $id]);
    }

    public function insertPartnerDetails($naam, $achternaam, $geboortedatum, $geboorteland, $bsnnummer, $nationaliteit)
    {
        // Dit retourneert True als de query succesvol uitgevoerd is, anders False
        return $this->pdo->run("INSERT INTO partner (naam, achternaam, geboortedatum, geboorteland, bsnnummer, nationaliteit) 
        VALUES (:naam, :achternaam, :geboortedatum, :geboorteland, :bsnnummer, :nationaliteit)",
            [
                "naam" => $naam,
                "achternaam" => $achternaam,
                "geboortedatum" => $geboortedatum,
                "geboorteland" => $geboorteland,
                "bsnnummer" => $bsnnummer,
                "nationaliteit" => $nationaliteit
            ]
        );
    }
    
}