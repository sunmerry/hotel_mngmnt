<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id']))
{
 $sql_query="SELECT * FROM register WHERE reg_id=".$_GET['edit_id'];
 $result_set=mysqli_query($con,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
}
if(isset($_POST['btn-update']))
{
 // variables for input data
     
   $reg_id = $_POST['reg_id'];
          
   $guest_id = $_POST['guest_id'];
          
   $no_adult = $_POST['no_adult'];
          
   $no_child = $_POST['no_child'];
          
   $check_in = $_POST['check_in'];
          
   $check_out = $_POST['check_out'];
          
   $total = $_POST['total'];
   
   $Paid = $_POST['Paid'];
        // variables for input data

 // sql query for update data into database
  $sql_query="UPDATE register SET `reg_id`='$reg_id',`guest_id`='$guest_id',`no_adult`='$no_adult',`no_child`='$no_child',`check_in`='$check_in',`check_out`='$check_out',`total`='$total',`Paid`='$Paid' WHERE reg_id=".$_GET['edit_id'];

 // sql query for update data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('register updated successfully');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel Management</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

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

<center>

<div id="header">
 <div id="content">
        
    </div>
</div>

<div id="body">
 <div id="content">
    <form method="post" enctype="multipart/form-data">
    <table align="center">
	<tr>
	<td align="center ">
	<a href="index.php" target="_blank">home</a>
	</td>
	</tr>
    <tr>
    <td>
    <input type="number" value="<?php echo $fetched_row['reg_id'] ?>" class="form-control" id="reg_id" name="reg_id">
</td>
    </tr>
  <tr>
    <td>
<select   class="form-control" id="guest_id" name="guest_id">
<?php
$res=mysqli_query($con,"select * from guest");
while ($row=mysqli_fetch_array($res))
{
	?>
	
<option > <?php echo $row["guest_id"] ?></option>
<?php
}
?>

</select>
</td>
    </tr>
  <tr>
    <td>
    <input type="number" value="<?php echo $fetched_row['no_adult'] ?>" class="form-control" id="no_adult" name="no_adult">
</td>
    </tr>
  <tr>
    <td>
    <input type="number" value="<?php echo $fetched_row['no_child'] ?>" class="form-control" id="no_child" name="no_child">
</td>
    </tr>
  
 <tr>
    <td>
<label for="check_in">Check in</label>
<input type="datetime-local" id="check_in" name="check_in" value="<?php echo $fetched_row['check_in'] ?>"  > 

</td>
    </tr> 
   <tr>
    <td>
<label for="check_out">Check out</label>
<input type="datetime-local"  id="check_out" name="check_out" value="<?php echo date("d.m.Y H:i:s", strtotime($fetched_row['check_out'])) ?>" > 

</td>
    </tr>
  <tr>
    <td>
    <input type="number" value="<?php echo $fetched_row['total'] ?>" class="form-control" id="total" name="total">
</td>
    </tr>

<tr>
    <td>
    <input type="text" value="<?php echo $fetched_row['Paid'] ?>" class="form-control" id="Paid" name="Paid">
</td>
    </tr>
	
	
      <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>