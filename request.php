<?php
session_start();
$availid= $_GET['availid'];
$username=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_availtrip where id='$availid'";
$query2="select * from tbl_user where username='$username'";
$insert=mysqli_query($con,$query);
$insert2=mysqli_query($con,$query2);
$row=mysqli_fetch_array($insert);
$row2=mysqli_fetch_array($insert2);
$senderid=$row2['user_id'];
$receiverid=$row['user_id'];
$query4="select * from tbl_request where sender_id='$senderid'";
$insert4=mysqli_query($con,$query4);
$query5="select * from tbl_availtrip where user_id='$senderid'";
$insert5=mysqli_query($con,$query5);
$count2=mysqli_num_rows($insert5);
$count=mysqli_num_rows($insert4);
if($count>0){
    ?>
    <script>
        alert("Sorry you already made a request");
        window.location.href="main2.php";
    </script>
    <?php
}
elseif($senderid==$receiverid){
    ?>
    <script>
        alert("You can't send request to yourself");
         window.location.href="main2.php";
    </script>
    <?php
}
elseif($count2>0){
    ?>
    <script>
        alert("You Have already Made a trip So you Can't send request");
         window.location.href="main2.php";
    </script>
    <?php
}
else{
$query3="insert into tbl_request(sender_id,receiver_id,availtrip_id,status)values('$senderid','$receiverid','$availid','0')";
$insert3=mysqli_query($con,$query3);
if($insert3){
    ?>
    <script>
        alert("The Request Has Made Successfully!!");
         window.location.href="main2.php";
    </script>
    <?php
}
}
?>