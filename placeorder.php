<?php
    $conn=mysqli_connect("localhost","root","","orderbookingsystem");
    $stock_name=$_POST["stock_name"];
    $ordertype=$_POST["market_or_limit"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $query="select * from orders";
    $result=mysqli_query($conn,$query);
    $c1=0;
    $query9="select * from market";
    $r1=mysqli_query($conn,$query9);
    if(mysqli_num_rows($r1))
    {
        while($row=mysqli_fetch_assoc($r1))
        {
            if($row['flag']==1)
            {
                $c1+=1;
                break;
            }
        }
    }
    if($c1==0)
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Market closed,cant place order!</h1>";
    }
    else
    {
    $c=0;
    if(mysqli_num_rows($result))
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['stockname']==$stock_name && $row['ordertype']==$ordertype && $row['price']==$price)
            {
                $c+=1;
                // echo $stock_name,'&nbsp;',$ordertype,'&nbsp;',$price,$c,"<br>";
                // echo $row['stockname'],'&nbsp;',$row['ordertype'],'&nbsp;',$row['price'],"<br>";
                break;
            }
            // echo $row['stockname'],'&nbsp;',$row['ordertype'],'&nbsp;',$row['price'],"<br>";
        }
    }
    if($c==0)
    {
        $query1="insert into orders values('$stock_name','$quantity','$ordertype',0,'$price','Placed')";
        mysqli_query($conn,$query1);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Order Placed Sucessfully,go back!</h1>";
    }
    else
    {
        $query1="update orders set quantity = quantity+'$quantity' where stockname='$stock_name' and ordertype='$ordertype' and  price='$price'";
        mysqli_query($conn,$query1);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Order Placed Sucessfully,go back!</h1>";
    }
    }
?>