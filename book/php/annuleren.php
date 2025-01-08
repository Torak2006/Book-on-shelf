<?php
include "../../private/conetion.php";
session_start();




if (isset($_POST['reseverenid'])) {
    $reseverenid = $_POST['reseverenid'];




    $stmt = $pdo->prepare("DELETE FROM reseveren WHERE reseverenid = :reseverenid");
    $stmt->bindParam(':reseverenid', $reseverenid);


    $stmt->execute();





    header('Location: ../index.php?page=Home2');
    exit();
} else {
    echo "geen boeken id of userid mee gegeven";
    exit();
}
