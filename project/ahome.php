<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}


if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");
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
        <h3 id="heading">Welcome Admin</h3>
        <div id="center">
            <ul class="record">
                <li>Total Students  :<?php echo countRecord("select * from student",$db); ?></li>
                <li>Total Books  :<?php echo countRecord("select * from book",$db); ?></li>
                <li>Total Request  :<?php echo countRecord("select * from request",$db); ?></li>
                <li>Total Comments  :<?php echo countRecord("select * from comment",$db); ?></li>
            </ul>
        </div>
    </div>
    <div id="navi">
        <?php
        include "adminsideBar.php";
        ?>
    </div>
    <div id="footer">
        <p>Copyright &copy;Created by Sourabh Kadyan 2019</p>
    </div>
</div>

</body>
</html>

