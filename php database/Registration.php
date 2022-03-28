<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);
        $gender = mysqli_real_escape_string($con, $gender);
        $dob = mysqli_real_escape_string($con, $dob);
        $rel = mysqli_real_escape_string($con, $rel);
        $padd = mysqli_real_escape_string($con, $padd);
        $pmadd = mysqli_real_escape_string($con, $pmadd);
        $link = mysqli_real_escape_string($con, $link);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
    
        $query    = "INSERT into `users` (fname, lname, gender, dob, rel, padd, pmadd, link, username, password, email)
                     VALUES ('$fmane', '$lname', '$gender', '$dob', ' $rel', '$padd', '$pmadd', '$link', '$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
          <fieldset>
    <legend><label>***Basic Information***</label></legend>
    <input type="text" class="login-input" name="fname" placeholder="First Name" required />
    <br><br>
    <input type="text" class="login-input" name="lname" placeholder="Last Name" required />
    <br><br>
    Gender:
  <input type="radio" name="gen" value="female">Female
  <input type="radio" name="gen" value="male">Male
  <input type="radio" name="gen" value="other">Other
  <span class="error">* </span>
  

   <br><br>

  Date of Birth: <input type="date" name="dob"
            min="1990-01-01" max="2050-12-31">
            <span class="error">* </span>
    <br><br>
    Select Religion: 
           <select>  
           <option value = "Islam"> Islam  
           </option>  
           <option value = "Hindus"> Hindus   
           </option>  
           <option value = "Others"> Others  
           </option> 
       </select>

       </fieldset>
       <br><br>
       <br><br>
           <fieldset>
      <legend><label>***Contact Information***</label></legend>
    <input type="text" class="login-input" name="padd" placeholder="Present Address" required />
    <br><br>
   

  <input type="text" class="login-input" name="email" placeholder="Email Adress">
  <br><br>
  
   Website: <a href="https://github.com/MdYousufAfendi">Visit Github Account!</a>
  </fieldset>
  <br><br>
  <br><br>
  <fieldset>
    <legend><label>***Account Information***</label></legend>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <br><br>
        <input type="password" class="login-input" name="password" placeholder="Password">
        <br><br>
    </fieldset>
    <br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
