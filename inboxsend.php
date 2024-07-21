<?php
session_start();
$checkid=$_SESSION['userid'];
include("connection.php");
$query="select * from tbl_request where sender_id='$checkid'";
$insert=mysqli_query($con,$query);
$total=mysqli_num_rows($insert)
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Inbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<style>
  </style>
  </head>
  <body><div style="height: 0;width: 1523px;position: fixed;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="margin-left: 68px;">
          <a class="nav-link active" href="inbox.php">Received</a>
        </li>
        <li class="nav-item" style="margin-left: 68px;">
          <a class="nav-link active" href="#">Send</a>
        </li>
        <li class="nav-item" style="margin-left: 68px;">
          <a class="nav-link active" href="inboxaccept.php">Accepted</a>
        </li>
        <li class="nav-item" style="margin-left: 68px;">
        <a href="main2.php">
        <button class="btn" style="margin-left: 949px;"><i class="fa fa-home"></i></button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<section id="received" style="height:fit-content;">
    <div class="container" style="margin-top: 61px;">
      <header>
        <div class="notif_box">
          <h2 class="title">Sended Request</h2>
        </div>
      </header>
      <main style="align-items: center;">
        <?php 
              if($total>0){
              while($row=mysqli_fetch_array($insert)){
            $receiver=$row['receiver_id'];
            $availid=$row['availtrip_id'];
            $query2="select * from tbl_user where user_id='$receiver'";
            $insert2=mysqli_query($con,$query2);
            $query3="select * from tbl_availtrip where id='$availid'";
            $insert3=mysqli_query($con,$query3);
            $row3=mysqli_fetch_array($insert3);
            $row2=mysqli_fetch_array($insert2);
            $name=$row2['name'];
            $photo=$row2['photo'];
            $dest=$row3['Destination'];
            ?>
        <div><table><tr style="height: 78px;">
          <td style="width: 81px;"><img src="upload/<?php echo $photo?>" style="height:50px; width:50px; border-radius:50%" alt="avatar" /></td>
         <td style="width: 483px;"> <label style="padding-left: 18px;">You Send a request to <?php echo $name;?> to a trip to <?php echo $dest;?></label></td>
        </tr></div>
           <?php }}
           else{
           ?>
           <label style="margin-top: 104px;font-size: 15px;font-weight: 800;">You Haven't Send Any Request!!</label>
           <?php
           }
           ?>
      </main>
</div>
    <script src="app.js"></script>
  </body>
</html>
