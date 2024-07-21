<?php
session_start();
?>
<?php
$username=$_SESSION['uname'];
include("connection.php");
$query="select * from tbl_user where username='$username'";
$insert=mysqli_query($con,$query);
$row=mysqli_fetch_array($insert);
$id=$row['user_id'];
$name=$row['name'];
$phone=$row['phone'];
$email=$row['email'];
$dob=$row['dob'];
$photo=$row['photo'];
?>
<?php
$conn=mysqli_connect("localhost","root","","mini_project");
$query2="select * from tbl_availtrip where user_id='$id'";
$insert2=mysqli_query($conn,$query2);
$acount=mysqli_num_rows($insert2);
if($acount>0){
  ?>
  <script>alert("You Have already Made a trip");
  window.location.href="main2.php";
</script>
  <?php
}
else{
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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function(){
  $('#maketrip').validate({
    rules: {
      dest: {
        required: true
      },
      budget: {
        required: true
      },
      tripbeg: {
        required: true,
        date: true
      },
      tripend: {
        required: true,
        date: true,
        differentDates: true,
        dateGreaterThanTripbeg: true
      },
      triptype: {
        required: true
      },
      groupnum: {
        required: function(element) {
          return $("#triptype").val() == "triptypeg";
        }
      }
    },
    messages: {
      dest: "Please enter your destination.",
      budget: "Please enter your budget.",
      tripbeg: {
        required: "Please enter your trip start date.",
        date: "Please enter a valid date format (mm/dd/yyyy)."
      },
      tripend: {
        required: "Please enter your trip end date.",
        date: "Please enter a valid date format (mm/dd/yyyy).",
        differentDates: "Please select different dates for trip start and end.",
        dateGreaterThanTripbeg: "Please select a date which is at least 5 days later than trip start date."
      },
      triptype: { 
        require:"Please select your trip type."
    },
      groupnum: "Please enter the number of people in your group."
    },
    errorPlacement: function(error, element) {
      if (element.attr("name") == "triptype") {
        error.insertAfter("#triptypelabel");
      } else {
        error.insertAfter(element);
      }
    }
  });
  
  jQuery.validator.addMethod("differentDates", function(value, element) {
    var tripbeg = $('#tripbeg').val();
    return value != tripbeg;
  }, "Please select different dates for trip start and end.");
  
  jQuery.validator.addMethod("dateGreaterThanTripbeg", function(value, element) {
    var tripbeg = $('#tripbeg').val();
    var tripbeg_date = new Date(tripbeg);
    var tripend_date = new Date(value);
    var days_diff = Math.ceil((tripend_date - tripbeg_date) / (1000 * 60 * 60 * 24));
    return days_diff >= 5;
  }, "Please select a date which is at least 5 days later than trip start date.");
});
submit

            </script>
<script>
    $(function(){
        $("input[name='triptype']").click(function(){
            if($("#triptypeg").is(":checked")){
                $("#groupnum").removeAttr("disabled");
                $("#groupnum").removeAttr("hidden");
                $("#groupnumdis").removeAttr("hidden");
                $("#groupnum").focus();
            }
            else{
                $("#groupnum").attr("disabled","disabled"); 
                $("#groupnum").attr("hidden","hidden");
                $("#groupnumdis").attr("hidden","hidden");
            }
        });
    });
</script>
<script>
  $(document).ready(function(){
    $("#tripbeg").datepicker({
      changeMonth:true,
      changeYear:true,
      yearRange:"2023:2025",
      minDate:1,
      maxDate:"1y"
    }); 
  });
  $(document).ready(function(){
    $("#tripend").datepicker({
      changeMonth:true,
      changeYear:true,
      yearRange:"2023:2025",
      minDate:5,
      maxDate:"1y"
    }); 
  });
