<?php
session_start();
$uname=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_dealer where username='$uname'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$id=$row['dealer_id'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$company=$row['company'];
$photo=$row['photo'];
$query2="select * from tbl_hotel where dealer_id='$id'";
$insert2=mysqli_query($con,$query2);
?>
<html>
    <head>
        <title>
</title>
<style>
    body{
                background-image: url("hotel.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                position: fixed;
            }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="width: 1535px;background-color: #ffffff8c;font-family: monospace;font-size: 18px;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="hotelreg1.php" style="margin-left: 1011px;color: black;">Add Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color: black;">Update Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color: black;">Booking Details</a>
        </li>
        <li class="nav-item dropdown">
        <img class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" src="upload/<?php echo $photo?>" style="border-radius:50%;width: 60px;height:60px;margin-left: 35px;">
          <ul class="dropdown-menu" style="margin-left: -76px;">
            <li><a class="dropdown-item" href="logoutdealer.php">Log Out</a></li>
            <li><a class="dropdown-item" href="dealerprofile.php">Profile</a></li>
          </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>
<div class="cont" style="margin-top: 108px;height: 481px;width: 1518px;margin-left: 12px;">
<h2 style="text-decoration: underline;margin-left: 652px;font-family: initial;font-size: 51px;">Hotel Details</h2>
<table class="table table-striped-columns table-hover" style="color:black;" border="1"><thead><tr>
  <th>Name</th>
  <th>Phone</th>
  <th colspan="3">Suit Room</th>
  <th colspan="3">A/C Room</th>
  <th colspan="3">Non A/C Room</th>
  <th colspan="3">Dormitory</th>
  <th>Location</th>
  <th>Photo</th>
          </tr></thead>
          <tr>
            <th></th>
            <th></th>
            <th>Rate</th>
            <th>Room Count</th>
            <th>Discount</th>
            <th>Rate</th>
            <th>Room Count</th>
            <th>Discount</th>
            <th>Rate</th>
            <th>Room Count</th>
            <th>Discount</th>
            <th>Rate</th>
            <th>Room Count</th>
            <th>Discount</th>
            <th></th>
            <th></th>
          </tr>
          <?php
          while($row2=mysqli_fetch_array($insert2)){
          ?>
        <tr>
          <td><?php echo $row2["name"]; ?></td>
          <td><?php echo $row2["phone"]; ?></td>
          <td><?php echo $row2["srate"]; ?></td>
          <td><?php echo $row2["sroom"]; ?></td>
          <td><?php echo $row2["sdisc"]; ?></td>
          <td><?php echo $row2["arate"]; ?></td>
          <td><?php echo $row2["aroom"]; ?></td>
          <td><?php echo $row2["adisc"]; ?></td>
          <td><?php echo $row2["nrate"]; ?></td>
          <td><?php echo $row2["nroom"]; ?></td>
          <td><?php echo $row2["ndisc"]; ?></td>
          <td><?php echo $row2["drate"]; ?></td>
          <td><?php echo $row2["droom"]; ?></td>
          <td><?php echo $row2["ddisc"]; ?></td>
          <td><?php echo $row2["location"]; ?></td>
          <td> <img src="upload/<?php echo $row2["photo"]?>" style="border-radius:50%;width: 40px;height:40px;"></td>
          <?php }?>
          </table>
</div>
<style>
.cont{
  background: rgba(255, 255, 255, 0.37);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(9.3px);
-webkit-backdrop-filter: blur(9.3px);
border: 1px solid black;
}
</style>
</body>
    </html>