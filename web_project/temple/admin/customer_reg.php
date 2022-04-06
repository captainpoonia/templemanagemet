<?php
if(isset($_POST['submit']))
{
	$conn=new mysqli('localhost','root','','temple');

	$var1=$_POST['name'];
	$var2=$_POST['sex'];
	$var3=$_POST['address'];
	$var4=$_POST['phno'];
	$var5=$_POST['password'];
	$sql="insert into customer(cust_name, sex, cust_phno, cust_add, cust_pass) values('$var1','$var2','$var4','$var3','$var5')";
	$res=$conn->query($sql);
	header("location:customer_login.php");
}
?>
<html>
<head>
	<title>pooja booking</title>
	<link rel="stylesheet" type="text/css" href="../schedule/pooja_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
</head>
<body>
	<div id="div1">
		<img src="../header.jpg" style="position: relative; height: 110px; width: 100%">
		 <img src="../icon.png" style="position:absolute; top: 13px; left: 90px; height: 75px;">
	<span style=" position: absolute; top: 25px; left: 270px;">SHRI SALASAR BALAJI MANDIR</span>
    </div>
		
<div id="div6"  >
	
<form action="#" method="post" style="background-color:  #d5faaa;">
	    <div align="center" >
    	<h3 style="font-size: 40px; margin-bottom: 0px; ">Enter Details</h3><table id="tableid"> 
      <tr><th>Name </th> <td><input type="text" name="name" placeholder="" ></td></tr>
	  <tr><th>Sex  </th> <td><input type="text" name="sex" placeholder="" style="height: 45px; width: 100%;"></td></tr>
	  <tr><th>Address </th><td> <input type="text" name="address" placeholder="" style="height: 45px; width: 100%;"></td></tr>
	  <tr><th>Phone No </th> <td><input type="text" name="phno" placeholder="" style="height: 45px; width: 100%;"></td></tr>
	  <tr><th>Password </th><td> <input type="text" name="password" placeholder="" style="height: 45px; width: 100%;"> </td></tr>
	  <tr><td colspan="2" align="center"><input type="submit" name="submit" style="height: 45px; width: 100%; font-size: 30px"></td></tr></table>
    </div>
</form>
</div>
		<!--a href="book_pooja.php" id="a123">Book Pooja</a-->

</body>
</html>