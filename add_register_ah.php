	
<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
 // variables for input data
     $reg_id = $_POST['reg_id'];
      $guest_id = $_POST['guest_id'];
      $no_adult = $_POST['no_adult'];
      $no_child = $_POST['no_child'];
      $check_in = $_POST['check_in'];
      $check_out = $_POST['check_out'];
      $total = $_POST['total'];
	  $room_id = $_POST['room_id'];
	echo   $room_id ;
    // variables for input data

 // sql query for inserting data into database




$sql_query="INSERT INTO register (`reg_id`,`guest_id`,`no_adult`,`no_child`,`check_in`,`check_out`,`total`) VALUES('".$reg_id."','".$guest_id."','".$no_adult."','".$no_child."','".$check_in."','".$check_out."','".$total."')";
$sql_room_update="UPDATE room SET room_avail='no' WHERE room_id='".$room_id."' ";
$sql_room_reg="INSERT INTO register_room (`reg_id`,`room_id`) VALUES('".$reg_id."','".$room_id."')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query) and mysqli_query($con,$sql_room_update) and mysqli_query($con,$sql_room_reg))
 {
  ?>
  <script type="text/javascript">
  alert('register added Successfully ');
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
 // sql query execution function
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
div {
  text-decoration:none;
 color:#4CAF50;
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

<script type="text/javascript">

function new_guest()
{
  window.location.href='new_guest.php';
}

function get_data(value){
    $.ajax({
        url: "fetchtotal.php",
        type: "POST",
        dataType: "HTML",
        async: false,
        data: {value: value}
        success: function(data) {
           //here we can populate the required fields based on value from database  
			<?php echo "hi"; ?>
        }
     });
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
	<?php 
	$reg_id="SELECT MAX(reg_id)+1 as new_reg from register";
	$re=mysqli_query($con,$reg_id);
	$ro= mysqli_fetch_array($re,MYSQLI_ASSOC);
	?>

    <input type="number" class="form-control" id="reg_id" value="<?php echo $ro['new_reg']; ?>" name="reg_id" >  
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
<button type="submit" onclick="location.href = 'new_guest.php';"  name="btn-guest">Create Guest</button> 
</td>
    </tr>
    <tr>
    <td>
    <input type="number" class="form-control" id="no_adult" name="no_adult" required placeholder="Number of adult">
    </td>
    </tr>
    <tr>
    <td>
    <input type="number" class="form-control" id="no_child" name="no_child" required placeholder="Number of child">
    </td>
    </tr>
	<tr>
    <td>
<select   class="form-control" id="room_id" name="room_id" onchange="myFunction(this.value)">
<?php
$res=mysqli_query($con,"select * from room where room_avail='yes'");
while ($row=mysqli_fetch_array($res))
{
	?>
	
<option value="<?php echo $row["room_id"] ?>"> <?php echo $row["room_name"] , "-" , $row["room_id"] ?></option>
<?php
}
?>

</select>
    <tr>
    <td>
<label for="check_in">Check in</label>
<input type="datetime-local" id="check_in" name="check_in" value="<?php echo date('Y-m-d H:i:s'); ?>"  /> <br>

</td>
    </tr> 
    <tr>
    <td>
<label for="check_out">Check out</label>
<input type="datetime-local"  id="check_out" name="check_out" value="<?php echo date('Y-m-d H:i:s'); ?>" /> <br>

</td>
    </tr>
	<tr>
    <td>
    <div onclick="myFunction()">check price</div>
    
    </td>
    </tr>
    <tr>
    <td>
	
    Total <?php echo '<input type="number" class="form-control" id="total" name="total" value="">'; ?> 

    
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
<script>
function myFunction() {
  var cost=0;
  str =  document.getElementById("room_id").value;
  console.log("str :" + str);
  if (str.length == 0) {
    document.getElementById("total").value = "Hello";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        cost = this.responseText;
		
		var pickdt = new Date(document.getElementById("check_in").value);
      var   dropdt= new Date(document.getElementById("check_out").value);
                var days = parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
		console.log("days :" + days);
		console.log("cost :" + cost);
		document.getElementById("total").value = cost * days;
      }
    }
    xmlhttp.open("GET", "fetchtotal_ah.php?q="+str, true);
    xmlhttp.send();
	 
	
	
  }
}
</script>
</script>
</body>

</html>