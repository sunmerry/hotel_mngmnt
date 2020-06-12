	
<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
 // variables for input data
     $room_id = $_POST['room_id'];
      $room_name = $_POST['room_name'];
      $room_cost = $_POST['room_cost'];
	  $room_avail = $_POST['room_avail'];
      
    // variables for input data

 // sql query for inserting data into database




$sql_query="INSERT INTO room (`room_id`,`room_name`,`room_cost`,`room_avail`) VALUES('".$room_id."','".$room_name."','".$room_cost."','".$room_avail."')";

 
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('Room added successfully ');
  window.location.href='index.php#target';
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
 // sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div id="header">
 <div id="content">
    
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post" enctype="multipart/form-data" >
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">home</a></td>
    </tr>



    <tr>
		<td>
		<?php 
		$service_id="SELECT MAX(room_id)+1 as new_room from room";
		$re=mysqli_query($con,$service_id);
		$ro= mysqli_fetch_array($re,MYSQLI_ASSOC);
		?>

		<input type="number" class="form-control" id="room_id" value="<?php echo $ro['new_room']; ?>" name="room_id" required placeholder="Room ID" >  
		</td>
    </tr>
   
    <tr>
		<td>
		<input type="text" class="form-control" id="room_name" name="room_name" required placeholder="Room Name">
		</td>
    </tr>
    <tr>
    <td>
    <input type="number" class="form-control" id="room_cost" name="room_cost" required placeholder="Room Cost">
    </td>
    </tr>
	

	
	<tr>
    <td>
    <select   class="form-control" id="room_avail" name="room_avail">
	
		<option > yes </option>
		<option> no </option>

	</select>
    </td>
    </tr>
	
    <tr>
    <td><button type="submit" name="btn-save">SAVE</button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>