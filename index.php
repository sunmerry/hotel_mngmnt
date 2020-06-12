<!DOCTYPE html>
<?php

include_once "dbconfig.php";



?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
 background:#f9f9f9;
 padding:9px 15px 9px 15px;
 color:#f9f9f9;
 font-family:Arial, Helvetica, sans-serif;
 font-weight:bolder;
 border-radius:3px;
 width:49.5%;
}
table td button:active
{
 position:relative;
 top:1px;
}
</style>
<title>Hotel Management</title>
</head>
<body>

<script type="text/javascript">
function edt_id(id)
{
  window.location.href='edit_register.php?edit_id='+id;
}
function editservice_id(id)
{
  window.location.href='editservice_id.php?edit_id='+id;
}
function view_id(id)
{
  window.location.href='view_register.php?view_id='+id;
}

function delete_id(id)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='index.php?delete_id='+id;
 }
}
function delete_ser(id)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='index.php?delete_ser='+id;
 }
}
function delete_room(id)
{
 if(confirm('Sure to Delete ?'))
 {
  window.location.href='index.php?delete_room='+id;
 }
}
</script>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Register')" id="defaultOpen">Register</button>
  <button class="tablinks" onclick="openCity(event, 'Create_service')" id="Openservice" >Services</button>
  <button class="tablinks" onclick="openCity(event, 'Create_room')" id="Openroom" >Rooms</button>
</div>

<div id="Register" class="tabcontent">
	<h3>Register</h3>
	<?php
	    if(isset($_GET['delete_id']))
		{
			$sql_query="DELETE FROM register WHERE reg_id=".$_GET['delete_id'];
			mysqli_query($con,$sql_query);
			header("Location: $_SERVER[PHP_SELF]");
		}
		if(isset($_GET['changestatus_id']))
		{
			$sql_query="UPDATE register SET `status`='".$_GET['status']."' WHERE id=".$_GET['changestatus_id'];
			mysqli_query($con,$sql_query);
			header("Location: $_SERVER[PHP_SELF]");
		}
	?>
	<div id="body">
		<div id="content">
			<table align="center">
				<tr>
					<th colspan="8"><a href="add_register_ah.php">New Register.</a></th>
				</tr>
				<tr>
					<th>SL NO</th>
					<th>reg_id</th>
					<th>Check in</th>
					<th>Check out</th>
					<th>Amount</th>
					<th>Paid</th>
					<th colspan="2">Actions</th>
				</tr>
				<?php
					 $sql_query="SELECT * FROM register";
					 $result_set=mysqli_query($con,$sql_query);
					 $i=1;
					 while($row=mysqli_fetch_row($result_set))
					{
				?>
				<tr>
					<td align="center" ><?php echo $i; ?></td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[0]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[4]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[5]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[6]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[7]; ?> </a> </td>
					<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Edit</a></td>
					<td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">Delete</a></td>
				</tr>
				<?php
					$i++;  
					}
				?>
			</table>
		</div>
	</div>
</div>

<div id="Create_service" class="tabcontent">
 <h3>Services</h3>
	<?php
	    if(isset($_GET['delete_ser']))
		{
			$sql_query="DELETE FROM service WHERE service_id=".$_GET['delete_ser'];
			mysqli_query($con,$sql_query);
		}
	?>
	<div id="body">
		<div id="content">
			<table align="center">
				<tr>
					<th colspan="8"><a href="add_service.php">New Service.</a></th>
				</tr>
				<tr>
					<th colspan="8"><a href="add_serid.php">Provide Service.</a></th>
				</tr>
				<tr>
					<th>SL NO</th>
					<th>Service ID</th>
					<th>Service Name</th>
					<th>Service Cost</th>
					<th colspan="2">Actions</th>
				</tr>
				<?php
					 $sql_query="SELECT * FROM service";
					 $result_set=mysqli_query($con,$sql_query);
					 $i=1;
					 while($row=mysqli_fetch_row($result_set))
					{
				?>
				<tr>
					<td align="center" ><?php echo $i; ?></td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[0]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[1]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[2]; ?> </a> </td>
					<td align="center"><a href="javascript:editservice_id('<?php echo $row[0]; ?>')">Edit</a></td>
					<td align="center"><a href="javascript:delete_ser('<?php echo $row[0]; ?>')">Delete</a></td>
					
				</tr>
				<?php
					$i++;  
					}
				?>
			</table>
		</div>
	</div>
</div>

<div  id="Create_room" class="tabcontent">
	
   <h3> <a id="target"> Room </a> </h3>
	<?php
	    if(isset($_GET['delete_room']))
		{
			$sql_query="DELETE FROM room WHERE room_id=".$_GET['delete_room'];
			mysqli_query($con,$sql_query);
		}
	?>
	<div id="body">
		<div id="content">
			<table align="center">
				<tr>
					<th colspan="8"><a href="add_room.php">New Room.</a></th>
				</tr>
				<tr>
					<th>SL NO</th>
					<th>Room ID</th>
					<th>Room Name</th>
					<th>Room Cost</th>
					<th>Room Availability</th>
					<th colspan="2">Actions</th>
				</tr>
				<?php
					 $sql_query="SELECT * FROM room";
					 $result_set=mysqli_query($con,$sql_query);
					 $i=1;
					 while($row=mysqli_fetch_row($result_set))
					{
				?>
				<tr>
					<td align="center" ><?php echo $i; ?></td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[0]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[1]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[2]; ?> </a> </td>
					<td align="center" > <a href="javascript:view_id('<?php echo $row[0]; ?>')"> <?php echo $row[3]; ?> </a> </td>
					<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">Edit</a></td>
					<td align="center"><a href="javascript:delete_room('<?php echo $row[0]; ?>')">Delete</a></td>
				</tr>
				<?php
					$i++;  
					}
				?>
			</table>
		</div>
	</div>
    
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
