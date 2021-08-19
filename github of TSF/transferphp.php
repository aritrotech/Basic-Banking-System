<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Gateway</title>
    <style>
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
        color: red;
    }
    </style>
</head>
<body>

<?php

    $servername='127.0.0.1';
    $username='root';
    $password='';
    $dbname='bank';
    $tablename1='customers';
    $tablename2='transfers';
    $connection=mysqli_connect($servername, $username, $password, $dbname);

    $from = $_REQUEST['from'];
    $to = $_REQUEST['to'];
    $amount = $_REQUEST['amount'];

    $sql1 = "insert into $tablename2 values('$from', '$to', '$amount')";
    $result1 = mysqli_query($connection, $sql1);
	if($result1)
	{
        $sql4 = "select * from $tablename1 where Cust_ID = $from";
        $sql5 = "select * from $tablename1 where Cust_ID = $to";
        $result4 = mysqli_query($connection, $sql4);
        $result5 = mysqli_query($connection, $sql5);
        if($result4==true && $result5==true)
        {
            $sql2 = "update $tablename1 set Balance = Balance - $amount where Cust_ID = $from ";
            $sql3 = "update $tablename1 set Balance = Balance + $amount where Cust_ID = $to ";
            $result2 = mysqli_query($connection, $sql2);
            $result3 = mysqli_query($connection, $sql3);
            if($result2==true && $result3==true)
            {
                echo '<center>';
                echo '<font size=8>'."Money transfer succesful".'</font><br><br>';
                echo "<a href='home.html'> HOME </a> &nbsp &nbsp &nbsp &nbsp <a href='all.php'> ALL CUSTOMERS </a> &nbsp &nbsp &nbsp &nbsp <a href='transfer.html'> TRANSACTION </a>";
                echo '</center>';
            }
        }
        else
        {
            echo '<center>';
            echo '<font size=8>'."Money transfer unsuccesful...Return to: ".'</font><br><br>';
            echo "<a href='home.html'> HOME </a> &nbsp &nbsp &nbsp &nbsp <a href='all.php'> ALL CUSTOMERS </a> &nbsp &nbsp &nbsp &nbsp <a href='transfer.html'> TRANSACTION </a>";
            echo '</center>';
        }
    }
?>

</body>
</html>