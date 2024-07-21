<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

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
<script>
      $(document).ready(function() {
        var $signupButton = $('#signup');
        
        $("#register-form").validate({
          rules: {
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
            }
          },
          messages: {
            password: {
              required:"please enter password",   
              minlength: "password length  is min  8 characters",
              maxlength: "password length is max 16 charecter",
              pattern: "The password should contain a capital letter,small letter,integer and charecter"
            },
            confirm_password: {
              required:"please enter password",   
              minlength: "password length  is min  8 characters",
          equalTo:"should match password"	
            }
          },
        });
      });
    submit
</script>
<script>
            $(document).ready(function(){
            // password availability
            $("#password").keyup(function(){

                var password = $(this).val().trim();

                if(password != ''){

                    $.ajax({
                        url: 'useravail.php',
                        type: 'POST',
                        data: {password: password},
                        success: function(response){

                            $('#password_response').html(response);

                        }
                    });
                }else{
                    $("#password_response").html("");
                }

                });
            });
        </script>


    </head>
    <body>
      <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                                <span id="password_response"></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Change"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/reset.png" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
       
    </body>
    <?php
    if(isset($_POST["signup"])){
      $password=$_POST["password"];
      $email = $_SESSION['email'];
      echo $email;
      include("connection.php");
      $query="update tbl_user SET password='$password' where email='$email'";
      $insert=mysqli_query($con,$query);
      if($insert){
      ?>
      <script>
        alert("Password Change Success")
        window.location.href= 'login.php';
      </script>
      <?php
      }
    }

    ?>
</html>