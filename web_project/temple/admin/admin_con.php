
<html>
<head>
	<title>admin Controls</title>
	<link rel="stylesheet" type="text/css" href="../home_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    	

body{
	background-color: #d5faaa;
}

#div6  a{
	display: block;
	text-decoration: none;
	background-color: orange;
	color: black;
	text-align: center;
 padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
font-size: 30px;
margin: 20px;

}
#div6 a:hover{
     background-color:  #4d2600;
	color: white;
}
	}
	</style>



</head>
<body>

	<div id="div1">
		<img src="../header.jpg" style="position: relative; height: 110px; width: 100%">
		 <img src="../icon.png" style="position:absolute; top: 13px; left: 90px; height: 75px;">
	<span style=" position: absolute; top: 25px; left: 270px;">SHRI SALASAR BALAJI MANDIR</span>
    </div>
	<div id="div3" class="fixed" style="background-color:orange;">
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
			<li align="right"> <a href="admin_logout.php"> Log Out</a></li>
		</ul>   
	</div>		
	
	
<div id="div6"  align ="center" style="margin: 80px;" >
	

	<a href="add_user.php">Add a User </a>

	 <a href="add_staff.php">Add a Staff</a><br>
	 <a href="customer_details.php">Show Users</a>
	 
	 <a href="staff_details.php">Show Staffs</a><br>
	 <a href="addpooja.php">Add Pooja time </a>

	 <a href="adddarshan.php">Add Darshan Time</a><br>

</div>		
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