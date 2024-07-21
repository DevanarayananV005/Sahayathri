<?php
session_start();
include("connection.php");
?>
<html>
    <head>
        <title>
            Register
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script> 
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/start/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
      $(document).ready(function() {
        var $signupButton = $('#signup');
        
        $("#register-form").validate({
          rules: {
            name: {
              required: true,
              pattern: /^[a-zA-Z ]*$/,
              minlength: 3
            
            },
            cname: {
              required: true,
              pattern: /^[a-zA-Z ]*$/,
              minlength: 3
            },
            phone: {
              required: true,
              number: true,
              minlength:10,
              maxlength: 10 
            },
            email: {
              required: true,
              pattern: /^[\w-\.]+@([\w-]+\.){1,3}[\w-]{2,4}$/
            },
            password: {
              required: true,
              minlength: 8,
              maxlength: 16,
              pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#&\/\\])[a-zA-Z0-9!@#&\/\\]{8,16}$/
            },
            confirm_password: {
              required:true,
          minlength:true,
          equalTo:"#password"
            },
            username: {
              required: true,
              minlength:6,
              maxlength:12
            },
            photo: {
              required: true,
              extension: "jpg"
            },
            id_proof: {
              required: true,
              extension: "pdf"
            }
          },
          messages: {
            name: {
              required: "Please enter your name",
              minlength: "Minimum 3 Charecters required",
              pattern: "Name should contain only alphabets and spaces"
            },
            name: {
              required: "Please enter your Company name",
              minlength: "Minimum 3 Charecters required",
              pattern: "Company Name should contain only alphabets and spaces"
            },
            phone: {
              required: "Please enter your phone number",
              minlength: "Please enter a valid phone number",
              number: "Please enter a valid phone number",
              maxlength: "Please enter a valid phone number"
            },
            email: {
              required: "Please enter your email",
              pattern: "Please Enter the Correct mail"
            },
            dob: {
              required: "Please enter your date of birth",
              date: "Please enter a valid date",
              minlength: "Please enter a valid date",
              validateAge: "You should be at least 18 years old"
            },
            password: {
              required:"please enter password",   
              minlength: "password length  is min  8 characters",
              maxlength: "Password must not exceed 16 charecter",
              pattern: "The password should contain a capital letter,small letter,integer and charecter"
            },
            confirm_password: {
              required:"please enter password",   
              minlength: "password length  is min  8 characters",
          equalTo:"should match password"	
            },
            username: {
              required: "Please enter your username",
              minlength:"Minimum 6 characters required",
              maxlength:"Maximum 12 Charecters only allowed"
            },
            photo: {
              required: "Please upload your photo",
              extension: "Please upload only JPG images"
            },
            id_proof: {
              required: "Please upload your identity proof",
              extension: "Please upload only PDF files"
            }
          },
        });
        $.validator.addMethod(
          "validateAge",
          function(value, element) {
            var today = new Date();
            var birthDate = new Date(value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
              age--;
            }
            return age >= 18;
          },
          "You should be at least 18 years old"
        );
      });
    submit
</script>
<script>
  $(document).ready(function(){
    $("#dob").datepicker({
      changeMonth:true,
      changeYear:true,
      yearRange:"1950:2023",
      maxDate:"-18y"
    }); 
  });
</script>
<script>
            $(document).ready(function(){
            // username availability
            $("#username").keyup(function(){

                var username = $(this).val().trim();

                if(username != ''){

                    $.ajax({
                        url: 'useravil2.php',
                        type: 'post',
                        data: {username: username},
                        success: function(response){

                            $('#uname_response').html(response);

                        }
                    });
                }else{
                    $("#uname_response").html("");
                }

                });
            });
        </script>
        <script>
            $(document).ready(function(){
            // username availability
            $("#email").keyup(function(){

                var email = $(this).val().trim();

                if(email != ''){

                    $.ajax({
                        url: 'useravil2.php',
                        type: 'post',
                        data: {email: email},
                        success: function(response){

                            $('#email_response').html(response);

                        }
                    });
                }else{
                    $("#email_response").html("");
                }

                });
            });
        </script>


    </head>
    <body style="background-color: burlywood;">
      <div class="main" style="background-color: burlywood;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Dealer Registration</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Dealer Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-building"></i></label>
                                <input type="text" name="cname" id="cname" placeholder="Company Name"/>
                            </div>
                            <div class="form-group">
                              <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                              <input type="number" name="phone" id="phone" placeholder="Your Phone"/>
                          </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" @keyup='checkemail()'/>
                                <span id="email_response"></span>
                            </div>
                          <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username"  @keyup='checkUsername()'/>
                            <span id="uname_response"></span>
                        </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                              <label for="doc">Enter Photo</label>
                              <input type="file" name="photo" id="photo" placeholder="Enter Your Photo" style="margin-left: 56px;"/>
                          </div>
                          <div class="form-group">
                            <label for="doc">Enter Identity</label>
                            <input type="file" name="id_proof" id="id_proof" style="margin-left: 56px;"/>
                        </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/pngfind.com-hotel-png-2217391.png" alt="sing up image"></figure>
                        <a href="logindealer.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <?php
    if(isset($_POST["signup"])){
      $name=$_POST["name"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $cname=$_POST["cname"];
      $username=$_POST["username"];
      $password=$_POST["password"];
      $photo=$_FILES["photo"]["name"];
      $identity=$_FILES["id_proof"]["name"];
      $query="insert into tbl_dealer (name,email,phone,company,username,password,photo,identity,status) values('$name','$email','$phone','$cname','$username','$password','$photo','$identity','0')";
      $insert=mysqli_query($con,$query);
      if($insert){
      $targetdir="upload/";
      $targetfilepath=$targetdir.basename($photo);
      move_uploaded_file($_FILES["photo"]["tmp_name"],$targetfilepath);
      $targetdir2="upload/";
      $targetfilepath2=$targetdir2.basename($identity);
      move_uploaded_file($_FILES["id_proof"]["tmp_name"],$targetfilepath2);
      $otp = rand(100000,999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='devanarayananv2025@mca.ajce.in';
                    $mail->Password='appu#7692';
    
                    $mail->setFrom('devanarayananv2025@mca.ajce.in', 'SAHAYATHRI OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>Dear $name, </p> <h3>Your verify OTP code is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>SAHAYATHRI</b>";
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                    window.location.replace('regverification2.php');
                                </script>
                                <?php
                            }
    }
    }

    ?>
</html>