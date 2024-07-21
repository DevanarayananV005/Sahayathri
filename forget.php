<?php
 session_start(); 
?>
<html style="background-color: #2affdc;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>forget Password</title>
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
                        <figure><img src="images/forget.png" alt="sing up image"></figure>
                        <a class="signup-image-link" href="register.php">Create an account</a>
                        <a class="signup-image-link" href="login.php">Remember Password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Change Password</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="UserName"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="email"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="otp" id="signin" class="form-submit" value="Send Link+"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    </body>
     <?php
        if(isset($_POST["otp"])){
            $username=$_POST["username"];
            $email=$_POST["email"];
            include("connection.php");
            $query="select * from tbl_user where username='$username' and email='$email'";
            $result=mysqli_query($con,$query);
            $count=mysqli_num_rows($result);
            if($count>0){
                $token = bin2hex(random_bytes(50));

                //session_start ();
                $_SESSION['token'] = $token;
                $_SESSION['email'] = $email;
    
                require "Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;
    
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';
    
                // h-hotel account
                $mail->Username='devanarayananv2025@mca.ajce.in';
                $mail->Password='appu#7692';
    
                // send by h-hotel email
                $mail->setFrom('devanarayananv2025@mca.ajce.in', 'SAHAYATHRI');
                // get email from input
                $mail->addAddress($_POST["email"]);
                //$mail->addReplyTo('lamkaizhe16@gmail.com');
    
                // HTML body
                $mail->isHTML(true);
                $mail->Subject="Reset Your Password";
                $mail->Body="<b>Dear User</b>
                <h3>We received a request to reset your password.</h3>
                <p>Kindly click the below link to reset your password</p>
                http://localhost/miniproject/reset_psw.php
                <br><br>
                <p>With regrads,</p>
                <b>SAHAYATHRI</b>";
    
                if(!$mail->send()){
                    ?>
                         <script>
                            alert("<?php echo " Invalid Email "?>");
                        </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("<?php echo "Password Reset Send to your registered email!!"?>")
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    alert("Username and mail does not match!!")
                </script>
                <?php
            }
        }
    ?>
</html>