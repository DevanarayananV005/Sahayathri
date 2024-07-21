<?php
session_start();
$uname=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_dealer where username='$uname'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$id=$row['dealer_id'];
include("hotelreg.php")
?>