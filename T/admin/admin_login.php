<?php

	include "navbar.php";
	include "connection.php";

?>





<!DOCTYPE html>
<html>
<head>
	<title>Student login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--
<style type="text/css">
	
	nav{
	float:right;
	word-spacing: 20px;
	padding: 20px;
}
nav li{
	display: inline-block;
	line-height:80px; 
}
</style>-->
</head>
<body>
	<header>
		<!--<div class="logo">
				
			<img style="height: 60px;width:60px;padding-left: 80px; padding-top: 20px" src="images/9.jpg">
			<h1 style="color: white;">Online Library Management System</h1>
			</div>--><!--   logo-->
<!--
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="books.php">Books</a></li>
					<li><a href="feedback.php">Feedback</a></li>

					<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in">Login</span></a></li>
					<li><a href="student_login.php"><span class=" glyphicon glyphicon-log-out">Logout</span></a></li>
					<li><a href="registration.php"> <span class="glyphicon glyphicon-user">SignUp</span></a></li>
				</ul> 
			</nav>
		-->
	</header>
	<section class="section2">
		
		<div class="box_student_login">
			<h1 style="text-align: center; font-size: 35px; color: white;">Library Management System</h1>
			<h1 style="text-align: center; font-size: 25px; color: white;">User login Form</h1>
				
			<form name="login" action="" method="post">
				<div class="form_details">
					
					<input class="form-control" type="text" name="username" placeholder="username" required=""><br>
					<input class="form-control" type="password" name="password" placeholder="password" required="">
					<br>
					<button type="submit" class="btn btn-default" name="submit">Login</button>

				</div><!--form details---->
			</form>
			<p style="padding-left: 15px;color: white;">
				<br><br>
				<a href="update_password.php"style="color: yellow; text-decoration: none;">Forgot Password</a>
				<br><br>
				New this websites? &nbsp &nbsp<a style="color: yellow; text-decoration: none;" href="registration.html">sign up</a>
			</p>
		</div><!-- box student login---->
	</section>

	<?php

			
		if(isset($_POST['submit']))
		{
				$count=0;	
			$res=mysqli_query($db,"SELECT * FROM `admin` where username='$_POST[username]' && password= '$_POST[password]';");

			$row=mysqli_fetch_assoc($res);

			$count=mysqli_num_rows($res);
		
			if($count==0){
			?>
				<!--<script type="text/javascript">
					
					alert("username and password does not match");
				</script> -->
				<div class="alert alert-danger" style="width: 700px; margin-left: 300px;">
					<strong> username and password does not match</strong>
				</div>

			<?php
		}

		else{

			/* -------- if username & password matches---*/

			$_SESSION['login_user']=$_POST['username'];
			$_SESSION['pic']=$row['pic'];
		?>

		<script type="text/javascript">
			window.location="index.php";
		</script>
		<?php
	}
	}

	?>
	
</body>
</html>