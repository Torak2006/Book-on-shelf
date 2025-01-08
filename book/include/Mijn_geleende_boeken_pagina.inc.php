<?php

include '/xampp/htdocs/private/conetion.php';
$userid = $_SESSION['userid'];

$sql = "SELECT `userid`, `boekid`, `afbeelding` FROM `lenen` WHERE `userid` = :userid";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userid', $userid);

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="boeken">';
foreach ($rows as $row) {
    echo '<div class="book-box">';
    echo '<img src="images/' . $row['afbeelding'] . '" alt="' . $row['afbeelding'] . '">';
    echo '<form action="../../book/php/terug.php" method="post">';
    echo '<input type="hidden" name="boekid" value="' . $row['boekid'] . '">';
    echo '<input type="hidden" name="afbeelding" value="' . $row['afbeelding'] . '">';
    echo '<button class="AdminButtonDelete" type="submit">Breng terug</button>';
    echo '</form>';
    echo '</div>';
}

echo '</div>';


?>
