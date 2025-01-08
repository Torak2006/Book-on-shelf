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


    echo '<input type="hidden" name="Boekid" value="' . $row['boekid'] . '">';


     if ($row['aantalexemplaren'] == 0)
            {
                echo '<form action="php/reseveren.php" method="post">';
                echo '<input type="hidden" name="boekid" value="' . $row['boekid'] . '">';
                echo '<input type="hidden" name="afbeelding" value="' . $row['afbeelding'] . '">';
                echo '<td> <button type="submit" name="action" value="reseveren">reseveren</button> </td>';
                echo '</form>';

            }

            if ($row['aantalexemplaren'] >= 1)
            {
                echo '<form action="php/lenen.php" method="post">';
                echo '<input type="hidden" name="boekid" value="' . $row['boekid'] . '">';
                echo '<input type="hidden" name="afbeelding" value="' . $row['afbeelding'] . '">';
                echo '<td> <button type="submit" name="action" value="lenen">lenen</button> </td>';
                echo '</form>';

            }

    echo '</div>';

}

?>

