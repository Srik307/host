<?php
    $busno=$_GET["bus"];
    $conn=mysqli_connect("localhost","root","");
    $sql="SELECT *FROM weblogin.coordinates WHERE id=$busno;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);
?>