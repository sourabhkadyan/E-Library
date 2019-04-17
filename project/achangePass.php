<?php
session_start();
include "database.php";



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
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
<div id="container">
    <div id="header">
        <<h1><a href="index.php">E-LIBRARY</a></h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">Change Password</h3>
<div id="center">

    <?php
    if(isset($_POST["submit"]))
    {
        $sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
        $res=$db->query($sql);
        if($res->num_rows>0)
        {
            $s="Update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
            $db->query($s);
            echo"<p class='success'>Password Changed succesfully</p>";
        }
        else
        {
            echo"<p class='error'>Invalid Password</p>";
        }
    }
    ?>

    <form class="box" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Old Password</label>
    <input type="password" name="opass" placeholder="Old Password" required>
    <label>New Password</label>
    <input type="password" name="npass" placeholder="New Password" required>
        <input type="submit" name="submit" value="Update Password">
    </form>
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

