<?php
include "../../private/conetion.php";

session_start();

if (isset($_POST['boekid'])) {
    $boekid = $_POST['boekid'];
    $afbeelding = $_POST['afbeelding'];
    $userid = $_SESSION['userid'];

    $stmtCheck = $pdo->prepare("SELECT COUNT(*) AS count FROM lenen WHERE boekid = :boekid AND userid = :userid");
    $stmtCheck->bindParam(':boekid', $boekid);
    $stmtCheck->bindParam(':userid', $userid);
    $stmtCheck->execute();
    $borrowedCount = $stmtCheck->fetchColumn();

    if ($borrowedCount > 0) {
        header("Location: ../index.php?page=Home2");
        exit();
    }

    $stmt = $pdo->prepare("SELECT aantalexemplaren FROM boeken WHERE boekid = :boekid");
    $stmt->bindParam(':boekid', $boekid);
    $stmt->execute();
    $books = $stmt->fetch(PDO::FETCH_ASSOC);
    $aantalexemplaren = $books['aantalexemplaren'];

    if ($aantalexemplaren > 0) {
        $stmt = $pdo->prepare("INSERT INTO lenen (boekid, userid,afbeelding) VALUES (:boekid, :userid, :afbeelding)");
        $stmt->bindParam(':boekid', $boekid);
        $stmt->bindParam(':userid', $userid);
        $stmt->bindparam(':afbeelding', $afbeelding);
        $stmt->execute();


        $stmt2 = $pdo->prepare("UPDATE boeken SET aantalexemplaren = aantalexemplaren - 1 WHERE boekid = :boekid");
        $stmt2->bindParam(':boekid', $boekid);
        $stmt2->execute();

        header('Location: ../index.php?page=Mijn_geleende_boeken_pagina');
        exit();
    } else {
        header('Location: ../index.php?page=Home2');
        exit();
    }
} else {
    header('Location: ../index.php?page=Home2');
    exit();
}
?>
