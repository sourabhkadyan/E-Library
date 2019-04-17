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
        <h3 id="heading">View Request Details</h3>

        <?php
        $sql="SELECT STUDENT.NAME,request.MES,request.LOGS from STUDENT inner join request on STUDENT.ID=request.ID";
        $res=$db->query($sql);
        if($res->num_rows>0)
        {
            echo "<table>
            <tr>
                <th>SNO</th>
                <th>NAME</th>
                <th>MESSAGE</th>
                <th>LOGS</th>
            </tr>
            ";
            $i=0;
            while($row=$res->fetch_assoc())
            {
                $i++;
                echo"<tr>";
                echo"<td>{$i}</td>";
                echo"<td>{$row["NAME"]}</td>";
                echo"<td>{$row["MES"]}</td>";
                echo"<td>{$row["LOGS"]}</td>";
                echo"</tr>";
            }

            echo"</table>";
        }
        else
        {
            echo "<P class='error'> No Request Record Found</P>";
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

