<?php 
 include "connection.php";
include "navbar.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Books</title>

 	<style type="text/css">
 		
 		.srch{
 			padding-left: 1000px;
 		}

 	</style>

 </head>
 <body>

 	<!--_________________________-search bar-__________-->

 	<div class="srch">
 		
 		<form class="navbar-form" method="post" name="form1">
 			<input class="form-control" type="text" name="search" placeholder="search books...">
 			<button style="background-color:red; " class="btn btn-default" type="submit" name="submit">
 				<span class="glyphicon glyphicon-search"></span>

 			</button>
 		
 		</form>

 	</div>
 
 	<h2>List of Books</h2>

 	<?php

 		if(isset($_POST['submit'])){
 			$name=$_POST['search'];
 			$q=mysqli_query($db,"SELECT * from books where name like '%$name%';");
 			echo (mysqli_num_rows($q));
 			if(mysqli_num_rows($q)==0)
 			{
 				echo "Sorry!!!  no books faound. TRY AGAIN...";
 			}
 			else{
 				echo "<table class='table table-border table-hover'>";
 	echo "<tr style='background-color:red;'>";

 		echo "<th>";  echo "ID";    echo"</th>";
 		echo "<th>";  echo "Book-name";   echo "</th>";
	    echo "<th>";  echo "Authors Name";   echo "</th>";	
	    echo "<th>";  echo "Edition";   echo "</th>";
	    echo "<th>";  echo "Status";   echo "</th>";
	    echo "<th>";  echo "Quantity";   echo "</th>";
	    echo "<th>";  echo "Department";   echo "</th>";

	  echo "</tr>";

	  while ($row=mysqli_fetch_assoc($q))
	  {

	  	echo "<tr>";
	  	echo "<td>"; echo $row['bid']; echo "</td>";
	  	echo "<td>"; echo $row['name']; echo "</td>";
	  	echo "<td>"; echo $row['authors']; echo "</td>";
	  	echo "<td>"; echo $row['edition']; echo "</td>";
	  	echo "<td>"; echo $row['status']; echo "</td>";
	  	echo "<td>"; echo $row['quantity']; echo "</td>";
	  	echo "<td>"; echo $row['department']; echo "</td>"; 

	  	echo "</tr>";
	  }
	  echo "</table>";

 			}

 		}

 		/* if button is not pressed*/

 		else{
 			$res=mysqli_query($db,"SELECT * FROM `books`;"); 
 	echo "<table class='table table-border table-hover'>";
 	echo "<tr style='background-color:red;'>";

 		echo "<th>";  echo "ID";    echo"</th>";
 		echo "<th>";  echo "Book-name";   echo "</th>";
	    echo "<th>";  echo "Authors Name";   echo "</th>";	
	    echo "<th>";  echo "Edition";   echo "</th>";
	    echo "<th>";  echo "Status";   echo "</th>";
	    echo "<th>";  echo "Quantity";   echo "</th>";
	    echo "<th>";  echo "Department";   echo "</th>";

	  echo "</tr>";

	  while ($row=mysqli_fetch_assoc($res))
	  {

	  	echo "<tr>";
	  	echo "<td>"; echo $row['bid']; echo "</td>";
	  	echo "<td>"; echo $row['name']; echo "</td>";
	  	echo "<td>"; echo $row['authors']; echo "</td>";
	  	echo "<td>"; echo $row['edition']; echo "</td>";
	  	echo "<td>"; echo $row['status']; echo "</td>";
	  	echo "<td>"; echo $row['quantity']; echo "</td>";
	  	echo "<td>"; echo $row['department']; echo "</td>"; 

	  	echo "</tr>";
	  }
	  echo "</table>";

 		}


 	?>
 </body>
 </html>