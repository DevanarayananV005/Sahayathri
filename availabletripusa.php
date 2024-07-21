<?php
session_start();
?>
<?php
include("connection.php");
$query="select * from tbl_availtrip where Destination='USA' and status='0'";
$insert=mysqli_query($con,$query);
$count=mysqli_num_rows($insert);
if($count==0){
?>
<script>alert("Sorry no trips are available to USA now!!")
window.location.href="main2.php";
</script>
<?php
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sahayathri</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css3/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css3/style.css" rel="stylesheet">
</head>

<body>

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Trips</h6>
                <h1 class="mb-5">Available Trips</h1>
            </div>
            <div class="row g-4 justify-content-center">
            <?php while($row=mysqli_fetch_assoc($insert)){
                $availid=$row['id'];
                $name=$row['maker_name'];
                $dest=$row['Destination'];
                $beg=$row['trip_beg'];
                $end=$row['trip_end'];
                $type=$row['trip_type'];
                $tmem=$row['count_mem'];
                $budget=$row['budget'];
                $photo=$row['maker_img'];
                $_SESSION['availid']=$availid;
                ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                       <center> <img src="upload/<?php echo $photo?>" alt="sing up image" style="height: 223px;width: 332px;"></center>
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $dest;?></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?php echo $beg."-".$end; ?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $tmem;?></small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0"><?php echo $name;?></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <p>The trip is to <?php echo $dest ?> at a <?php echo $budget?> class</p>
                            <div class="d-flex justify-content-center mb-2">
                            <?php echo "<a href='request.php?availid=$availid' class='btn btn-sm btn-primary px-3' style='border-radius: 30px 30px 30px 30px;'>Send Request</a>"?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
                </div>
            </div>
    <!-- Package End -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js2/main.js"></script>
</body>
</html>
<?php
}?>