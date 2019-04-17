<?php

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
        <h3 id="heading">New User</h3>
        <div id="center">

            <?php
            if(isset($_POST["submit"])) {
                $sql = "insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                $db->query($sql);
                echo "<p class='success'>User Registration Successfully</p>";
            }

            ?>

            <form class="box" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"  >
                <label>Name</label>
                <input type="text" name="name" placeholder="name" required>
                <label>Email ID</label>
                <input type="email" name="mail" placeholder="Email" required>
                <label>Password</label>
                <input type="password" name="pass" placeholder="password" required>

                <select type="text" name="dep" required>
                    <option value="">Select</option>
                    <option value="BCA">BCA</option>
                    <option value="B.Sc CS">B.Sc CS</option>
                    <option value="MCA">MCA</option>
                    <option value="B.Tech CSE">B.Tech CSE</option>
                    <option value="OTHERS">OTHERS</option>
                </select>
                <input type="submit" name="submit" value="Register now">
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

