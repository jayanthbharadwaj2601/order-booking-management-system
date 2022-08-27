<?php
    $conn=mysqli_connect("localhost","root","","orderbookingsystem");
    $stock_name=$_POST["stock_name"];
    $ordertype=$_POST["market_or_limit"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $query1="select * from market";
    $r1=mysqli_query($conn,$query1);
    $c1=0;
    if(mysqli_num_rows($r1))
    {
        while($row=mysqli_fetch_assoc($r1))
        {
            if($row['flag']==0)
            {
                $c1=1;
                break;
            }
        }
    }
    if($c1==0)
    echo "Market open,cant execute";
    else
    {
        $query="select * from orders";
        $c=-1;
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if($row['stockname']==$stock_name && $row['ordertype']==$ordertype && $row['price']==$price)
                {
                    $c=$row['quantity'];
                    break;
                }
            }
        }
        if($c==-1 || $c<$quantity)
        {
            echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>invalid operation,order rejected</h1>";
            $query3="update orders set orderstatus='rejected' where stockname='$stock_name' and ordertype='$ordertype' and price='$price'";
            mysqli_query($conn,$query3);
        }
        else
        {
            $query1="update orders set executedqty=executedqty+'$quantity' where stockname='$stock_name' and ordertype='$ordertype' and price='$price'";
            $query2="update orders set quantity=quantity-'$quantity' where stockname='$stock_name' and ordertype='$ordertype' and price='$price'";
            $query3="update orders set orderstatus='accepted' where stockname='$stock_name' and ordertype='$ordertype' and price='$price'";
            mysqli_query($conn,$query1);
            mysqli_query($conn,$query2);
            mysqli_query($conn,$query3);
            echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>order accepted,go back!</h1>";  
        }
    }
?>