<?php
if(isset($_POST['submit']))
{
	$conn=new mysqli('localhost','root','','temple');
	$var1=$_POST['pooja_name'];
	$var2=$_POST['date'];
	$var3=$_POST['time'];
	$sql="insert into pooja(pooja_name,pooja_date,pooja_time) values('$var1','$var2','$var3')";
	$res=$conn->query($sql);
}
?>
<html>
<head>
	<title>pooja booking</title>
	<link rel="stylesheet" type="text/css" href="../schedule/pooja_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<style >
	body{
	background-color: #d5faaa;
}
		#tableid {
margin-top:10px;
  border-collapse: collapse;
  width: 50%;
}

#tableid td, #tableid th {
  border: 1px solid black;
  padding: 8px;
}
#tableid td{
  padding: 0px;
}
#tableid td input{
	height: 45px; width: 100%; font-size: 30px;
}

#tableid tr{background-color: #f2f2f2; color: black;text-align: center; font-size: 22px;}


#tableid th {
  padding-top: 8px;
  padding-bottom: 12px;
  text-align: center;
  background-color: orange;
  color: black;
}
</style>
<body>
	<div id="div1">
		<img src="../header.jpg" style="position: relative; height: 110px; width: 100%">
		 <img src="../icon.png" style="position:absolute; top: 13px; left: 90px; height: 75px;">
	<span style=" position: absolute; top: 25px; left: 270px;">SHRI SALASAR BALAJI MANDIR</span>
    </div>
	<div id="div3" class="fixed" style="background-color: orange;">
		<ul>
			<li><a href="http://localhost/web_project/temple/admin_home.php"> Home</a></li>
			<li><a href="">Schedules</a>
			     <ul>
				   <li><a href="http://localhost/web_project/temple/schedule/pooja.php">Pooja</a></li>
				   <li><a href="http://localhost/web_project/temple/schedule/darshan.php">Darshan</a></li>
			     </ul>
			</li>
			<li><a href="http://localhost/web_project/temple/booking/pooja.php"> Booking </a></li>
			<li style="padding-right: 4px;"> <a href="http://localhost/web_project/temple/specialday.php"> Special Day </a></li>
			<li style="padding-left: 4px;"> <a href="http://localhost/web_project/temple/admin/admin_con.php"> Admin </a></li>
			<li align="right"> <a href="customer_logout.php"> Log Out</a></li>
		</ul>   
	</div>
<div id="div6" align="center" style="margin-top: 40px; background-color: #d5faaa ">
	<h3 style="font-size: 40px;">Enter Pooja Schedule</h3>
<form action="#" method="post">
    <table id="tableid">
     <tr><th> Pooja Name </th><td><input type="text" name="pooja_name" placeholder=""></td></tr>
	   <tr><th>Date</th> <td><input type="date" name="date" ></td></tr>
	  <tr><th>Time </th> <td><input type="time" name="time" ></td></tr>
	  <tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>
</table>
</form></div>
		<!--a href="book_pooja.php" id="a123">Book Pooja</a-->
<div id="foot">
	<table>
	<tr><th>Quick links</th></tr>
		<tr><td><a href="http://localhost/web_project/temple/admin_home.php">Home</td></tr>
		<tr><td><a href="http://localhost/web_project/temple/schedule/pooja.php">Pooja Schedule</a></td></tr>
		<tr><td><a href="http://localhost/web_project/temple/schedule/darshan.php">Darshan Schedule</a></td></tr>
		<tr><td><a href="http://localhost/web_project/temple/booking/pooja.php">Booking</a></td></tr>

				<tr><td><a href="http://localhost/web_project/temple/specialday.php">Special Days</a></td></tr>

	</table><div style="background-color: #8f2606;"><a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
</div></div>
	<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("div3");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>