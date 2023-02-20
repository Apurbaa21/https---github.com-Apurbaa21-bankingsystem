<?php
include "connection.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Customers</title>
        <link rel="stylesheet" href="viewcustomers.css">
        <style media="screen" type="text/css">
            body{
                background: whitesmoke;
            }
            nav{
                font-weight: bold;
            }
            
            table{
                position: relative;
                bottom:20px;
            }
            table a button {
                border-style: solid;
                font-weight: bold;
                border-radius: 3px;
                font-size: 15px;
                padding: 9px;
                color: black;
                background-color: lightseagreen;
                transition: 0.20s;
            }
            
            table a button:hover {
                color: black;
                background-color: teal;
                transform: translate(1px,2px);
                
            }
            .footer {
                text-align: center;
                margin-top: auto;
                background-color: darkgray;
                color: maroon;
                padding:10px;
                font-weight: bold;
            }
            body {
    background: whitesmoke;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin: 0;
    background-repeat: no-repeat;
    background-size: 1800px 800px;
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

tr:nth-child(odd) {
    background-color: peru;
}
tr:nth-child(even) {
    background-color:palegoldenrod;
}

header {
    background-color: darkgray;
    position: relative;
    bottom: 35px;
}

nav {
    background-color: coral;
    display: flex;
    justify-content: space-evenly;
    padding: 5px;
    border-radius: 3px;
    float:right;
}

h1 {
    text-align: left;
    font-weight: bold;
    font-size: 70px;
    
}

h1 img {
    height: 60px;
    width: 60px;
    position: relative;
    top: 20px;
}

a {
    text-decoration: none;
    color: maroon;
    padding: 3px 7px 3px 7px;
    border-radius: 5px;
    font-family: times,georgia,serif;
    font-weight: 800;
}

img {
    height: 200px;
    width: 200px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.link:hover {
    color: black;
}

footer {
    text-align: center;
    margin-top: auto;
    background-color: darkgray;
    color: maroon;
    font-weight:bold;
}
        </style>
    </head>

    <body>
        <header>
            <h1 style="color:maroon;font-size: 60px">
                <a href="index.php"><img src="photo bank logo.png">Citi Bank</a>
            </h1>
            <nav style="font-family: times,georgia,serif;">
           
                <a class="link" href="index.php">Home</a>
                <a class="link" href="About.html">About</a>
                <a class="link" href="view_customers.php">View Customers</a>
                <a class="link" href="transaction_history.php">Transaction History</a>
            </nav>
        </header>
        <table class="customers">
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Current Balance</th>
                <th>&nbsp;</th>
            </tr>
            <?php
         $res=mysqli_query($conn,"SELECT * FROM customers");
         while($row=mysqli_fetch_array($res))
        {
             echo "<tr>";
             echo "<td>"; echo $row["id"]; echo "</td>";
             echo "<td>"; echo $row["Name"]; echo "</td>";
             echo "<td>"; echo $row["E-mail"]; echo "</td>";
             echo "<td>"; echo $row["Current Balance"]; echo "</td>";
             echo "<td>"; ?><a href="SelectandTransfer.php? id=<?php echo $row["id"];?>"><button>Transfer</button></a><?php echo "</td>";
             echo "</tr>";
        }
         $conn->close();
        ?>
        </table>
        <footer>
            <p style="color:maroon"><i>&#169; copyright 2023. Made by Apurbaa Nag</i></p>
            <p style="color:maroon"><i>All rights reserved. Powered by<a style="color:maroon" href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
        </footer>

    </body>

    </html>