<?php

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "hotel_mngmnt";

$service_name = $_POST['service_name'];
$service_cost = $_POST['service_cost'];

 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if(!$conn){
	echo "Connect error". mysqli_connect_error()." ".mysqli_connect_errno();
}
else
{
			
			$sql = "INSERT INTO service (service_name, service_cost) VALUE ('$service_name', $service_cost)";
		
		if(mysqli_query($conn, $sql)){
			echo "<h1>new service record inserted suceessfully</h1>";
		}
		else{
			echo "error"." ". mysqli_error($conn);
		}
		mysqli_close($conn);
}




		
			

?>
