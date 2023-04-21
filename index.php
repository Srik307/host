<html>
<head>
<title>Epsz</title>
<body>
<?php
$conn=mysqli_connect("localhost","root","");
$sql= "SELECT *FROM weblogin.details;";
$result= mysqli_query($conn,$sql);
$resultCheck= mysqli_num_rows($result);

if ($resultCheck >0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row['firstname'];
	}
}
?>
</body>
</html>


