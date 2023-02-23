<?php 
 include "connection.php";
include "navbar.php";

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student information</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 	<style type="text/css">
 		
 		.srch{
 			padding-left: 1000px;
 		}

body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
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
   
 	</style>

 </head>
 <body>

 	<!--_________________________-search bar-__________-->

 	<div class="srch">
 		
 		<form class="navbar-form" method="post" name="form1">
 			<input class="form-control" type="text" name="search" placeholder="search Student's username.." required="">
 			<button style="background-color:red; " class="btn btn-default" type="submit" name="submit">
 				<span class="glyphicon glyphicon-search"></span>

 			</button>
 		
 		</form>

 	</div>
 
 	<h2>List of Students</h2>

 	<?php

 		if(isset($_POST['submit'])){

 			$q='mysqli_query($db,"SELECT first,last,username,roll,email,contact from student where username like '%$_POST['search']%';")';
 			if(mysqli_num_rows($q==0))
 			{
 				echo "Sorry!!!  no Student faound. TRY AGAIN...";
 			}
 			else{
 				echo "<table class='table table-border table-hover'>";
 	echo "<tr style='background-color:red;'>";

 		echo "<th>";  echo "First name";    echo"</th>";
 		echo "<th>";  echo "Last name";   echo "</th>";
	    echo "<th>";  echo "User name";   echo "</th>";	
	    echo "<th>";  echo "Roll";   echo "</th>";
	    echo "<th>";  echo "Email";   echo "</th>";
	    echo "<th>";  echo "Contact";   echo "</th>";
	  

	  echo "</tr>";

	  while ($row=mysqli_fetch_assoc($q))
	  {

	  	echo "<tr>";
	  	echo "<th>";  echo "First name";    echo"</th>";
 		echo "<th>";  echo "Last name";   echo "</th>";
	    echo "<th>";  echo "User name";   echo "</th>";	
	    echo "<th>";  echo "Roll";   echo "</th>";
	    echo "<th>";  echo "Email";   echo "</th>";
	    echo "<th>";  echo "Contact";   echo "</th>";
	  
	  	echo "</tr>";
	  }
	  echo "</table>";

 			}

 		}

 		/* if button is not pressed*/

 		else{
 			$res=mysqli_query($db,"SELECT first,last,username,roll,email,contact from student ;"); 
 	echo "<table class='table table-border table-hover'>";
 	echo "<tr style='background-color:red;'>";

 		echo "<th>";  echo "First name";    echo"</th>";
 		echo "<th>";  echo "Last name";   echo "</th>";
	    echo "<th>";  echo "User name";   echo "</th>";	
	    echo "<th>";  echo "Roll";   echo "</th>";
	    echo "<th>";  echo "Email";   echo "</th>";
	    echo "<th>";  echo "Contact";   echo "</th>";

	  while ($row=mysqli_fetch_assoc($res))
	  {

	  	echo "<tr>";
	  	echo "<td>"; echo $row['first']; echo "</td>";
	  	echo "<td>"; echo $row['last']; echo "</td>";
	  	echo "<td>"; echo $row['username']; echo "</td>";
	  	echo "<td>"; echo $row['roll']; echo "</td>";
	  	echo "<td>"; echo $row['email']; echo "</td>";
	  	echo "<td>"; echo $row['contact']; echo "</td>"; 

	  	echo "</tr>";
	  }
	  echo "</table>";

 		}


 	?>
 </body>
 </html>