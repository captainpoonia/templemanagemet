<?php
session_start();
$var9=session_id();
if(isset($_POST['book_darshan']))
{
	$conn=new mysqli('localhost','root','','temple');
	$var2=$_POST['book_date'];
	$var3=$_POST['book_time'];
	$sql2 = "SELECT count(cust_id) as cust_no FROM virtual_q where dar_date ='$var2' and dar_time='$var3' group by dar_date,dar_time";
	$result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $var4=$row["cust_no"];
    //$sql3= "SELECT * FROM booking where pooja_id='$var4'";
//$result1 = $conn->query($sql3);
//$row2= $result->fetch_assoc();
if ($var4 > 50 ) 
	{   //script popup message ->already booked 
		echo "<script type = text/javascript>alert('Queue  is Full,try other schedule')</script>";
}
else
{

	$sql="insert into virtual_q values('$var9','$var2','$var3','$var4 + 1')";
	$res=$conn->query($sql);
	//script ->booking done
	echo "<script type = text/javascript>alert('Booking Done')</script>";
  }
}
?>
<html>
<head>
	<title>darshan schedule</title>
	<link rel="stylesheet" type="text/css" href="../booking/pooja_style.css">
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
  padding-top: 8px;
  padding-bottom: 12px;
  text-align: center;
  background-color: orange;
  color: black;
}
</style>
<body>

	</table>
</div>
	

	<div id="div1">
		<img src="../header.jpg" style="position: relative; height: 110px; width: 100%">
		 <img src="../icon.png" style="position:absolute; top: 13px; left: 90px; height: 75px;">
	<span style=" position: absolute; top: 25px; left: 270px;">SHRI SALASAR BALAJI MANDIR</span>
    </div>
	<div id="div3" class="fixed" style="background-color: orange;">
		<ul>
			<li><a href="../admin_home.php"> Home</a></li>
			
			<li><a href="">Schedules</a>
			     <ul>
				   <li><a href="admin_pooja.php">Pooja</a></li>
				   <li><a href="admin_darshan.php">Darshan</a></li>
			     </ul>
			</li>
			<li><a href="../booking/admin_pooja.php"> Booking </a></li>
			
			<li style="padding-left: 4px;"> <a href="contactus.html"> Contact Us</a></li>
			<li style="padding-left: 4px;"> <a href="http://localhost/web_project/temple/admin/admin_con.php"> Admin </a></li>
			<li align="right"> <a href="../admin/customer_logout.php"> Log Out</a></li>
		</ul>   
	</div>
<div id="div6" align="center" style="margin-top: 40px; font-size: 25px; background-color: #d5faaa " >
	<h3 style="font-size: 40px;">Darshan Schedule</h3>
<table id="tableid">
<tr style="background-color:  #c4911a;"><th>date</th><th>time</th></tr>
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

$sql = "SELECT dar_date,dar_time FROM darshan order by dar_date,dar_time";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["dar_date"]. "</td><td> " . $row["dar_time"] . "</td></tr>";
    }
} 

$conn->close();
?>
	</table>
</div>
			<div id="book" align="center">
			<h3 style="margin: 5px;">Book Darshan:</h3>
			<form action="#" method="post">
			<table >
				<tr ><th>Enter Date</th><td><input type="date" name="book_date"></td></tr>
				<tr ><th>Enter Time</th><td><input type="time" name="book_time"></td></tr>
				<tr ><td></td><td ><input type="submit" name="book_darshan" value="BOOK"></td></tr>
			</table> </form>
		</div>
  	
  	
<div id="foot">
	<table>
		<tr><th>Quick links</th></tr>
		<tr><td><a href="../admin_home.php">Home</td></tr>
		<tr><td><a href="admin_pooja.php">Pooja Schedule</a></td></tr>
		<tr><td><a href="admin_darshan.php">Darshan Schedule</a></td></tr>
		<tr><td><a href="../booking/admin_pooja.php">Booking</a></td></tr>
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