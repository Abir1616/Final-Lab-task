<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
</head>
<body>
<?php
  require('db.php');
  session_start();
  if(isset($_POST['username']){
  	$username = stripcslashes($_REQUEST['username']);
  	$username = mysqli_real_escape_string($con,$username);
  	$password = stripcslashes($_REQUEST['password']);
  	$password = mysqli_real_escape_string($con,$password);
  	$query = "SELECT * FROM 'users' where username ='$username' and password = '" .md5(password)  ."'";
  	result = mysqli_query($con,$query) or die(mysql_error());
  	$rows = mysqli_num_rows($result);
  	if($rows ==1){
  		$_SESSION['username'] = $username;
  		header("Location: dashboard.php");

  	}
  	else{
  		echo"<div class ='form'>
  		<h3>Incorrect username/password.</h3> <br/>
  		<p class ='link'>click here to<a href='login.php'>Login</a> again</p>
  		</div>";  
  		}
  }else{
  	?>
  	<form class="form" method ="post" name="login">
  		<h1 class ="Login-title">Login</h1>
  		<input type="text" class = "Login-input" name="username"placeholder="Username" autofocus="true"/>
  		<input type="password" class = "Login-input" name="password"placeholder="Password"/>
  		<input type="submit" value= "Login" name="Submit"class = "Login-button"  />
  		<p class ="link"><a href "registration.php">New Registration</a></p>

  	</form>
 
  }

</body>
</html>


