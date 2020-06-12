	
<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
 
     $service_id = $_POST['service_id'];
      $reg_id = $_POST['reg_id'];
	 
    
    $sq="SELECT * FROM register_room WHERE reg_id='".$reg_id."' ";
	$ss=mysqli_query($con,$sq);
	$s=mysqli_fetch_array($ss,MYSQLI_ASSOC);
	$room_id=$s['room_id'];
	
    $sqq="SELECT * FROM service WHERE service_id='".$service_id."' ";
	$ssh=mysqli_query($con,$sqq);
	$sn=mysqli_fetch_array($ssh,MYSQLI_ASSOC);
	$service_cost=$sn['service_cost'];
	echo $service_cost;
	
	$sql_query="INSERT INTO guest_service (`reg_id`,`service_id`,`room_id`) VALUES('".$reg_id."','".$service_id."','".$room_id."')";
	$sql_cost_update="UPDATE register SET total = total + '".$service_cost."' WHERE reg_id='".$reg_id."' ";
 
 
	if(mysqli_query($con,$sql_query) and mysqli_query($con,$sql_cost_update))
	{
?>
	<script type="text/javascript">
	alert('service linked Successfully ');
	window.location.href='index.php';
	</script>
	<?php
	}
	else
	{
	?>
	  <script type="text/javascript">
	  alert('error occured while inserting your data');
	  </script>
  <?php
	}
}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel Management</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  overflow: hidden;
  background-color: #333;
   color: white;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
   color: white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
 background-color: #4CAF50;
				  color: white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
label
{
 font-family:Tahoma, Geneva, sans-serif;
 font-weight:bolder;
 color:#999;
 font-size: 10px;
}
table
{
 width:80%;
 font-family:Tahoma, Geneva, sans-serif;
 font-weight:bolder;
 color:#999;
 margin-bottom:80px;
}
table a
{
 text-decoration:none;
 color:#4CAF50;
}
table,td,th
{
 border-collapse:collapse;
 border:solid #d0d0d0 1px;
 padding:20px;
}
table td input,table td select,table td textarea
{
 width:97%;
 height:35px;
 border:dashed #A0D8B1 1px;
 padding-left:15px;
 font-family:Verdana, Geneva, sans-serif;
 box-shadow:0px 0px 0px rgba(1,0,0,0.2);
 outline:none;
}
.check
{
 width:15px;
 height:15px;
 border:dashed #A0D8B1 1px;
 padding-left:15px;
 font-family:Verdana, Geneva, sans-serif;
 box-shadow:0px 0px 0px rgba(1,0,0,0.2);
 outline:none;
}
table td input:focus
{
 box-shadow:inset 1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
}
table td button
{
 border:solid #f9f9f9 0px;
 box-shadow:1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
 background:#4CAF50;
 padding:4px 10px 4px 10px;
 color:#f9f9f9;
 font-family:Arial, Helvetica, sans-serif;
 font-weight:bolder;
 border-radius:5px;
 width:12.5%;
 
 table td button:active
{
 position:relative;
 top:1px;
}
</style>

<body>



<center>


<div id="body">
 <div id="content">
    <form method="post" enctype="multipart/form-data" >
		<table align="center">
					<tr>
					<td align="center"><a href="index.php">home</a></td>
					</tr>


				<tr>
				<td>
					<select   class="form-control" id="reg_id" name="reg_id">
					<?php
					$result=mysqli_query($con,"select * from register_room rrm");
					while ($rows=mysqli_fetch_array($result))
					{
						?>
						
					<option value="<?php echo $rows["reg_id"] ?>">   <?php echo $rows["reg_id"] ?> </option>
					<?php
					}
					?>

					</select>
				</td>
				</tr>


				<tr>
				<td>
				<select   class="form-control" id="service_id" name="service_id">
				<?php
				$res=mysqli_query($con,"select * from service");
				while ($row=mysqli_fetch_array($res))
				{
					?>
					
				<option value="<?php echo $row["service_id"] ?>">  <?php echo $row["service_name"] ?></option>
				<?php
				}
				?>
		
				</select>
				</td>
				</tr>
				
				
				<tr>
				
				<td> <button type="submit" name="btn-save">SAVE</button> </td>
				</tr>
	 	</table>
    </form>
   </div>
</div>

</center>
</body>

</html>