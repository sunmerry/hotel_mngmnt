<?php
include_once 'dbconfig.php';

$q = $_GET['q'];
$query  = "select room_cost  from room where room_id='" . $q . "'";

 $rs = mysqli_query($con,$query );
$fetched_row= mysqli_fetch_array($rs,MYSQLI_ASSOC);


echo $fetched_row['room_cost'];// here no need to use sessions at all.
?>