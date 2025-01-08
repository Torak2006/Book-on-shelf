<?php
include "../../private/conetion.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reseverenid = $_POST['reseverenid'];
    $userid = $_SESSION['userid'];
    $afbeelding =$_POST['afbeelding'];
    try {
        $statement = $pdo->prepare('INSERT INTO reseveren (reseverenid, userid,afbeelding) VALUES (:reseverenid, :userid,:afbeelding)');
        $statement->bindParam(':reseverenid', $reseverenid);
        $statement->bindParam(':userid', $userid);
        $statement->bindParam(':afbeelding', $afbeelding);
        $statement->execute();

        header('location: ../index.php?page=Mijn_gereserveerde_boeken_pagina');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $_SESSION['warning'] = 'You have already reserved this book.';
            header("Location: ../index.php?page=Home2");
            exit;
        } else {

            echo 'An error occurred: ' . $e->getMessage();
        }
    }
} else {
   echo 'fuck';

}
?>

