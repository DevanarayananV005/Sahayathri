<?php
session_start();
$userid=$_SESSION['userid'];
$senderid=$_GET['senderid'];
include("connection.php");
$query3="select * from tbl_availtrip where user_id='$userid' and status='0'";
$insert3=mysqli_query($con,$query3);
$tcount=mysqli_num_rows($insert3);
if($tcount>0){
$query="update tbl_request set status='1' where sender_id='$senderid'";
$query2="update tbl_availtrip set status='1' where user_id='$userid'";
$insert=mysqli_query($con,$query);
$insert2=mysqli_query($con,$query2);
if($insert){
    if($insert2){?>
<script>
    window.location.href="inbox.php";
</script>
<?php
    }
}
}
else{
    ?>
    <script>
        alert("You already accepted a trip Enjoy trip");
        window.location.href="inbox.php";
    </script>
    <?php
}
?>