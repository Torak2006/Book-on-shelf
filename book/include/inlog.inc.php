
<div class="wrapper">
    <form action="php/inlog.php" method="post">
        <h1>login</h1>
        <div class="input-box">
               <input type="email" name="email" id="email" placeholder="email" required>
               <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="wachtwoord"
                   required>
            <i class='bx bx-lock-alt' ></i>
            <button type="submit" class="btn1">login </button>
        </div>

<?php
if (isset($_SESSION['melding']))
{
    echo $_SESSION['melding'];
    unset($_SESSION['melding']);
}



?>