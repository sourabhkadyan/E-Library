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
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
<div id="container">
    <div id="header">
        <h1><a href="index.php">E-LIBRARY</a></h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">New Book Request</h3>
        <div id="center">

            <?php
            if(isset($_POST["submit"]))
            {
                $sql="insert into request (ID,MES,LOGS) values ({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
                $res=$db->query($sql);


                    echo"<p class='success'>Request Sent To Admin</p>";

            }
            ?>

            <form class="box" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label>Message</label>
                <textarea required name="mess"></textarea>
                <input type="submit" name="submit" value="Sent Request">
            </form>
        </div>


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

