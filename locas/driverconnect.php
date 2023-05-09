<?php
    $bus=$_GET['bus'];
    $lat=$_GET['lati'];
    $lon=$_GET['long'];
    $conn=mysqli_connect("localhost","root","");
    $sql="UPDATE weblogin.coordinates SET latitude=$lat,longitude=$lon WHERE  id=$bus;";
    mysqli_query($conn,$sql);
?>