<?php
include "../../private/conetion.php";

try {
    $naam = $_POST['naam'];
    $schrijver = $_POST['schrijver'];
    $genre = $_POST['genre'];
    $ISBNnummer = $_POST['ISBNnummer'];
    $taal = $_POST['taal'];
    $aantalpaginas = $_POST['aantalpaginas'];
    $aantalexemplaren = $_POST['aantalexemplaren'];
    $afbeelding = $_POST['afbeelding'];

    $sql = 'INSERT INTO boeken (naam, schrijver, genre, ISBNnummer, taal, aantalpaginas, aantalexemplaren, afbeelding) 
        VALUES (:naam, :schrijver, :genre, :ISBNnummer, :taal, :aantalpaginas, :aantalexemplaren, :afbeelding)';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':naam', $naam);
    $statement->bindParam(':schrijver', $schrijver);
    $statement->bindParam(':genre', $genre);
    $statement->bindParam(':ISBNnummer', $ISBNnummer); // Update variable name here
    $statement->bindParam(':taal', $taal);
    $statement->bindParam(':aantalpaginas', $aantalpaginas);
    $statement->bindParam(':aantalexemplaren', $aantalexemplaren);
    $statement->bindParam(':afbeelding', $afbeelding);
    $statement->execute();
    header('location: ../index.php?page=Home');

} catch(Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
