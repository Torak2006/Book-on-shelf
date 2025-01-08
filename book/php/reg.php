<?php

session_start();
include '../../private/conetion.php';

$naam = $_POST["naam"];
$tussenvoegsel = $_POST["tussenvoegsel"];
$achternaam = $_POST["achternaam"];
$woonplaats = $_POST["woonplaats"];
$straatnaam = $_POST["straatnaam"];
$huisnummer = $_POST["huisnummer"];
$postcode = $_POST["postcode"];
$date = $_POST["date"];
$email = $_POST["email"];
$telefoonnummer = $_POST["telefoonnummer"];
$wachtwoord = $_POST["wachtwoord"];
$role = $_POST["role"];

$sql = 'INSERT INTO user(naam, tussenvoegsel, achternaam, woonplaats, straatnaam, huisnummer, postcode, date, email, telefoonnummer, wachtwoord, role)
VALUES(:naam, :tussenvoegsel, :achternaam, :woonplaats, :straatnaam, :huisnummer, :postcode, :date, :email, :telefoonnummer, :wachtwoord, :role)';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':tussenvoegsel', $tussenvoegsel);
$stmt->bindParam(':achternaam', $achternaam);
$stmt->bindParam(':woonplaats', $woonplaats);
$stmt->bindParam(':straatnaam', $straatnaam);
$stmt->bindParam(':huisnummer', $huisnummer);
$stmt->bindParam(':postcode', $postcode);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefoonnummer', $telefoonnummer);
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->bindParam(':role', $role);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: ../Index.php?Page=inlog");
?>