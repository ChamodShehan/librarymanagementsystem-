<?php 

include "navbar.php";
include "connection.php";

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Feedbach</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
	
	body{

		background-image: url("images/8.jpg");
		background-repeat: no-repeat;
	}

	.wrapper{

		width: 900px;
		height: 600px;
		background-color: black;
		opacity: .8;
		color: white;
		padding: 10px;
		margin: -20px auto;
	}
	.form-control{
		height: 70px;
		width: 400px;
	}
</style>
 </head>
 <body>
 
 	<div class="wrapper">
 		<h4> If uou have any suggetion or quetion please comment</h4>

 		<form style="" action="" method="post">
 			<input class="form-control" type="text" name="comment" placeholder="Write something any thing......."> <br> <br>
 			<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width:100px; height: 35px;">
 			
 		</form>

 	</div>

 	<div>
 		
 		<?php 

 			if(isset($_POST['submit']))
 			{
 				$sql="INSERT INTO `comments` (comments) VALUES ('$_POST[comment]');";

 				if(mysqli_query($db,$sql)){
 					
 					$res=mysqli_query($db,'SELECT * FROM `comments` ORDER BY id DESC;');
 					echo "<table class='table table-border'>";

 					while($row=mysqli_fetch_assoc($res))
 					{

 						echo "<tr>";
 							echo "<td>";  echo $row['comments'];  echo "</td>";
 						echo "</tr>";

 					}
 				}

 
 			}
 			else{

 				$q='SELECT * FROM `comments` ORDER BY `id`DESC';

 					$res=mysqli_query($db,$q);
 					echo "<table class='table table-border'>";

 					while($row=mysqli_fetch_assoc($res))
 					{

 						echo "<tr>";
 							echo "<td>";  echo $row['comments'];  echo "</td>";
 						echo "</tr>";

 					}
 			}

 		 ?>
 	</div>

 </body>
 </html>