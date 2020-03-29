<?php

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "hotel_mngmnt";

$room_name = $_POST['room_name'];
$room_cost = $_POST['room_cost'];
$room_avail=$_POST['room_availability'];
$room_type=$_POST['room_type'];

 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

if(!$conn){
	echo "Connect error". mysqli_connect_error()." ".mysqli_connect_errno();
}
else
{
			
			$sql = "INSERT INTO room (room_name, room_type,room_cost,room_avail) VALUE ('$room_name', '$room_type','$room_cost','$room_avail')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h1>new room record inserted suceessfully</h1>";
		}
		else{
			echo "error"." ". mysqli_error($conn);
		}
		mysqli_close($conn);
}




		
			

?>
