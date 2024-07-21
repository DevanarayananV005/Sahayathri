<?php
session_start();
include("connection.php");
?>
<html style="background-color: #2affdc;">
    <head>
        <title>
            Verification
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OTP Verification</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script> 
    </head>
    <body>
        <section class="sign-in" style="margin-top: 141px; background-color: #2affdc;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/20602807_6333057.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">OTP Verification</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="otp_code" id="otp" placeholder="Enter OTP"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Verify"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    </body>
    <?php
        if(isset($_POST["signin"])){
            $otp = $_SESSION['otp'];
            $email = $_SESSION['mail'];
            $otp_code = $_POST['otp_code'];   
        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($con, "UPDATE tbl_user SET status = 1,verify=1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("login.php");
             </script>
             <?php
        }
        }
    ?>
</html>