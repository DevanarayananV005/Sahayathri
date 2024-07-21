<?php
session_start();
$uname=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_dealer where username='$uname'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$id=$row['dealer_id'];
$query2="select * from tbl_hotel where dealer_id='$id'";
$insert2=mysqli_query($con,$query2);
$ct=mysqli_num_rows($insert2);
if($ct>0){
    ?>
    <script>
        window.location.href="dalerhome.php"
    </script>
    <?php
}
else{
    include("hotelreg.php");
}
?>