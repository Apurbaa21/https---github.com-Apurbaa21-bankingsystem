<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <style media="screen" type="text/css">
        body {
            background:whitesmoke;
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
            bottom: 20px;
            
        }
        
        nav {
            background-color:coral;
           
            display: flex;
            float: right;
    
            justify-content: space-evenly;
            padding: 8px;
            border-radius: 5px;
            font-family: times,georgia,serif;
            font-weight: 800;
        }
        
        h1 {
            text-align: left;
            font-weight: bolder;
            font-size: 60px;
            position: relative;
            
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
            border-radius: 4px;
        }
        
        .service {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin: 10px;
            padding: 25px;
            position: relative;
            top: 100px;
            border: none;
            height: 200px;
        }
        
        .view {
            border: 1px lightgray;
            display: flex;
            flex-direction: column;
            background-color: teal;
            text-align: center;
            font-weight: bold;
            border-radius: 20px;
            
            transition: 0.20s;
        }
        
        .view:hover {
            transform: translate(0, -5px);
            
        }
        
        p a {
            color: midnightblue;
        }
        
        p {
            margin: 5px;
            padding-top: 5px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        
        img {
            height: 150px;
            width: 150px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
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
        
        footer p {
            margin: 15px;
        }
    </style>
</head>

<body>
    <header>
        <h1 style="color:maroon">
         
            <a href="index.php"><img src="photo bank logo.png">City Bank</a>
            
        </h1>
        <nav>
            <a class="link" href="index.php">Home</a>
            <a class="link" href="About.html">About</a>
            <a class="link" href="view_customers.php">View Customers</a>
            <a class="link" href="transaction_history.php">Transaction History</a>
        </nav>
    </header>
    <div class="service">
        <div class="view">
            <a href="view_customers.php"><img src="view customer icon.jpg" alt="customers"></a>
            <p><a href="view_customers.php">View Customers</a></p>
        </div>
        <div class="view">
            <a href="transaction_history.php">
                <img src="transaction history icon.png" alt="Transaction History">
            </a>
            <p><a href="transaction_history.php">Transactions History</a></p>
        </div>
    </div>
    <footer>
        <p style="color:maroon"><i>&#169; copyright 2023. Made by Apurbaa Nag</i></p>
        <p style="color:maroon"><i>All rights reserved. Powered by<a style="color:maroon" href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>

</body>

</html>