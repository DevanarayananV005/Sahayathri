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
            flight_no: {
              required: true,
              pattern: /^[A-Z][A-Z0-9]-[A-Z0-9][A-Z0-9][A-Z]$/
            },
            flight_name: {
              required: true,
              pattern: /^[a-zA-Z ]*$/,
              minlength:3
            },
            departure_time: {
              required: true
            },
            arrival_time: {
              required: true
            },
            from_l: {
              required: true,
              notEqual: "#to_l"
            },
            to_l: {
              required: true,
              notEqual: "#from_l"
            },
            f_class: {
              required: true,
              max:545
            },
            b_class: {
              required: true,
              max:545
            },
            p_e_class: {
              required: true,
              max:545
            },
            e_class: {
              required: true,
              max:545
            }
          },
          messages: {
            flight_no: {
              required: "Please enter your name",
              pattern:"The flight number should be in AA1-A1A1A"
            },
            flight_name: {
              required: "Please enter your name",
              pattern:"The name should contain letter and space only",
              minlength:"Minimum 3 Charecters required"
            },
            departure_time: {
              required: "Please enter departure time"
            },
            arrival_time: {
              required: "Please enter arival time"
            },
            from_l: {
              required: "Please enter From location",
              notEqual: "Both from and to can't be same"
            },
            to_l: {
              required: "Please enter To location",
              notEqual: "Both from and to can't be same"
            },
            f_class: {
              required: "Please enter Seat count",
              max:"maximum 545 seats only"
            },
            b_class: {
              required: "Please enter Seat count",
              max:"maximum 545 seats only"
            },
            p_e_class: {
              required: "Please enter Seat count",
              max:"maximum 545 seats only"
            },
            e_class: {
              required: "Please enter Seat count",
              max:"maximum 545 seats only"
            }
          },
        });
      
      $.validator.addMethod("notEqual", function(value, element, param) {
    return this.optional(element) || $(element).val() != $(param).val();
  }, "Please choose a different option.");
});
    submit
</script>
    </head>
    <body>
      <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Flight Register</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="flight_no"></label>
                                <input type="text" name="flight_no" id="flight_no" placeholder="Flight Number"/>
                            </div>
                            <div class="form-group">
                              <label for="flight_name"></label>
                              <input type="text" name="flight_name" id="flight_name" placeholder="Flight Name"/>
                          </div>
                            <div class="form-group">
                                <label for="departure_time"></label>
                                <input type="text" name="departure_time" id="departure_time" placeholder="Departure Time" onfocus="(this.type='time')"/>
                                <span id="email_response"></span>
                            </div>
                            <div class="form-group">
                                <label for="arrival_time"></label>
                                <input type="text" name="arrival_time" id="arrival_time" placeholder="Arrival Time" onfocus="(this.type='time')"/>
                                <span id="email_response"></span>
                            </div>
                            <div class="form-group">
                                <label for="from_l"></label>
                                <select name="from_l" id="from_l"> 
                                  <option disabled selected value="">From Location</option>
                                  <option value="India"> India </option>
                                  <option value="China"> China </option>
                                  <option Value="USA"> USA </option>
                                  <option Value="UK"> UK </option>
                                  <option Value="Switzerland"> Switzerland </option>
                                  <option Value="Brazil"> Brazil </option>
                                </select>
                                <label for="to_l"></label>
                                <select style="margin-left: 50px;" name="to_l" id="to_l">
                                  <option selected disabled value="">To Location</option>
                                  <option value="India"> India </option>
                                  <option value="China"> China </option>
                                  <option Value="USA"> USA </option>
                                  <option Value="UK"> UK </option>
                                  <option Value="Switzerland"> Switzerland </option>
                                  <option Value="Brazil"> Brazil </option>
                                </select>
                            </div>
                            <label class="form-group"><b>Seat Detail</b></label>
                            <div class="form-group">
                                <input type="text" Value="First Class" disabled style="width: 150px;"/>
                                <label for="email"></label>
                                <div style="margin-left:169px;margin-top: -33px;"><input type="text" name="f_class" id="f_class" placeholder="count" style="width: 120px;"/></div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="text" Value="Buisness Class" disabled style="width: 150px;"/>
                                <div style="margin-left:169px;margin-top: -33px;"><input type="text" name="b_class" id="b_class" placeholder="count" style="width: 120px;"/></div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="text" Value="Premium Economy Class" disabled style="width: 150px;"/>
                                <div style="margin-left:169px;margin-top: -33px;"><input type="text" name="p_e_class" id="p_e_class" placeholder="count" style="width: 120px;"/></div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="text" Value="Economy Class" disabled style="width: 150px;"/>
                                <div style="margin-left:169px;margin-top: -33px;"><input type="text" name="e_class" id="e_class" placeholder="count" style="width: 120px;"/></div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <?php
    if(isset($_POST["signup"])){
      $flight_no=$_POST["flight_no"];
      $flight_name=$_POST["flight_name"];
      $dept_time=$_POST["departure_time"];
      $arr_time=$_POST["arrival_time"];
      $from_l=$_POST["from_l"];
      $to_l=$_POST["to_l"];
      $f_class=$_POST["f_class"];
      $b_class=$_POST["b_class"];
      $p_e_class=$_POST["p_e_class"];
      $e_class=$_POST["e_class"];
      include("connection.php");
      $query="insert into tbl_flight (flight_no,flight_name,dept_time,arr_time,from_l,to_l,f_class,b_class,p_e_class,e_class)
                  values('$flight_no','$flight_name','$dept_time','$arr_time','$from_l','$to_l','$f_class','$b_class','$p_e_class','$e_class')";
      $insert=mysqli_query($con,$query);
      if($insert){
      ?>
      <script>
        window.location.href= 'admin.php';
      </script>
      <?php
    }
    }

    ?>
</html>