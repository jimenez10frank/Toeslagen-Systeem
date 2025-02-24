DROP DATABASE IF EXISTS belastingdienst;

CREATE DATABASE belastingdienst;

USE belastingdienst;

CREATE TABLE `gebruiker` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `voornaam` VARCHAR(255) NOT NULL,
    `achternaam` VARCHAR(255) NOT NULL,
    `geboortedatum` DATE NOT NULL,
    `geslacht` ENUM('man', 'vrouw', 'anders') NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `telefoonNummer` VARCHAR(20) NOT NULL UNIQUE,
    `wachtwoord` VARCHAR(255) NOT NULL,
    `aangemaakt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `bijgewerkt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `aanvraag` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `aanvraagdatum` timestamp NOT NULL DEFAULT current_timestamp(),
    `status` ENUM(
        'In behandeling',
        'goedekeurd',
        'afgewezen'
    ) NOT NULL DEFAULT 'In behandeling',
    `gebruiker_id` int(11) NOT NULL,
    `toeslagtype` ENUM(
        'huurtoeslag',
        'zorgtoeslag',
        'kinderopvangtoeslag'
    ) NOT NULL,
    `gezinsgrootte` int(10) NOT NULL,
    `inkomen` decimal(10, 2) NOT NULL,
    `aangemaakt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `bijgewerkt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`id`)
);

CREATE TABLE `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(100) NOT NULL UNIQUE,
    `wachtwoord` varchar(255) NOT NULL,
    `aanvraag_id` int(11) NOT NULL,
    `aangemaakt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `bijgewerkt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`aanvraag_id`) REFERENCES `aanvraag` (`id`)
);

CREATE TABLE `adres` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `adres` varchar(255) NOT NULL,
    `stad` varchar(255) NOT NULL,
    `postcode` varchar(6) NOT NULL,
    `gebruiker_id` int(11) NOT NULL,
    `aangemaakt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `bijgewerkt_op` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker` (`id`)
);

-- this is a foreign key to the user admin table and aanvraag table so dont forget to put it
CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `geboortedatum` date NOT NULL,
  `geboorteland` varchar(255) NOT NULL,
  `bsnnummer` int(255) NOT NULL,
  `nationaliteit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

SELECT * FROM gebruiker;
SELECT * FROM aanvraag;