<?php
include('config.php');
session_start();

if(isset($_POST['submit']))
{
  $email=$_POST["email"];
  $password=$_POST["password"];
  $sql="select * from tbl_login where email='".$email."' AND password='".$password."'";
  $res=$con->query($sql);
  if(mysqli_num_rows($res)>0)
  {
	foreach($res as $data)
	{
	  $email=$data['email'];
	  $password=$data['password'];
	  $type=$data['role'];
	}
	$_SESSION['type']="$type";
	$_SESSION['email']="$email";
	$_SESSION['auth_user']=[
	  'email'=>$email,
	  'password'=>$password
	];

	if($_SESSION['type']=='3')
	{
	  $_SESSION['message']="Welcome";
	  header("location:customer_home.php");
	  exit(0);
	}
	elseif($_SESSION['type']=='2')
	{
	  $_SESSION['message']="Welcome";
	   header("location:company_home.php");
	  exit(0);
	}
	elseif($_SESSION['type']=='1')
	{
	  $_SESSION['message']="Welcome";
	  header("location:admin.php");
	  exit(0);
	}
  }
  else
  {

	echo "<script> alert('Incorrect Password'); </script>";

  }
}
?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form </title>
    
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text"  name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="index.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>