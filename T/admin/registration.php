<?php
	
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin Registration </title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
		
			<!--	
			<nav class="navbar navbar-inverse"> 
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand active">
						Online Library Management System
							
						</a>
					</div>--><!--   logo-->
					<!--
					<ul class="nav navbar-nav"> 
						<li><a href="index.html">Home</a></li>
						<li><a href="">Books</a></li>
						<li><a href="">Feedback</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="student_login.html">Student-login</a></li>
						<li><a href="registration.html ">Registration</a></li>
					</ul>
				</div>
			</nav>
		-->
			

			

	<section class="section3">
		
		<div class="box_student_login">
			<h1 style="text-align: center; font-size: 25px; color: white;">Library Management System</h1>
			<h1 style="text-align: center; font-size: 20px; color: white;">User registration Form</h1>
				<br>
			<form name="registration" action="" method="post">
				<div class="form_details">
					<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
					<input class="form-control" type="text" name="username" placeholder="username" required=""><br>
					<input class="form-control" type="password" name="password" placeholder="password" required="">
					<br>
					<input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
					<input class="form-control" type="text" name="contact" placeholder="Phone Number" required=""> <br>
					<button type="submit" class="btn btn-default" name="submit">Sign Up</button>

				</div><!--form details---->
			</form>
			
		</div><!-- box student login---->
	</section>

	<?php

	if(isset($_POST['submit']))
	{

		$count=0;
		$sql="SELECT username from admin";
		$rel=mysqli_query($db,$sql);

		while($row=mysqli_fetch_assoc($rel))
		{
			if($row['username']==$_POST['username']) 
			{
				$count=$count+1;
			}
		}

		if($count==0){

		mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','10.png');");


		?>
			<script type="text/javascript">
		
			alert("registration successfully");
			</script>
		<?php
	}


else{
?>
	<script type="text/javascript">
		
	alert("The username already exist");
	</script>		<?php
}
}
	?>




</body>
</html>