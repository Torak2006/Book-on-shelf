<?php
if(isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'gebruiker')
    {
        include 'include/bar.inc.php';
    }
    if ($_SESSION['role'] == 'admin')
    {
        include 'include/bar.inc2.php';
    }
}
else
{
    include 'include/bar.inc3.php';
}

?>
