<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="transactionhistory.css">
    <style media="screen" type="text/css">
        body{
            background: linear-gradient(to bottom left, red, blue);
        }
        footer{
            padding:10px;
        }
        th {
            text-align: center;
        }
        td,th{
            text-align: center;
        }
        nav{
            font-weight: bold;
        }
        body {
    background: white;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin: 0;
    background-repeat: no-repeat;
    background-size: 1800px 800px;
}

header {
    background-color: darkgray;
    position: relative;
    bottom: 30px;
}

nav {
    background-color: coral;
    display: flex;
    justify-content: space-evenly;
    padding: 8px;
    border-radius: 5px;
    float: right;
    font-family: times,georgia,serif;
    font-weight: 800;
}

h1 {
    text-align: left;
    font-weight: bold;
    font-size: 50px;
}

h1 img {
    height: 70px;
    width: 60px;
    position: relative;
    top: 20px;
}

a {
    text-decoration: none;
    color: maroon;
    padding: 4px 7px 4px 7px;
    border-radius: 2px;
}

table {
    font-family: times,georgia,sans-serif;
    display: table;
    margin: 0 50px;
    border-collapse: separate;
}

table th {
    background-color:deepskyblue;
    color: firebrick;
}

tr {
    color: black;
    font-weight: bold;
}

td,
th {
    border: 1px solid black;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color:palegoldenrod;
}
tr:nth-child(odd) {
    background-color: peru;
}

.link:hover {
    color: black;
}

footer {
    text-align: center;
    margin-top: auto;
    background-color: darkgray;
    color: maroon;
    padding: 15px;
    font-weight:bold;
}
    </style>
</head>

<body>
    <header>
        <h1 style="color:maroon;font-size: 60px">
            <a href="index.php"><img src="photo bank logo.png">City Bank</a>
        </h1>
        <nav style=" font-family: times,georgia,serif;">
            <a class="link" href="index.php">Home</a>
            <a class="link" href="About.html">About</a>
            <a class="link" href="view_customers.php">View Customers</a>
            <a class="link" href="transaction_history.php">Transaction History</a>
        </nav>
    </header>
    <table class="transactions">
        <tr>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Amount Transfered</th>
            <th>Date and Time (yy/mm/dd and hr/min/sec)</th>
        </tr>
        <?php
         $res=mysqli_query($conn,"SELECT * FROM transactions");
         while($row=mysqli_fetch_array($res))
        {
             echo "<tr>";
             echo "<td>"; echo $row["Sender"]; echo "</td>";
             echo "<td>"; echo $row["Receiver"]; echo "</td>";
             echo "<td>"; echo $row["Amount"]; echo "</td>";
             echo "<td>"; echo $row["Date and Time"]; echo "</td>";
             echo "</tr>";
        }
        ?>
     </table>
     <footer class="footer">
            <p style="color:maroon"><i>&#169; copyright 2023. Made by Apurbaa Nag</i></p>
            <p style="color:maroon"><i>All rights reserved. Powered by<a href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>
</body>