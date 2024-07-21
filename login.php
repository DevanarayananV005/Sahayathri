<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<html style="background-color: #2affdc;">
    <head>
        <title>
            login
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign in</title>
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
                        <figure><img src="images/signin-image.png" alt="sing up image"></figure>
                        <a class="signup-image-link" href="register.php">Create an account</a>
                        <a class="signup-image-link" href="forget.php">Forgot Password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="UserName"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
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
            $username=$_POST["username"];
            $password=$_POST["your_pass"];
            include("connection.php");
            $query="select * from tbl_user where username='$username' and password='$password'";
            $result=mysqli_query($con,$query);
            $count=mysqli_num_rows($result);
            $row=mysqli_fetch_array($result);
            if($count>0){
                    if($row['status']==0){
                        ?>
                        <script>
                            alert("Account not Approved.. Retry after some time!!");
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                        window.location.href='main2.php';
                        </script>
                        <?php
                        $_SESSION['uname']=$username;
                    }
            }
            else{
                ?>
                <script>
                    alert("wrong Username or Password retry!!")
                </script>
                <?php
            }

        }
    ?>
</html>