<?php 
	include "connection.php";
	include "navbar.php";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>

	<style type="text/css">
		
		body	{
			width: 100%;
			height: 650px;
			background-image: url("images/11.jpg");
			background-repeat: no-repeat;
			background-size:100%;
		}
.wrapper{

	width: 400px;
	height: 400px;
	background-color:black;
	margin: 100px auto;
	opacity: .8;
	color: white;
	padding: 20px 15px;
}

	</style>

</head>
<body>

	<div class="wrapper">
		
		<div style="text-align: center;">
			
			<h1 style="text-align: center;font-size: 35px;">Change password </h1>

		</div>

		<form action="" method="post">
			<input type="text" name="username" class="form-control" placeholder="username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit">Update</button>

		</form>
	</div>

<?php 

	if(isset($_POST['submit']))
	{
		if( mysqli_query($db, "UPDATE student SET password='$_POST[password]' where username='$_POST[username]' AND email='$_POST[email]';"))
		{
			?>
			<script type="text/javascript">
				alert("The Updated successfully")
			</script>
			<?php
		}

	}
	
 ?>

</body>
</html>