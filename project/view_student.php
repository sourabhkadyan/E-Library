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
</head>
<body>
<div id="container">
    <div id="header">
        <h1><a href="index.php">E-LIBRARY</a></h1>
    </div>
    <div id="wrapper">
        <h3 id="heading">View Student Details</h3>

        <?php
        $sql="SELECT * FROM student";
        $res=$db->query($sql);
        if($res->num_rows>0)
        {
            echo "<table>
            <tr>
                <th>SNO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
            </tr>
            ";
            $i=0;
            while($row=$res->fetch_assoc())
            {
                $i++;
                echo"<tr>";
                echo"<td>{$i}</td>";
                echo"<td>{$row["NAME"]}</td>";
                echo"<td>{$row["MAIL"]}</td>";
                echo"<td>{$row["DEP"]}</td>";
                echo"</tr>";
            }

            echo"</table>";
        }
        else
            {
                echo "<P class='error'> No Student Record Found</P>";
            }
        ?>


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

