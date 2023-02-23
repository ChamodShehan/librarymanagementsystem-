<?php 
 include "connection.php";
include "navbar.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>approvwRequest</title>
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
.Approve{
  margin-left: 400px;
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

  <h3 style="text-align: center;">Approve Request</h3><br>

  <form class="Approve" action="" method="post">

    <input type="text" class="form-control" name="approve" placeholder="Approve or not" required=""><br><br>
    <input type="text" class="form-control" name="issue" placeholder="Issue Date yyyy-mm-dd" required=""><br><br>
    <input type="text" class="form-control" name="return" placeholder="Return Daye yyyy-mm-dd"><br><br>
    <button class="btn btn-default" type="submit" name="submit">Approve</button>

  </form>
  
</div>

<?php 
  
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE issue_book SET approve='$_POST[approve]',issue='$_POST[issue]',return='$_POST[return]' WHERE username='$SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity=quantity-1 where bid='$_SESSION[bid]';");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");


    while($row=mysqli_fetch_asscoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php";
      </script>
    <?php


  }

 ?>

</body>
</html>