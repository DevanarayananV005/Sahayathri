<?php
session_start();
 $con=mysqli_connect("localhost","root","","mini_project");
 $query="select * from tbl_user";
 $insert=mysqli_query($con,$query);
 $username2=$_SESSION['uname'];
?>
<!DOCTYPE html>
<?php
 if($username2!=null){
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="adminhub-master/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script>
function enlargePhoto(src) {
  var img = document.getElementById('enlarged-photo').getElementsByTagName('img')[0];
  img.src = src;
  img.style.width = '400px';
  img.style.height = '400px';

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('enlarged-photo').style.display = 'block';
    }
  };
  xhttp.open("GET", src, true);
  xhttp.send();
}
    </script>
    <style>
      body{
        position: relative;
      }
      section{
        position: relative;
      }
    </style>
	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#content">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#test">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
  <section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<button type="submit" class="search-btn" hidden><i class='bx bx-search' hidden></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Users</h3>
					</div>
					<table>
						<thead>
							<tr>
                                <th></th>
								<th>Name</th>
								<th>Email</th>
								<th>Photo</th>
                                <th>Id proof</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
                        <?php while($row=mysqli_fetch_array($insert)){
              $_session['id']=$row['user_id'];
              ?>
							<tr>
                            <td align="center">
                                <div class="dropdown">
                                <li class="fa fa-plus-square" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </li>
                                 <table class="dropdown-menu" style="width: 212px;">
                                    <tr><td align="center">Phone:</td><td align="center"><?php echo $row['phone'] ?></td></tr>
                                    <tr><td align="center">D.O.B:</td><td align="center"><?php echo $row['dob'] ?></td></tr>
                                    <tr><td align="center">Username:</td><td align="center"><?php echo $row['username'] ?></td></tr>
                                    <tr><td align="center">Password:</td><td align="center" style="color: transparent;text-shadow: 0 0 8px #000;"><?php echo $row['password'] ?></td></tr>
                                </table>
                                </div>
                            </td>
								<td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><img src="upload/<?php echo $row['photo']?>" onclick="enlargePhoto(this.src)" style="height:50px;width:50px;" data-bs-toggle="modal" data-bs-target="#exampleModal"/></td>
								<td><a href="upload/<?php echo $row['identity']?>">Id Proof</a></td>
                                <?php
                                        if($row['status']==1){
                                            ?>
                                            <td align="center"><button type="button" class="btn btn-success"><?php echo "<a href='userstatus.php?id=$row[user_id]' style='color: white;text-decoration: none;'>Active</a>"?></button></td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <td align="center"><button type="button" class="btn btn-danger"><?php echo "<a href='userstatus.php?id=$row[user_id]' style='color: white;text-decoration: none;'>Deactive</a>"?></button></td>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                        <?php }?>
                                        </div>
                                        </table>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                <div class="modal-body" id="enlarged-photo" style="display:none">
                                        <img src="">
                                </div>
                                </div>
                            </div>
                            </div>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
    <section id="test">
				<img src="test/1144153.jpg">
</section>
	

	<script src="adminhub-master/script.js"></script>
</body>
</html>
<?php
}
else{
	?>
<script>window.location.href='main.php';</script>
<?php
}
?>
