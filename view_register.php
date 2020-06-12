<?php
include_once 'dbconfig.php';

if(isset($_GET['view_id']))
{
	
	 $sql_query="SELECT * FROM register r,guest g,register_room rrm,room rm WHERE  r.guest_id=g.guest_id AND rrm.reg_id=r.reg_id AND rrm.room_id=rm.room_id AND r.reg_id=".$_GET['view_id'];
	 $result_set=mysqli_query($con,$sql_query);
	 
	  if(!mysqli_query($con,$sql_query))
	 {
	  ?>
	  <script type="text/javascript">
	  alert('error cant view');
	  window.location.href='index.php';
	  </script>
	  <?php
	 }
	 $fetched_row= mysqli_fetch_array($result_set,MYSQLI_ASSOC);
	 
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel Management</title>
<!<link rel="stylesheet" href="style.css" type="text/css" />
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

</head>
<body>
<center>

<script type="text/javascript">

function back()
{
  window.location.href='index.php';
}

</script>


<div id="header">

</div>
<div class="tab">
	<label class="tablinks" >Hotel Management- <a    href="javascript:back()" > home </a></label>
</div>
 <table align="center">
   <tr>
   <th colspan="5">Registration ID: </th>
   <th colspan="2"> <?php echo $fetched_row['reg_id'] ?></th>
</tr>
 <tr>
   <th colspan="5">Guest id: </th>
   <th colspan="2"> <?php echo $fetched_row['guest_id'] ?></th>
</tr>
 <tr>
   <th colspan="5">Number of adult: </th>	
   <th colspan="2"> <?php echo $fetched_row['no_adult'] ?></th>
</tr>
 <tr>
	<th colspan="5">Number of children </th>
   <th colspan="2"><?php echo $fetched_row['no_child'] ?></th>
</tr>
 <tr>
	<th colspan="5">Room Occupied</th>
   <th colspan="2"><?php echo $fetched_row['room_name'] ?></th>
</tr>
 <tr>
	<th colspan="5">Room ID</th>
   <th colspan="2"><?php echo $fetched_row['room_id'] ?></th>
</tr>
 <tr>
	<th colspan="5"> Check in: </th>
   <th colspan="2"> <?php echo $fetched_row['check_in'] ?> </th>
</tr>
 <tr>
	<th colspan="5">Check out: </th>
   <th colspan="2"> <?php echo $fetched_row['check_out'] ?> </th>
</tr>
 <tr>
	<th colspan="5">Total </th>
   <th colspan="2"> <?php echo $fetched_row['total'] ?> </th>
</tr>
<tr>
	<th colspan="5" >Paid Status </th>
   <th colspan="2"> <?php echo $fetched_row['Paid'] ?></th>
</tr>
<tr>
	<th colspan="5" >Guest Name </th>
   <th colspan="2"> <?php echo $fetched_row['guest_name'] ?></th>
</tr>
<tr>
	<th colspan="5" >Guest Age </th>
   <th colspan="2"> <?php echo $fetched_row['age'] ?></th>
</tr>
<tr>
	<th colspan="5" >Guest Phone Number </th>
   <th colspan="2"> <?php echo $fetched_row['phone'] ?></th>
</tr>
<tr>
	<th colspan="5" >Guest Address </th>
   <th colspan="2"> <?php echo $fetched_row['address'] ?></th>
</tr>
 </table>
</center>
</body>
</html>