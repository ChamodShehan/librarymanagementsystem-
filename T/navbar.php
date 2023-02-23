<?php 

	session_start();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
		<nav class="navbar navbar-inverse"> 
				<div class="container-fluid">
					 <div class="navbar-header">
						<a class="navbar-brand active">
						Online Library Management System
							
						</a>
					</div><!--   logo
					 -->
					<ul class="nav navbar-nav"> 
						<li><a href="index.php">Home</a></li>
						<li><a href="books.php">Books</a></li>
						<li><a href="feedback.php">Feedback</a></li>
					</ul>

					<?php 
						if(isset($_SESSION['login_user']))
						{	?>
							<ul class="nav navbar-nav">
								<li><a href="profile.php">PROFILE</a></li>
							</ul>
							
							
							<ul class="nav navbar-nav navbar-right">
								<li><a href="">
									<div style="color: white;">

										<?php
											echo "<img class='img-cicle ' height=30 width=30 src='images/10.png'>";
											echo " ".$_SESSION['login_user'];
										?>	
																		
									</div>
								</a></li>


								<li><a href="logut.php"><span class=" glyphicon glyphicon-log-out">Logout</span></a></li>
							</ul>
							<?php
						}
						else{
							?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in">Login</span></a></li>
						<li><a href="registration.php"> <span class="glyphicon glyphicon-user">Sign Up</span></a></li>
					</ul>
						<?php
						}

					 ?>


				</div>
			</nav>
			

</body>
</html>