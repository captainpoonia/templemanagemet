
<html>
<head>
	<title>pooja booking</title>
	<link rel="stylesheet" type="text/css" href="pooja_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style >
	body{
			background-color: #d5faaa; 
}
#tableid {

  border-collapse: collapse;
  width: 50%;
}

#tableid td, #tableid th {
  border: 1px solid black;
  padding: 8px;
}

#tableid tr{background-color: #f2f2f2; color: black;text-align: center; font-size: 22px;}


#tableid th {
  padding-top: 12px;
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
			<li><a href="../home.php"> Home</a></li>
			
			<li><a href="">Schedules</a>
			     <ul>
				   <li><a href="pooja.php">Pooja</a></li>
				   <li><a href="darshan.php">Darshan</a></li>
			     </ul>
			</li>
			<li><a href="../booking/pooja.php"> Booking </a></li>
			
			<li style="padding-left: 4px;"> <a href="contactus.html"> Contact Us</a></li>
			<li align="right"> <a href="../admin/customer_logout.php"> Log Out</a></li>
		</ul>   
	</div>
<div id="div6"  align="center" style="background-color: #d5faaa; font-size: 30px;">
	<h3 style="margin-top: 40px; ">Pooja Schedule</h3>
<table id="tableid">
<tr style="background-color:  #c4911a"><th>pooja</th><th>date</th><th>time</th></tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temple";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pooja_name,pooja_date,pooja_time FROM pooja where pooja_id NOT IN (select pooja_id from booking ) ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["pooja_name"]."</td><td>". $row["pooja_date"]. "</td><td> " . $row["pooja_time"] . "</td></tr>";
    }
} 

$conn->close();
?>
	</table>
		<a href="../booking/pooja.php" style="margin:40px  40px 40px 100px;	background-color: orange;display: block;width: 120px;font-size:20px;text-decoration: none;	border :none;radius:5px;color:black;">Book Pooja</a>
  	</div>
<div id="foot">
	<table>
		<tr><th>Quick links</th></tr>
		<tr><td><a href="../home.php">Home</td></tr>
		<tr><td><a href="pooja.php">Pooja Schedule</a></td></tr>
		<tr><td><a href="darshan.php">Darshan Schedule</a></td></tr>
		<tr><td><a href="../booking/pooja.php">Booking</a></td></tr>
			<tr><td><a href="../specialday.php">Special Days</a></td></tr>

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