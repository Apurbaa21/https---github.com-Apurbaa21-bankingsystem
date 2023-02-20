<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Current Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Ohh! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['Current Balance'] - $amount;
                $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['Current Balance'] + $amount;
                $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO `transactions` (`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='view_customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="select_transfer.css">
    <style media="screen" type="text/css">
        body{
            background:whitesmoke;
        }
        div.transfer{
            margin:auto;
            position:relative;
            bottom: 30px;
            background-color: bisque;
            padding:20px;
            font-family: Arial, sans-serif;
            border-radius:10px;
            
        }
        div table {
            font-family: arial, sans-serif;
            display: table;
            margin: auto;
            background-color: ghostwhite;
            color: whitesmoke;
            border-collapse: separated;
        }
        h2{
            font-size:30px;
        }

        table th {
            background-color: lightcoral;
            color: ghostwhite;
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
        #receiver{
            height:22px;
            padding:1px 2px;
            border:2px;
        }
        #amount{
            border:2px;
        }
        button{
            position:relative;
            left:200px;
            bottom:10px;
            border:none;
            padding:15px;
            color:black;
            font-weight: bold;
            border-radius:5px;
            background-color:teal;
            font-family:Arial, Helvetica, sans-serif;
            transition: 0.20s;
        }
        button:hover{
            color:black;
            background-color: white;
            transform: translate(0, -3px);
            
        }
        footer{
            padding:10px;
        }
        nav{
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
    border-radius: 3px;
    float: right;
    
    font-weight: 800px;
}

h1 {
    text-align: left;
    font-weight: bold;
    font-size: 50px;
}

h1 img {
    height: 70px;
    width: 70px;
    position: relative;
    top: 20px;
}

a {
    text-decoration: none;
    color: maroon;
    padding: 3px 7px 3px 7px;
    border-radius: 2px;
    font-family: times,georgia,serif;
}

.link:hover {
    color: black;
}

footer {
    text-align: center;
    margin-top: auto;
    background-color:darkgray;
    color: maroon;
    padding: 15px;
    font-weight: bold;
}

    </style>
</head>

<body>
    <header>
        <h1 style="color:maroon;font-size: 60px">
            <a href="index.php"><img src="photo bank logo.png">City Bank</a>
        </h1>
        <nav style="font-family: times,georgia,serif;">
            <a class="link" href="index.php">Home</a>
            <a class="link" href="About.html">About</a>
            <a class="link" href="view_customers.php">View Customers</a>
            <a class="link" href="transaction_history.php">Transaction History</a>
        </nav>
    </header>
	<div class="transfer">
        <h2 style="text-align:center">Transfer Money</h2>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
        <div>
            <table>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['E-mail'] ?></td>
                    <td><?php echo $rows['Current Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label for="receiver" style="font-weight:bold">Transfer To:</label>
        <select id="receiver" name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Current Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        </select>
        <br>
        <br>
            <label style="font-weight:bold" for="amount">Amount in &#x20B9;
            :</label>
            <input id="amount" type="number" name="amount" required>   
            <br><br><br>
            <div>
                <button name="submit" type="submit">Transfer</button>
            </div>
        </form>
    </div>
    <footer class="footer">
            <p style="color:maroon"><i>&#169; copyright 2023. Made by  Apurbaa Nag</i></p>
            <p style="color:maroon"><i>All rights reserved. Powered by<a href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>
</body>