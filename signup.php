<?php
    $username=$_POST["username"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","","orderbookingsystem");
    $query="select * from accounts";
    $result=mysqli_query($conn,$query);
    $c1=0;
    if(mysqli_num_rows($result))
    {
        while($rows=mysqli_fetch_assoc($result))
        {
            if($rows['username']==$username)
            {
                $c1+=1;
                break;
            }
        }
    }
    if($c1>0)
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>User Already Exists</h1>";
    }
    elseif($username=="Admin@123")
    {
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>User already exists</h1>";
    }
    else
    {
        $conn1=mysqli_connect("localhost","root","","orderbookingsystem");
        $query1="insert into `accounts` values('$username','$password')";
        mysqli_query($conn1,$query1);
        echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>User Created Sucessfully</h1>";
    }

?>