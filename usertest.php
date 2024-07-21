<?php
session_start();
include("connection.php");
?>
<?php
$username=$_SESSION['uname'];
$query="select * from tbl_user where username='$username'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
$dob=$row['dob'];
$photo=$row['photo'];
?>
<?php
if($username!=null){
?>
<html>
    <head>
      <style>
        .error{
          color:red;
          font-size: 13px;
          margin-left: -48px;
          margin-top: 21px;
        }
        </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script>
     <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/start/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

        <style>
            body{
                background-image: url("userp.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                position: fixed;
            }
            .mcard {
                /* From https://css.glass */
                    background: rgba(0, 0, 0, 0.42);
                    border-radius: 16px;
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(7.7px);
                    -webkit-backdrop-filter: blur(7.7px);
                    border: 1px solid rgba(0, 0, 0, 0.31);
                    margin-left: 190px;
                    height: 543px;
                    margin-top: 153px;
                    width: 1132px;
            }
            .tptable{   
            height: 448px;
            margin-top: 39px;
            }
            td{
                color: white;
                font-family: 'Courier New', Courier, monospace;
             padding-left: 98px;
             font-weight: 600;
            }
            </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>     
            <body>
                <section class="mcard">
        <table class="tptable">
        <tr><td>Name</td><td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo $name?>"disabled></td></tr>
        <tr><td>Email</td><td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"  value="<?php echo$email?>" disabled></td></tr>
        <tr><td>Phone</td><td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo $phone?>" disabled></td></tr>
        <tr><td>D.O.B</td><td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo$dob?>" disabled></td></tr>
        <tr><td colspan="1"><button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Profile</button></td>
        </table>
        <img src="upload/<?php echo $photo?>" style="border-radius:50%; height: 200px;width: 200px;margin-left: 790px;margin-top: -389px;" alt="sing up image"><br>
        <a href="forget.php"><button type="button" class="btn btn-light" style="margin-top: -148px;margin-left: 810px;"><label style="font-family: 'Courier New', Courier, monospace;color:36FF00;">Change Password</label></button></a><br><br><br>
        <a href="delete.php"><button type="button" class="btn btn-light" style="margin-top: -138px;margin-left: 854px;"><label style="font-family: 'Courier New', Courier, monospace;color:red;">Delete</label></button></a>
        </section>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="height:380px;width: 500px;">
<div class="signup-content" style="width: 636px;">
<form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
<table style="margin-left: -82px;height: 283px;">
        <tr><td style="color:black;">Name</td><td><input type="text" name="name" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo $name?>"></td></tr>
        <tr><td style="color:black;">Email</td><td><input type="text" name="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"  value="<?php echo$email?>"></td></tr>
        <tr><td style="color:black;">Phone</td><td><input type="text" name="phone" id="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo $phone?>"></td></tr>
        <tr><td style="color:black;">D.O.B</td><td><input type="text" name="dob" id="dob" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" value="<?php echo$dob?>"></td></tr>
        </table>
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
      $query="update tbl_user set name='$name',email='$email',phone='$phone',dob='$dob' where username='$username'";
      $insert=mysqli_query($con,$query);
      if($insert){
        ?><script>
        window.location.href="usertest.php"
        </script>
        <?php
      }
    }

    ?>
</html>
<?php
}?>