<?php
session_start();
if(isset($_POST['book_pooja']))
{
	$conn=new mysqli('localhost','root','','temple');
	$var2=$_POST['book_date'];
	$var3=$_POST['book_time'];
	$sql2 = "SELECT pooja_id FROM pooja where pooja_date ='$var2' and pooja_time='$var3' and  pooja_id NOT IN (select pooja_id from booking )";

	$result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $var4=$row["pooja_id"];
    $var6=$_SESSION["cust_phno"];
        $sql4= "SELECT cust_id FROM customer where cust_phno='$var6'";
$result2 = $conn->query($sql4);
$row3= $result2->fetch_assoc();
$var5=$row3['cust_id'];
    $sql3= "SELECT * FROM booking where pooja_id='$var4'";
$result1 = $conn->query($sql3);
$row2= $result1->fetch_assoc();
if ($result1->num_rows > 0 ) 
	{   //script popup message ->already booked 
		echo $var4."<script type = text/javascript>alert('Already Booked')</script>";
}
else
{

	$sql="insert into booking values('$var4','$var5')";
	$res=$conn->query($sql);
	//script ->booking done
	echo "<script type = text/javascript>alert('Booking Done ')</script>";
  }
}
?>
<html>
<head>
	<title>pooja booking</title>
	<link rel="stylesheet" type="text/css" href="pooja_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
   <style>
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
	<div id="div3" class="fixed" style="background-color:orange; ">
		<ul>
			<?php
			if($_SESSION["user"]=="admin")
			{    ?>
				<li style="padding-left:4px;"><a href="../admin_home.php">Home</a></li>
				<?php
			}
			
			else{
				?>
			<li><a href="../home.php"> Home</a></li>
			<?php
		}
			?>
			<li><a href="">Schedules</a>
			     <ul>
				   <li><a href="../schedule/pooja.php">Pooja</a></li>
				   <li><a href="../schedule/darshan.php">Darshan</a></li>
			     </ul>
			</li>
			<li><a href="pooja.php"> Booking </a></li>
			<?php
			if($_SESSION["user"]=="admin")
			{    ?>
				<li style="padding-left:4px;"><a href="../admin/admin_con.php">Admin</a></li>
				<?php
			}
			?>
			<li style="padding-left: 4px;"> <a href="#"> Contact Us</a></li>
			<li align="right"> <a href="../admin/customer_logout.php"> Log Out</a></li>
		</ul>   
	</div>
<div id="div6" style="background-color: #d5faaa" >
	<h3 style="margin-top: 40px; font-size: 40px" align="center">Available Pooja Schedule</h3>
<table id="tableid" align="center">
<tr style="	background-color:  #c4911a;
	color: black;"><th>pooja</th><th>date</th><th>time</th></tr>
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
</div>
		<div id="book" align="center">
			<h3 style="margin: 5px; font-size: 30px;">Book pooja:</h3>
			<form action="#" method="post">
			<table >
				<tr ><th style="color: black;">Enter Date</th><td><input type="date" name="book_date"></td></tr>
				<tr ><th style="color: black;">Enter Time</th><td><input type="time" name="book_time"></td></tr>
				<tr ><td style="color: black;"></td><td ><input type="submit" name="book_pooja" value="BOOK"></td></tr>
			</table> </form>
		</div>
  	
<div id="foot">
	<table>
		<tr><th>Quick links</th></tr>
		<tr><td><a href="../home.php">Home</td></tr>
		<tr><td><a href="../schedule/pooja.php">Pooja Schedule</a></td></tr>
		<tr><td><a href="../schedule/darshan.php">Darshan Schedule</a></td></tr>
		<tr><td><a href="pooja.php">Booking</a></td></tr>
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