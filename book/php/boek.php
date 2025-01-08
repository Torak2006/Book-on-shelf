<?php
include '/xampp/htdocs/private/conetion.php';
$sql = "SELECT `boekid`, `naam`, `schrijver`, `genre`, `ISBNnummer`, `taal`, `aantalpaginas`, `aantalexemplaren`, `afbeelding` FROM `boeken`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<?php
foreach ($rows as $row) {
    echo '<div class="book-box">';
    echo '<img src="images/' . $row['afbeelding'] . '" alt="' . $row['afbeelding'] . '">';

    echo '<p class="information">naam: ' . $row['naam'] . '</p>';
    echo '<p class="information">Schrijver: ' . $row['schrijver'] . '</p>';
    echo '<p class="information">Genre: ' . $row['genre'] . '</p>';
    echo '<p class="information">ISBNnummer: ' . $row['ISBNnummer'] . '</p>';
    echo '<p class="information">Taal: ' . $row['taal'] . '</p>';
    echo '<p class="information">Paginas: ' . $row['aantalpaginas'] . '</p>';
    echo '<p class="information">Exemplaren: ' . $row['aantalexemplaren'] . '</p>';



    echo '<form action="delete.php" method="get">';
    echo '<td> <a id="link" href=PHP/delete.php?boekid=' . $row['boekid']  . '>verwijderen</a> </td>';
    echo '</form>';

    echo '<td> <a id="link" href=Index.php?page=Boek_bewerken_pagina&boekid=' . $row['boekid'] . '>Bewerken</a> </td> ';
    echo '</form>';

    echo '</div>';
}
?>


