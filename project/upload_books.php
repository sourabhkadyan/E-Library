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
        <h1><a href="index.php">E-LIBRARY</a></h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">Upload Books</h3>
        <div id="center">

            <?php
            if(isset($_POST["submit"])) {
                $target_dir = 'upload/';
                $target_file = $target_dir . basename($_FILES['filename']['name']);

                if (move_uploaded_file($_FILES['filename']['tmp_name'], $target_file))
                {
                    $sql = "insert into book(BTITLE,KEYWORDS,FILE) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                    $db->query($sql);
                    echo "<p class='success'>Book Uploaded Successfully</p>";
                }
                else
                    {
                    echo "<p class='error'>Error in Upload</p>";
                }
            }
            ?>

            <form class="box" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" >
                <label>Book Title</label>
                <input type="text" name="bname" placeholder="Book Name" required>
                <label>Keyword</label>
                <input type="text" name="keys" placeholder="Keyword" required>
                <label>Upload File</label>
                <input type="file" name="filename" required>
                <input type="submit" name="submit" value="Upload Book">
            </form>
        </div>


    </div>
    <div id="navi">
        <?php
        include "adminsideBar.php";5
        ?>
    </div>
    <div id="footer">
        <p>Copyright &copy;Created by Sourabh Kadyan 2019</p>
    </div>
</div>

</body>
</html>

