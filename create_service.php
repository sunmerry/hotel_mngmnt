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
			$query="SELECT * FROM service";
			$result=mysqli_query($conn,$query);		
		
		if(mysqli_query($conn, $sql)){
			echo "<h1>new service record inserted suceessfully</h1>";
		}
		else{
			echo "error"." ". mysqli_error($conn);
		}
?>
		<html>
		
		<body>
		<table>
			<tr>
				<th>Service details</th>
				
			</tr>
			<t>
				<th>service id</th>
				<th>service name</th>
				<th>service cost</th>
			</t
			<?php
			while($rows=mysqli_fetch_assoc($result))
			{
				?>
				<tr>
					<th><?php echo $rows['service_id'] ; ?></th>
					<th><?php echo $rows['service_name'] ; ?>;</th>
					<th><?php echo $rows['service_cost'] ; ?></th>
				</tr>
			
		<?php	} ?>
		</table>
		</body>
		</html>
	<?php	mysqli_close($conn);
}




		
			

?>
