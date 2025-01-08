<?php
include "../../private/conetion.php";
session_start();




if (isset($_POST['boekid'])) {
    $boekid = $_POST['boekid'];
    $userid = $_SESSION['userid'];



    $stmt = $pdo->prepare("DELETE FROM lenen WHERE boekid = :boekid AND userid = :userid");
    $stmt->bindParam(':boekid', $boekid);
    $stmt->bindParam(':userid', $userid);

    $stmt->execute();


    $stmt2 = $pdo->prepare("UPDATE boeken SET aantalexemplaren = aantalexemplaren + 1 WHERE boekid = :boekid");
    $stmt2->bindParam(':boekid', $boekid);
    $stmt2->execute();


    header('Location: ../index.php?page=Home2');
    exit();
} else {
    echo "geen boeken id of userid mee gegeven";
    exit();
}
?>

