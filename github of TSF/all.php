<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customers | BNB</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
         th, td {
            padding: 6px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {background-color:#f5f5f5;}
        a{
  text-decoration: none;
  color: black;
}
    a:hover {
        color: blue;
    }

    </style>
</head>
<body>
    <div class="navbar">
        <div class="topleft"><img src="bank.png"><b>Bengal National Bank</b></div>
        <div class="topright"> <a href="home.html">HOME</a>  &nbsp &nbsp &nbsp &nbsp <a href="transfer.html">TRANSACTION</a></div>
    </div>

<?php
    $servername='127.0.0.1';
    $username='root';
    $password='';
    $dbname='bank';
    $tablename='customers';
    $connection=mysqli_connect($servername, $username, $password, $dbname);
           
        echo "<div style ='margin-top: 14vh;'>";
		echo "<table cellspacing=5 cellpading=5 align=center>";
		echo '<tr>';
		echo "<th><font size=5 color=black>Customer ID</font></th>";
		echo "<th><font size=5 color=black>Customer Name</font></th>";
		echo "<th><font size=5  color=black>E-mail</font></th>";
		echo "<th><font size=5 color=black>Balance</font></th>";

		$sql2="select * from $tablename";
		$result2=mysqli_query($connection, $sql2);
		while($rows=mysqli_fetch_assoc($result2))
		{
			echo "<tr>";
			echo "<td><font color=black>".$rows['Cust_ID']."</font>"."</td>";
			echo "<td><font color=black>".$rows['Cust_Name']."</font>"."</td>";
			echo "<td><font color=black>".$rows['Email']."</font>"."</td>";
			echo "<td><font color=black>".$rows['Balance']."</td>"."</tr>";
		}
		echo "</table>";
        echo "</div>";
?>
</body>
</html>