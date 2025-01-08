<?php

include "../../private/conetion.php";
session_start();
$loggedin = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT email, wachtwoord, role, userid FROM user WHERE email = :email AND wachtwoord = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1) {
            $_SESSION["loggedin"] = true;
            $_SESSION["role"] = $result["role"];
            $_SESSION['userid'] = $result['userid'];

            var_dump('userid');

          if($_SESSION['role'] == 'User')
          {
              header("Location: ../index.php?page=Home2");
              exit();
          }
          else if($_SESSION['role'] == 'admin')
          {
          header("Location: ../index.php?page=Home");
            exit();
          }
        } else {

            $_SESSION["loggedin"] = false;
            header("Location: ../index.php?page=inlog");
            exit();
        }
    } catch (PDOException $e) {
        echo 'kan niet connecten met de database ';
    }
}
?>
