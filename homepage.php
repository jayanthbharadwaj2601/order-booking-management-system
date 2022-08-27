<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=="Admin@123.com")
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Invalid Credentials</h1>";
    }
    else
    {
        $conn=mysqli_connect("localhost","root","","orderbookingsystem");
        $query="select * from accounts";
        $result=mysqli_query($conn,$query);
        $c=0;
        if(mysqli_num_rows($result))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if($row['username']==$username && $row['password']==$password)
                {
                    $c+=1;
                    break;
                }
            }
        }
        if($c==0)
        {
            echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Invalid username/Password</h1>";
        }
        else
        echo '<html>
        <head>
        <style>
        h2
        {
            font-family: Arial, Helvetica, sans-serif;
        }
        #z
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
            gap: 10px;
            position: relative;
            top: 50px;
        }
        .pid{
            border: 3px solid #555;
            padding: 10px 10px;
            }
        .stock1
        {
            border: 3px solid #555;
            padding: 10px 10px;
        }
        </style>
        </head>
        <body>
            <div id="container" align="center">
            <form action="placeorder.php" method="POST">
            <h2>Search Stock</h2>
            <select name="stock_name" class="stock1">
                <option value="#">Select your Option</option>
                <option value="DBS">DBS</option>
                <option value="jpmorgan">jpmorgan</option>
                <option value="morganstanley">morganstanley</option>
            </select>
            <h2>Order Type</h2>
            <select name="market_or_limit" class="stock1">
                <option value="#">select your option</option>
                <option value="limit">limit</option>
                <option value="market">market</option>
            </select>
            <h2>price</h2>
            <input type="number" name="price"   class="pid">
            <h2>Quantity</h2>
            <input type="number" name="quantity" class="pid"><br><br>
            <input type="submit" name="submit" id="z" value="placeorder">
            </form>
            </div>
        </body>
    </html>';
    }
?>