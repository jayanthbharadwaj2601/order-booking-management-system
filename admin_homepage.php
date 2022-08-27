<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    if($username!="Admin@123" || $password!="HelloAdmin")
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Invalid admin details</h1>";
        echo $username,$password;
    }
    else
    {
        $conn=mysqli_connect("localhost","root","","orderbookingsystem");
        $query="select * from orders";
        $result=mysqli_query($conn,$query);
        echo "<table border=3 align='center'>";
        echo "<tr><th> sno </th><th> stock name </th> <th> quantity </th> <th> order type </th> <th> executed quantity </th> <th> price </th> 
        <th> order status </th></tr>";
        $c=1;
        if(mysqli_num_rows($result))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>",$c,"</td>";
                echo "<td>",$row['stockname'],"</td>";
                echo "<td>",$row['quantity'],"</td>";
                echo "<td>",$row['ordertype'],"</td>";
                echo "<td>",$row['executedqty'],"</td>";
                echo "<td>",$row['price'],"</td>";
                echo "<td>",$row['orderstatus'],"</td>";
                echo "</tr>";
                $c+=1;
            }
        }
        echo "</table>";
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
            h2
        {
            font-family: Arial, Helvetica, sans-serif;
        }
        .z
        {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        #container
        {
            display: flex;
            flex-direction: column;
            gap: 5px;
            position:relative;
            top:15px;
        }
        .pid{
            border: 3px solid #555;
            padding: 10px 10px;
            }
            </style>
        </head>
        <body>
            <div id="container" align="center">
            <form action="open.php" method="POST">
                <input type="submit" name="open" class="z" value="open">
            </form>
            <form action="close.php" method="POST">
                <input type="submit" name="submit" class="z" value="close">
            </form>
            <form action="execute.php" method="POST">
                <h2>Select Stock</h2>
                <select name="stock_name" class="pid">
                    <option value="#">Select your Option</option>
                    <option value="DBS">DBS</option>
                    <option value="jpmorgan">jpmorgan</option>
                    <option value="morganstanley">morganstanley</option>
                </select>
                <h2>Order Type</h2>
                <select name="market_or_limit" class="pid">
                    <option value="#">select your option</option>
                    <option value="limit">limit</option>
                    <option value="market">market</option>
                </select>
                <h2>price</h2>
                <input type="number" name="price"  class="pid">
                <h2>Quantity</h2>
                <input type="number" name="quantity" class="pid"><br><br>
                <input type="submit" name="submit" class="z" value="executeorder">
            </form>
            </div>
        </body>
        </html>';
    }
?>