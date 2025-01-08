<?php
session_start();
if (isset($_GET['page']))
{
    $page = $_GET['page'];

}
else
{
    $page = 'inlog';
}

include 'debug.php';
//debug();
?>




<!DOCTYPE html>
<html lang="en-us">

<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link  rel="stylesheet" href="css/stijl.css">
</head>

<body>
<?php
if (isset($_SESSION['role']))
{
    switch ($_SESSION['role'])
    {
        case "admin":
            include 'include/bar.inc2.php';
            break;
        case "User":
            include 'include/bar.inc.php';
            break;
    }
}
else
{
    include 'include/bar.inc3.php';
}


include 'include/'. $page .'.inc.php';
?>
</body>

</html>/