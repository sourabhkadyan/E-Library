<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>E-LIBRARY</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
    <div id="header">
        <h1><a href="index.php">E-LIBRARY</a></h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">Welcome <?php  echo $_SESSION["NAME"];  ?></h3>

    </div>
    <div id="navi">
        <?php
        include "usersideBar.php";
        ?>
    </div>
    <div id="footer">
        <p>Copyright &copy;Created by Sourabh Kadyan 2019</p>
    </div>
</div>

</body>
</html>

