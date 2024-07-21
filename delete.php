<?php
session_start();
$username=$_SESSION['uname'];
include("connection.php");
$query="update tbl_user set status='0' where username='$username'";
$insert=mysqli_query($con,$query);
if($insert){
    ?>
    <script>
        window.location.href="main.php";
    </script>
    <?php
}
?>