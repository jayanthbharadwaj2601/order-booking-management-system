<?php
    $conn=mysqli_connect("localhost","root","","orderbookingsystem");
    $query="update market set flag=0 where flag=1";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>market closed sucessfully</h1>";
?>