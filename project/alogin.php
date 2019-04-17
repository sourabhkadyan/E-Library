<?php
session_start();
include "database.php";
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
            <h3 id="heading">Admin Login Here.</h3>
        <div id="center">
            <?php
            if(isset($_POST["submit"]))
            {
                $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
                $res=$db->query($sql);
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    $_SESSION["AID"]=$row["AID"];
                    $_SESSION["ANAME"]=$row["ANAME"];
                    header("location:ahome.php");
                }
                else
                {
                    echo"<p class='error'> Invalid User Details</p>";
                }
            }
            ?>
        <form class="box" action="alogin.php" method="post">
            <label>Name</label>
            <input type="text" name="aname" placeholder="Username" required>
            <label>Password</label>
            <input type="password" name="apass" placeholder="Password" required>
            <input type="submit" name="submit" value="Login">
        </form>
        </div>
    </div>
    <div id="navi">
        <?php
        include "sideBar.php";
        ?>
    </div>
    <div id="footer">
        <p>Copyright &copy;Created by Sourabh Kadyan 2019</p>
    </div>
</div>

</body>
</html>
