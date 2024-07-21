<?php
    include("connection.php");
    if(isset($_POST['username'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);

    $query = "select count(*) as cntUser from tbl_dealer where username='".$username."'";

    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'>Available.</span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        
        if($count > 0){
            $response = "<span style='color: red;'>Not Available.</span>";
        }
    
    }

    echo $response;
    die;
    }
    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($con,$_POST['email']);
    
        $query = "select count(*) as cntUser from tbl_dealer where email='".$email."'";
    
        $result = mysqli_query($con,$query);
        $response = "<span style='color: green;'></span>";
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
            
            if($count > 0){
                $response = "<span style='color: red;'>Email already Exist.</span>";
            }
        
        }
    
        echo $response;
        die;
        }
        ?>