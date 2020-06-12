	
<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
 // variables for input data
      $guest_id = $_POST['new_guest_id'];
      $guest_name = $_POST['guest_name'];
      $age = $_POST['age'];
	  $address=$_POST['address'];
      $phone = $_POST['phone'];
	
    // variables for input data

 // sql query for inserting data into database
 
$sql_query="INSERT INTO guest (`guest_id`,`guest_name`,`age`,`address`,`phone`) VALUES('".$guest_id."','".$guest_name."','".$age."','".$address."','".$phone."')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('register added Successfully ');
  window.location.href='add_register.php';
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
}
table td button:active
{
 position:relative;
 top:1px;
}
</style>

<body>

<script type="text/javascript">

function back()
{
  window.location.href='add_register.php';
}

</script>

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
<select class="form-control" id="guest_id" name="guest_id">
<?php
$res=mysqli_query($con,"select max(guest_id)+1 as guest_id from guest");
$row=mysqli_fetch_assoc($res);
$new_guest_id=$row['guest_id'];
	?>
	
<option> <?php echo $new_guest_id ?></option>

</select>
</td>
    </tr>
    <tr>
    <td>
    <input type="text" class="form-control" id="guest_name" name="guest_name" required placeholder="Guest Name">
    </td>
    </tr>
    <tr>
    <td>
    <input type="number" class="form-control" id="age" name="age" required placeholder="age">
    </td>
    </tr>
    <tr>
    <td>

<input type="text" id="address" name="address" required placeholder="address" > <br>

</td>
    </tr> 
    <tr>
    <td>

<input type="number"  id="phone" name="phone" required placeholder="phone" > <br>

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