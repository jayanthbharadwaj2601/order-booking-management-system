<?php
    $conn=mysqli_connect("localhost","root","","orderbookingsystem");
    $query="update market set flag=1 where flag=0";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family: Arial, Helvetica, sans-serif;'>Market opened Sucessfully,go back!</h1>";
    
?>