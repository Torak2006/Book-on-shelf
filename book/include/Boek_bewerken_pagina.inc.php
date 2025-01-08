<?php
include '/xampp/htdocs/private/conetion.php';

$boekid = $_GET['boekid'];


$sql = 'SELECT * FROM boeken WHERE boekid = :boekid';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':boekid', $boekid);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>



<div class="bob">
    <form action="PHP/aanpasen.php" method="post">
        <input type="text" name="naam" placeholder="naam" value="<?= $result["naam"] ?>">
        <input type="text" name="schrijver" placeholder="schrijver" value="<?= $result['schrijver'] ?>">
        <input type="text" name="genre" placeholder="genre" value="<?= $result['genre'] ?>">
        <input type="number" name="ISBNnummer" placeholder="ISBNnummer" value="<?= $result['ISBNnummer'] ?>">
        <input type="text" name="taal" placeholder="taal" value="<?= $result['taal'] ?>">
        <input type="number" name="aantalpaginas" placeholder="aantalpaginas" value="<?= $result['aantalpaginas'] ?>">
        <input type="number" name="aantalexemplaren" placeholder="aantalexemplaren" value="<?= $result['aantalexemplaren'] ?>">
        <input type="text" name="afbeelding" placeholder="afbeelding" value="<?= $result['afbeelding'] ?>">


        <?php if (isset($result['boekid'])): ?>
            <input type="number" name="boekid" value="<?= $result['boekid'] ?>" required>
        <?php endif; ?>

        <div>
            <button type="submit" class="btn3">bewerk</button>
        </div>
    </form>
</div>


</body>

</html>

