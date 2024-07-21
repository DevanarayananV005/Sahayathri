<html>
    <head>
        <title>
            Register
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hotel Registration</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script> 
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/start/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
  $('#register-form').validate({
    rules: {
      name: {
        required: true,
              pattern: /^[a-zA-Z ]*$/,
              minlength: 3
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 10,
        digits: true
      },
      sroom: {
        required: true,
        range: [0, 20],
        digits: true
      },
      srate: {
        required: true,
        min: 1000,
        digits: true
      },
      sdisc: {
        required: true,
        range: [5, 95],
        digits: true
      },
      aroom: {
        required: true,
        digits: true,
        min: 0
      },
      arate: {
        required: true,
        min: 1000,
        digits: true
      },
      adisc: {
        required: true,
        range: [5, 95],
        digits: true
      },
      nroom: {
        required: true,
        digits: true,
        min: 10
      },
      nrate: {
        required: true,
        min: 1000,
        digits: true
      },
      ndisc: {
        required: true,
        range: [5, 95],
        digits: true
      },
      droom: {
        required: true,
        digits: true,
        min: 10
      },
      drate: {
        required: true,
        min: 100,
        digits: true
      },
      ddisc: {
        required: true,
        range: [5, 95],
        digits: true
      },
      location: {
        required: true
      },
      photo: {
         required: true,
         extension: "jpg|jpeg|png"
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
        minlength: "Your phone number must be exactly 10 digits long",
        maxlength: "Your phone number must be exactly 10 digits long",
        digits: "Your phone number must contain only digits"
      },
      sroom: {
        required: "Please enter the number of single rooms",
        range: "The number of single rooms must be between 0 and 20",
        digits: "The number of single rooms must be a whole number"
      },
      srate: {
        required: "Please enter the single room rate",
        min: "The single room rate must be at least 1000",
        digits: "The single room rate must be a whole number"
      },
      sdisc: {
        required: "Please enter the single room discount",
        range: "The single room discount must be between 5% and 95%",
        digits: "The single room discount must be a whole number"
      },
      aroom: {
        required: "Please enter the number of apartments",
        digits: "The number of apartments must be a whole number",
        min: "The number of apartments must be at least 0"
      },
      arate: {
        required: "Please enter the single room rate",
        min: "The single room rate must be at least 1000",
        digits: "The single room rate must be a whole number"
      },
      adisc: {
        required: "Please enter the single room discount",
        range: "The single room discount must be between 5% and 95%",
        digits: "The single room discount must be a whole number"
      },
      nroom: {
        required: "Please enter the number of normal rooms",
        digits: "The number of normal rooms must be a whole number",
        min: "The number of normal rooms must be at least 10"
      },
      nrate: {
        required: "Please enter the single room rate",
        min: "The single room rate must be at least 1000",
        digits: "The single room rate must be a whole number"
      },
      ndisc: {
        required: "Please enter the single room discount",
        range: "The single room discount must be between 5% and 95%",
        digits: "The single room discount must be a whole number"
      },
      droom: {
        required: "Please enter the number of deluxe rooms",
        digits: "The number of deluxe rooms must be a whole number",
        min: "The number of deluxe rooms must be at least 10"
      },
      drate: {
        required: "Please enter the deluxe room rate",
        min: "The deluxe room rate must be at least 100",
        digits: "The deluxe room rate must be a whole number"
      },
      ddisc: {
        required: "Please enter the single room discount",
        range: "The single room discount must be between 5% and 95%",
        digits: "The single room discount must be a whole number"
      },
      location: {
        required: "Please select the location"
      },
      photo: {
              required: "Please select the photo of Hotel",
              extension: "The phote can only be JPEG,JPG or PNG"
            },
    }
  });
});
submit
</script>
    </head>
    <body style="background-color: burlywood;">
      <div class="main" style="background-color: burlywood;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container" style="width: 1218px;">
                <div class="signup-content">
                    <div class="signup-form" style="width: 2224px;">
                        <h2 class="form-title">Hotel Registration</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Hotel Name"/>
                            </div>
                            <div class="form-group">
                              <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                              <input type="number" name="phone" id="phone" placeholder="Hotel Phone"/>
                          </div>
                          <h3 class="form-title">Room Details</h3>
                          <table style="width: 757px;height: 241px;">
                            <tr><td>
                            <div class="form-group">
                                <label for="suit"><i></i></label>
                                <input type="text" name="suit" id="suit" placeholder="Suit" style="width: 125px;" disabled/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="srate"><i></i></label>
                                <input type="text" name="srate" id="srate" placeholder="Room Rate" style="width: 133px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="sroom"><i></i></label>
                                <input type="text" name="sroom" id="sroom" placeholder="Room Count" style="width: 143px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="sdisc"><i></i></label>
                                <input type="text" name="sdisc" id="sdisc" placeholder="Room Discount" style="width: 162px;"/>
                            </div>
                              </td>
                            </tr>
                            <tr><td>
                            <div class="form-group">
                                <label for="A/C"><i></i></label>
                                <input type="text" name="A/C" id="A/C" placeholder="A/C Room" style="width: 125px;" disabled/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="arate"><i></i></label>
                                <input type="text" name="arate" id="arate" placeholder="Room Rate" style="width: 133px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="aroom"><i></i></label>
                                <input type="text" name="aroom" id="aroom" placeholder="Room Count" style="width: 143px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="adisc"><i></i></label>
                                <input type="text" name="adisc" id="adisc" placeholder="Room Discount" style="width: 162px;"/>
                            </div>
                              </td>
                            </tr>
                            <tr><td>
                            <div class="form-group">
                                <label for="Non-A/C"><i></i></label>
                                <input type="text" name="Non-A/C" id="Non-A/C" placeholder="Non-A/C" style="width: 125px;" disabled/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="nrate"><i></i></label>
                                <input type="text" name="nrate" id="nrate" placeholder="Room Rate" style="width: 133px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="nroom"><i></i></label>
                                <input type="text" name="nroom" id="nroom" placeholder="Room Count" style="width: 143px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="ndisc"><i></i></label>
                                <input type="text" name="ndisc" id="ndisc" placeholder="Room Discount" style="width: 162px;"/>
                            </div>
                              </td>
                            </tr>
                            <tr><td>
                            <div class="form-group">
                                <label for="Dormitory"><i></i></label>
                                <input type="text" name="Dormitory" id="Dormitory" placeholder="Dormitory" style="width: 125px;" disabled/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="drate"><i></i></label>
                                <input type="text" name="drate" id="drate" placeholder="Room Rate" style="width: 133px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="droom"><i></i></label>
                                <input type="text" name="droom" id="droom" placeholder="Room Count" style="width: 143px;"/>
                            </div>
                              </td>
                              <td>
                            <div class="form-group">
                                <label for="ddisc"><i></i></label>
                                <input type="text" name="ddisc" id="ddisc" placeholder="Room Discount" style="width: 162px;"/>
                            </div>
                              </td>
                            </tr>
                             </table>
                             <h3 class="form-title">Location:</h3>
                             <div class="form-group">
                              <label for="location"><i class="zmdi zmdi-location"></i></label>
                              <input type="radio" id="location" name="location" value="Brazil" style="margin-left: -347px;"/><label style="margin-left: 194px;margin-top: -39px;">:Brazil</label>
                              <input type="radio" id="location" name="location" value="China" style="margin-left: -347px;"/><label style="margin-left: 194px;margin-top: -23px;">:China</label>
                              <input type="radio" id="location" name="location" value="India" style="margin-left: -347px;"/><label style="margin-left: 194px;margin-top: -7px;">:India</label>
                              <input type="radio" id="location" name="location" value="Switzerland" style="margin-left: -347px;"/><label style="margin-top: 10px;margin-left: 194px;">:Switzerland</label>
                              <input type="radio" id="location" name="location" value="UK" style="margin-left: -347px;"/><label style="margin-top: 26px;margin-left: 194px;">:UK</label>
                              <input type="radio" id="location" name="location" value="USA" style="margin-left: -347px;"/><label style="margin-top: 43px;margin-left: 194px;">:USA</label>
                            </div>
                            <div class="form-group">
                              <label for="photo">Enter Photo</label>
                              <input type="file" name="photo" id="photo" placeholder="Enter Your Photo" style="margin-left: 56px;"/>
                          </div>
                          <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <?php
    if(isset($_POST["signup"])){
      $name=$_POST["name"];
      $phone=$_POST["phone"];
      $sroom=$_POST["sroom"];
      $srate=$_POST['srate'];
      $sdisc=$_POST["sdisc"];
      $aroom=$_POST["aroom"];
      $arate=$_POST['arate'];
      $adisc=$_POST["adisc"];
      $nroom=$_POST["nroom"];
      $nrate=$_POST['nrate'];
      $ndisc=$_POST["ndisc"];
      $droom=$_POST["droom"];
      $drate=$_POST['drate'];
      $ddisc=$_POST["ddisc"];
      $location=$_POST["location"];
      $photo=$_FILES["photo"]["name"];
      include("connection.php");
      $query="insert into tbl_hotel(`dealer_id`, `name`, `phone`, `sroom`, `srate`, `sdisc`, `aroom`, `arate`, `adisc`, `nroom`, `nrate`, `ndisc`, `droom`, `drate`, `ddisc`, `location`, `photo`)values('$id','$name','$phone','$sroom','$srate','$sdisc','$aroom','$arate','$adisc','$nroom','$nrate','$ndisc','$droom','$drate','$ddisc','$location','$photo')";
      $insert=mysqli_query($con,$query);
      if($insert){
      $targetdir="upload/";
      $targetfilepath=$targetdir.basename($photo);
      move_uploaded_file($_FILES["photo"]["tmp_name"],$targetfilepath);
      ?>
      <script>
        window.location.href="dalerhome.php"
      </script>
      <?php
    }
    }
    ?>
</html>