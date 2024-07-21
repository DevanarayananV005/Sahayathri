<?php
session_start();
?>
<?php
$username=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_user where username='$username'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
$dob=$row['dob'];
$photo=$row['photo'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Profile</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script>
      $(document).ready(function() {
        var $signupButton = $('#update');
        
        $("#register-form").validate({
          rules: {
            name: { 
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
              email: true
            },
            dob: {
              required: true,
              date: true,
              minlength: 10,
              validateAge: true
            },
            password: {
              required: true,
            pwcheck: true,
              minlength: 8
            },
            confirm_password: {
              required:true,
          minlength:true,
          equalTo:"#password"
            },
            username: {
              required: true,
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
            phone: {
              required: "Please enter your phone number",
              minlength: "Please enter a valid phone number",
              number: "Please enter a valid phone number",
              maxlength: "Please enter a valid phone number"
            },
            email: {
              required: "Please enter your email",
              email: "Please enter a valid email"
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
          pwcheck:"should contain capital,small  letters and numbers" 
            },
            confirm_password: {
              required:"please enter password",   
              minlength: "password length  is min  8 characters",
          equalTo:"should match password"	
            },
            username: {
              required: "Please enter your username",
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
    </head>
    <body>
      <div class="main">

        <!--Update form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">User Profile</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?php echo $name?>"disabled/>
                            </div>
                            <div class="form-group">
                              <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                              <input type="number" name="phone" id="phone" value="<?php echo $phone?>" disabled/>
                          </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo$email?>" disabled/>
                            </div>
                            <div class="form-group">
                              <label for="D.O.B"><i class="zmdi zmdi-date"></i></label>
                              <input type="date" name="dob" id="dob" value="<?php echo$dob?>" disabled/>
                          </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="upload/<?php echo $photo?>" style="border-radius:50%; height: 278px;width: 287px;" alt="sing up image"></figure>
                        <a href="forget.php" class="signup-image-link">Change Password</a><br>
                        <button type="button" class="btn btn-secondary" style="margin-left: 209px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Profile</button><br><br>
                        <a href="delete.php"+><button type="button" class="btn btn-danger" style="margin-left: 200px;">Delete Profile</button></a><br>
                    </div>
                </div>
            </div>
        </section>
       <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="height: 500px;width: 500px;">
<div class="signup-content" style="width: 636px;">
                    <div class="signup-form">
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="<?php echo $name?>"/>
                            </div>
                            <div class="form-group">
                              <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                              <input type="number" name="phone" id="phone" value="<?php echo $phone?>"/>
                          </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?php echo$email?>"/>
                            </div>
                            <div class="form-group">
                              <label for="D.O.B"><i class="zmdi zmdi-date"></i></label>
                              <input type="date" name="dob" id="dob" value="<?php echo$dob?>"/>
                          </div>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </body>
    <?php
    if(isset($_POST["update"])){
      $name=$_POST["name"];
      $email=$_POST["email"];
      $phone=$_POST["phone"];
      $dob=$_POST["dob"];
      include("connection.php");
      $query="update tbl_user set name='$name',email='$email',phone='$phone',dob='$dob' where username='$username'";
      $insert=mysqli_query($con,$query);
      if($insert){
        ?><script>
        window.location.href="profile.php"
        </script>
        <?php
      }
    }

    ?>
</html>