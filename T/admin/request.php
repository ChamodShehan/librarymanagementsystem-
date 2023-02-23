<?php 
 include "connection.php";
include "navbar.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<style type="text/css">
 		
 		.srch{
 			padding-left: 1000px;
 		}
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  background-image: url("images/5.jpg");
  background-repeat: no-repeat;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.container
{
	height: 600px;
	background-color: black;
	opacity:.8;
	color: white;
}
.srch{
	padding-left: 850px;
}
.form-control{
	width: 300px;
	height: 40px;
	background-color: black;
	color: white;

}

 	</style>

</head>
<body>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="add.php">Add Books</a>
  
  <a href="request.php">Book Request</a>
  <a href="issue_info.php">Issue information</a>
</div>


<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

<div class="container">
	
	<div class="srch">
		<form action="request.php" method="post" name="form1">

			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder=" BID" required=""><br>
			
			<input class="btn btn-default" name="submit" type="submit" value="Submit">
		</form>
		
	</div>

<h3 style="text-align: center;">Request of Book</h3>
<?php 

	if(isset($_SESSION['login_user']))
	{
		$sql="SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='';";
		$res=mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
 			{
 				echo "<h2><b>";
 				echo "THERE IS NO PENDING REQUEST..";
 				echo "</h2></b>";
 			}
 			else{
 					echo "<table class='table table-border'>";
 	echo "<tr style='background-color:red;'>";

 		
 		echo "<th>";  echo "Student Username";   echo "</th>";
	    echo "<th>";  echo "Roll No";   echo "</th>";	
	    echo "<th>";  echo "BID";   echo "</th>";
	    echo "<th>";  echo "Book name";   echo "</th>";
	    echo "<th>";  echo "Authors name";   echo "</th>";
	    echo "<th>";  echo "Edition";   echo "</th>";
	    echo "<th>";  echo "Status";   echo "</th>";
	   

	  echo "</tr>";

	  while ($row=mysqli_fetch_assoc($res))
	  {

	  	echo "<tr>";
	  	echo "<td>"; echo $row['username']; echo "</td>";
	  	echo "<td>"; echo $row['roll']; echo "</td>";
	  	echo "<td>"; echo $row['bid']; echo "</td>";
	  	echo "<td>"; echo $row['name']; echo "</td>";
	  	echo "<td>"; echo $row['authors']; echo "</td>";
	  	echo "<td>"; echo $row['edition']; echo "</td>";
	  	echo "<td>"; echo $row['status']; echo "</td>";

	  	echo "</tr>";
	  
	  }
	  echo "</table>";

 			}
	}

	else{
		?>
			<h4 style="text-align: center; color: yellow;">
				
			
				You need to login to sea the reqeust...
			</h4>
			

		<?php
	}

	if(isset($_POST['submit'])){
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];
		?>
			<script type="text/javascript">
				window.location="approve.php";
			</script>
		<?php

	}

	/*
	if(isset($_SESSION['login_user'])){
 			
 			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]';");
 			
 			if(mysqli_num_rows($q)==0)
 			{
 				echo "<h2><b>";
 				echo "THERE IS NO REQUEST..";
 				echo "</h2></b>";
 			}
 			else{
 				echo "<table class='table table-border table-hover'>";
 	echo "<tr style='background-color:red;'>";

 		
 		echo "<th>";  echo "Book-iD";   echo "</th>";
	    echo "<th>";  echo "Approv Status";   echo "</th>";	
	    echo "<th>";  echo "Issue Date";   echo "</th>";
	    echo "<th>";  echo "Return Date";   echo "</th>";
	   

	  echo "</tr>";

	  while ($row=mysqli_fetch_assoc($q))
	  {

	  	echo "<tr>";
	  	echo "<td>"; echo $row['bid']; echo "</td>";
	  	echo "<td>"; echo $row['approve']; echo "</td>";
	  	echo "<td>"; echo $row['issue']; echo "</td>";
	  	echo "<td>"; echo $row['return']; echo "</td>";
	  	

	  	echo "</tr>";
	  
	  }
	  echo "</table>";

 			}

 		}
 		else{
 			echo "</br></br></br>";
 			echo "<h2><b>";
 			echo "Please login first.....";
 			echo "</h2></b>";
 		}


*/
 ?>
 </div>
</body>
</html>