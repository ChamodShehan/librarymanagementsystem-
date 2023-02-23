<?php 
  
  session_start();

   ?>


<!DOCTYPE html>
<html>
<head>
	<title> Inline Library System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	</style>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
</head>
<body>

	<div class="wrapper">
		
		<header>
			<div class="logo">
				
			<img style="height: 60px;width:60px;padding-left: 80px; padding-top: 20px" src="images/9.jpg">
			<h1 style="color: white;">Online Library Management System</h1>
			</div><!--   logo-->

			<?php 

				if(isset($_SESSION['login_user']))
				{
					?>
						<nav>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="books.php">Books</a></li>
								<li><a href="logut.php ">Logout</a></li>
					
								<li><a href="feedback.php">Feedback</a></li>
							</ul>
						</nav>
			<?php
				}
			else
			{
			?>
				<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="books.php">Books</a></li>
					<li><a href="student_login.php ">Student-login</a></li>
					
					<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</nav>

			<?php

			}
				?>

		</header>
		
		<section class="section1">
			<br>
			<br>
			<br>
			<br>
			<div class="box" >
				<br>
				<br>
				<br>
				<br>
				<h1 style="text-align: center;font-size: 30px">Welcomes to Library</h1><br>
				<h1 style="text-align: center;font-size:20px ">Opens at 9.00</h1><br>
				<h1 style="text-align: center;font-size:20px ">Closes at 15.00</h1>
				
			</div>
		
			</div>
		</section>

		
	</div><!--wrapper-->

<?php 

	include "footer.php";

 ?>


</body>
</html>