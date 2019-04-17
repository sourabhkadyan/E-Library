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
        <h3 id="heading">User Login Here.</h3>
        <div id="center">
            <?php
            if(isset($_POST["submit"]))
            {
                $sql="SELECT * FROM student where NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}'";
                $res=$db->query($sql);
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    $_SESSION["ID"]=$row["ID"];
                    $_SESSION["NAME"]=$row["NAME"];
                    header("location:uhome.php");
                }
                else
                {
                    echo"<p class='error'> Invalid User Details</p>";
                }
            }
            ?>
            <form class="box" action="ulogin.php" method="post">
                <label>Name</label>
                <input type="text" name="name" placeholder="name" required>
                <label>Password</label>
                <input type="password" name="pass" placeholder="password" required>
                <input type="submit" name="submit" value="Login Now">
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
