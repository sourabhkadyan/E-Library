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
        <h3 id="heading">View Comments Details</h3>

        <?php
        $sql="SELECT book.BTITLE,student.NAME,comment.COMM,comment.LOGS from comment INNER join book on book.BID=comment.BID INNER join student on comment.SID=student.ID";
        $res=$db->query($sql);
        if($res->num_rows>0)
        {
            echo "<table>
            <tr>
                <th>SNO</th>
                <th>BOOK</th>
                <th>NAME</th>
                <th>COMMENT</th>
                <th>LOGS</th>
            </tr>
            ";
            $i=0;
            while($row=$res->fetch_assoc())
            {
                $i++;
                echo"<tr>";
                echo"<td>{$i}</td>";
                echo"<td>{$row["BTITLE"]}</td>";
                echo"<td>{$row["NAME"]}</td>";
                echo"<td>{$row["COMM"]}</td>";
                echo"<td>{$row["LOGS"]}</td>";
                echo"</tr>";
            }

            echo"</table>";
        }
        else
        {
            echo "<P class='error'> No Comment Found</P>";
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