</script>
        <style>
            body{
                background-image: url("images/makbg.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                position: fixed;
            }
            .mcard {
                /* From https://css.glass */
                    background: rgb(161 164 25 / 20%);
                    border-radius: 16px;
                    box-shadow: 0 4px 30px rgb(0 0 0);
                    backdrop-filter: blur(7.7px);
                    -webkit-backdrop-filter: blur(7.7px);
                    border: 1px solid rgba(0, 0, 0, 0.31);
                    margin-left: 744px;
                    height: 518px;
                    margin-top: 100px;
                    width: 661px;
            }
            .tptable{   
            height: 448px;
            margin-top: 39px;
            }
            td{
                color: black;
                font-family: 'Courier New', Courier, monospace;
             padding-left: 98px;
             font-weight: 600;
            }
            th{
                color: black;
                font-family: 'Courier New', Courier, monospace;
             padding-left: 25px;
             font-weight: 1000;
             font-size: large;
            }
            .error{
                color: red;
                font-size: 11px;
                margin-left: -5px;
                margin-top: 4px;
            }
            </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>     
            <body>
                <section class="mcard">
                    <form id="maketrip" method="POST">
        <table class="tptable">
            <tr><th colspan="2"><center>Make Trip</center></th></tr>
        <tr><td>Destination</td><td><select class="form-select" id="dest" name="dest" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"><option selected disabled hidden value="">Choose Country</option>
        <option value="Brazil">Brazil</option>
        <option value="China">China</option>
        <option value="India">India</option>
        <option value="Switzerland">Switzerland</option>
        <option value="UK">UK</option>
        <option value="USA">USA</option></select></td></tr>
        <tr><td>Budget</td><td><select class="form-select" id="budget" name="budget" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"><option selected disabled hidden value="">Select Budget</option>
        <option value="First Class ">First Class</option>
        <option value="Business">Business</option>
        <option value="Budget">Budget</option>
        <option value="BackPacking">BackPacking</option></select></td></tr>
        <tr><td>Trip Begining</td><td><input type="text" class="form-control" name="tripbeg" id="tripbeg" placeholder="Select Begining Date" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"></td></tr>
        <tr><td>Trip Ending</td><td><input type="text" class="form-control" name="tripend" id="tripend" placeholder="Select Ending Date" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000"></td></tr>
        <tr><td>Trip Type</td><td><input type="radio"class="form-check-input mt-0" id="triptypec" value="Companion" name="triptype" style="border: var(--bs-border-width) solid #000000">: <label>Companion</label>
        <input type="radio"class="form-check-input mt-0" id="triptypeg" name="triptype" value="Group" style="border: var(--bs-border-width) solid #000000">: <label>Group</label>
    </td></tr>
    <tr><td id="groupnumdis" hidden="hidden">Count of Members</td><td><select class="form-select" id="groupnum" name="groupnum" style=" width: 310px;height: 32px;border: var(--bs-border-width) solid #000000" disabled="disabled" hidden="hidden"><option selected disabled hidden value="">Select Count</option>
        <option value="3">3</option>
        <option value="4">4</option></select></td></tr>
        <tr><td colspan="1"><button type="submit" name="submit" class="btn btn-outline-light">Submit</button></td>
        </table>
        </section>
      </form>
    </div>
  </div>
</div>
    </body>
    <?php
    if(isset($_POST["submit"])){
        $dest=$_POST["dest"];
        $budget=$_POST["budget"];
        $tripbeg=$_POST["tripbeg"];
        $tripend=$_POST["tripend"];
        $triptype=$_POST["triptype"];
        if($triptype=="Group"){
            $groupnum=$_POST["groupnum"];
        }
        else{
          $groupnum=2;  
        }
        include("connection.php");
        $query="insert into tbl_availtrip(user_id,maker_name,Destination,trip_beg,trip_end,trip_type,count_mem,budget,maker_img)values('$id','$name','$dest','$tripbeg','$tripend','$triptype','$groupnum','$budget','$photo')";
        $insert=mysqli_query($con,$query);
        if($insert){
            ?>
            <script>
              window.location.href="successmsg.php";
            </script>
            <?php
        }
    }
    ?>
</html>
<?php
}
}?>