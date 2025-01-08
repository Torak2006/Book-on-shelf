<?php
include '/xampp/htdocs/private/conetion.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $boekid = $_GET['boekid'];

    $statement = $pdo->prepare("DELETE FROM boeken WHERE boekid = :boekid");
    $statement->bindParam(':boekid', $boekid, PDO::PARAM_INT);
    $statement->execute();

    header('location: ../index.php?page=Home');
    exit();
}
