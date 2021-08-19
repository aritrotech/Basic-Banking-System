<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="onecustphp.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Customer</title>
    <style>
        table{
            font-size: 5vh;
        }
        th {
            text-align: left;
        }
        td{
            padding-left: 3vh;
        }
        tr {
            padding-bottom: 3vh;
        }
       
    </style>
</head>
<body>
<div class="navbar">
        <div class="topleft"><img src="bank.png"><b>Bengal National Bank</b></div>
        <div class="topright"> <a href="home.html">HOME</a> &nbsp &nbsp &nbsp &nbsp &nbsp <a href="transfer.html">TRANSACTION</a> </div>
    </div>

<?php
    $servername='127.0.0.1';
    $username='root';
    $password='';
    $dbname='bank';
    $tablename='customers';
    $connection=mysqli_connect($servername, $username, $password, $dbname);
    $cid = $_REQUEST['cid'];
    echo "<div style ='margin-top: 14vh;'>";
    $sql1="select * from $tablename where Cust_ID = $cid";
    $result1=mysqli_query($connection, $sql1);
		while($rows=mysqli_fetch_assoc($result1))
		{
            echo "<table cellspacing=35 cellpading=10 align=center>";
            echo '<tr>';
            echo "<th>Customer ID: </th>";
            echo "<td>".$rows['Cust_ID']."</td>"."</tr>";
            echo '<tr>';
            echo "<th>Customer Name: </th>";
            echo "<td>".$rows['Cust_Name']."</td>"."</tr>";
            echo '<tr>';
            echo "<th>E-mail: </th>";
            echo "<td>".$rows['Email']."</td>"."</tr>";
            echo '<tr>';
            echo "<th> Balance: </th>";
            echo "<td>".$rows['Balance']."</td>"."</tr>";
        }
        echo "</table>";
        echo "</div>";
?>
</body>
</html>