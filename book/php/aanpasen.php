
<?php
include "../../private/conetion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $boekid = $_POST['boekid'];
    $naam = $_POST['naam'];
    $schrijver = $_POST['schrijver'];
    $genre = $_POST['genre'];
    $ISBNnummer = $_POST['ISBNnummer'];
    $taal = $_POST['taal'];
    $aantalpaginas = $_POST['aantalpaginas'];
    $aantalexemplaren = $_POST['aantalexemplaren'];
    $afbeelding = $_POST['afbeelding'];

    $sql = "UPDATE boeken SET naam = :naam, schrijver = :schrijver, genre = :genre, ISBNnummer = :ISBNnummer, taal = :taal, aantalpaginas = :aantalpaginas, aantalexemplaren = :aantalexemplaren, afbeelding = :afbeelding WHERE boekid = :boekid";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':naam', $naam);
    $statement->bindParam(':schrijver', $schrijver);
    $statement->bindParam(':genre', $genre);
    $statement->bindParam(':ISBNnummer', $ISBNnummer);
    $statement->bindParam(':taal', $taal);
    $statement->bindParam(':aantalpaginas', $aantalpaginas);
    $statement->bindParam(':aantalexemplaren', $aantalexemplaren);
    $statement->bindParam(':afbeelding', $afbeelding);
    $statement->bindParam(':boekid', $boekid);
    $statement->execute();

    header('location: ../index.php?page=Home');
}
?>
