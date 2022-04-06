<?php
/*Initialize the section*/
session_start();

/*Check if the user is already logged in, if yes then redirect him to welcome page*/
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header("location:http://localhost/web_project/temple/admin_home.php");
	exit;
}

/*Include config file*/
require_once "config.php";

/*Define variables and initialize with empty value*/
$temple_name = $password = "";
$temple_name_err = $password_err = "";

/*Processing form when form is submitted*/
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

	/*Check if temple name is empty*/
	$temp = trim($_POST["temple_name"]);
	if(empty($temp)){
		$temple_name_err = "Please enter phone number.";
	}else{
		$temple_name = $temp;
	}

	/*Check if password is empty*/
	$temp = trim($_POST["password"]);
	if(empty($temp)){
		$password_err = "Please enter a password.";
	}else{
		$password = $temp;
	}

	/*Validate credentials from database*/
	if(empty($temple_name_err) && empty($password_err)){
		/*Prepare a select statement*/
		$sql = "SELECT cust_phno,cust_pass FROM customer WHERE cust_phno = ?";
		if($stmt = mysqli_prepare($con,$sql)){
			/*Bind the variables to prepared statement*/
			mysqli_stmt_bind_param($stmt,"s",$param_temple_name);
			$param_temple_name = $temple_name;

			/*Attempt to execute prepared statement*/
			if(mysqli_stmt_execute($stmt)){
				/*Store result*/
				mysqli_stmt_store_result($stmt);
				/*Check if temple_name exist, if yes then verify password*/
				if(mysqli_stmt_num_rows($stmt) == 1){
					/*Bind result variables*/
					mysqli_stmt_bind_result($stmt,$temple_name,$h_password);
					if(mysqli_stmt_fetch($stmt)){
						if(strcmp($password,$h_password)==0){
							/*password is correct start a new session*/
							session_start();
							/*Store data in session variables*/
							$_SESSION["loggedin"] = true;
							$_SESSION["cust_phno"] = $temple_name;
                             $_SESSION["user"] = "customer";
							/*Redirect to welcome page*/
							header("location: ../home.php");
						}else{
							$password_err = "The password you entered was not valid.";
						}
					}
				}else{
					$temple_name_err = "phone number does not exist.";
				}
			}else{
				echo "Something went wrong.Try again later.";
			}
		}
		/*Close statement*/
		mysqli_stmt_close($stmt);
	}
	/*Close connection*/
	mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../schedule/pooja_style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body  style="background-color:  #f2cc72;">
	<div id="div1">
		<img src="../header.jpg" style="position: relative; height: 110px; width: 100%">
		 <img src="../icon.png" style="position:absolute; top: 13px; left: 90px; height: 75px;">
	<span style=" position: absolute; top: 25px; left: 270px;">SHRI SALASAR BALAJI MANDIR</span>
    </div>
    <div class="wrapper" style="background-color: white; border: 1px solid black; border-radius: 10px; margin-top:100px;margin-left: 500px;">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($temple_name_err)) ? 'has-error' : ''; ?>">
                <label>phone number</label>
                <input type="text" name="temple_name" class="form-control" value="<?php echo $temple_name; ?>">
                <span class="help-block"><?php echo $temple_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
             <p>Don't have an account? <a href="customer_reg.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
