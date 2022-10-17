<?php
include('../config.php');
if(isset($_POST['Submit']))
{

$fname=$_POST['Name'];
$address=$_POST['Address'];
$mob=$_POST['Contact'];
$email=$_POST['email'];
$gender=$_POST['Gender'];
$password=$_POST['password'];

$duplicate=mysqli_query($con, "SELECT * from tbl_login WHERE email='$email'");
    
      if(mysqli_num_rows($duplicate)>0)
      {
        echo "<script> alert('Already Registered'); </script>";
        
      }
      else
      {
 
        $sql="insert into tbl_login(email,password,role) values('$email','$password',3)";
       if($con->query($sql)=== TRUE)
         {
          $val="SELECT logid from tbl_login where email='".$email."'";
            if($res=$con->query($val))
            {
              foreach($res as $data)
              {
                $l_id=$data['logid'];
                $sql1="INSERT INTO tbl_cus_registration(logid,username,address,gender,contact) values('$l_id','$fname','$address','$gender','$mob')";
                if($con->query($sql1)=== TRUE)
                {
        echo "<script> alert('Registered Successfully') </script>";
                  header("location:../login.php");
                }
              }
            }
     }  
    }
  }
?>


<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="reg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<script src="validation.js"></script>
  </head>
  <body>
    <!-- Body of Form starts -->
  	<div class="container">
	   <h1 style="text-align:center;">  Customer Registration </h1>  

      <form method="post" autocomplete="on">
       
        <!--name-->
    		<div class="box">
          <label for="Name" class="fl fontLabel"> Name: </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="Name" id ="Name" placeholder="Name"
              class="textBox" onkeyup="validateName()" required>
			  <h4 class="error-message" style="color:red;" id="name_err"></h4>
    			</div>
    			<div class="clr"></div>
    		</div><br>
            <!--name-->

    		<!--address-->
    		<div class="box">
          <label for="Address" class="fl fontLabel"> Address: </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="Address"
              placeholder="Address" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--address-->


        


    		<!---Contact.------>
    		<div class="box">
          <label for="Contact" class="fl fontLabel"> Contact: </label>
    			<div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="Contact" id="phone" maxlength="10" onkeyup="validatePhone()" placeholder="Phone No." class="textBox">
						<h4 class="error-message" style="color:red;" id="ph_err"></h4>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Contact.---->

         
    		<!---Gender----->
    		<div class="box radio">
          <label for="gender" class="fl fontLabel"> Gender: </label>
    				<input type="radio" name="Gender" value="Male" required> Male &nbsp; &nbsp; &nbsp; &nbsp;
    				<input type="radio" name="Gender" value="Female" required> Female
    		</div>
    		<!---Gender--->
               <!---Email ID---->
			   
    		<div class="box">
          <label for="email" class="fl fontLabel"> Email ID: </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" id="email" required name="email" placeholder="Email Id" onkeyup="validateEmail()" class="textBox">
						<h4 class="error-message"style="color:red;" id="mail_err"></h4>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->

    		<!---Password------>
    		<div class="box">
          <label for="password" class="fl fontLabel"> Password: </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="password" id="password" placeholder="Password" onkeyup="validatePassword()" class="textBox">
						<h4 class="error-message" style="color:red;" id="pwd_err"></h4>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->

            <!---Confirmpassword------>
    		<div class="box">
          <label for="Confirmpassword" class="fl fontLabel"> Confirmpassword: </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="Cpassword" placeholder="Password" id="cpassword" onkeyup="validateConfirm()" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---ConfirmPassword---->


         




    		<!--Terms and Conditions------>
    		<div class="box terms">
    				<input type="checkbox" name="Terms" required> &nbsp; I accept the terms and conditions
    		</div>
    		<!--Terms and Conditions------>



    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
    		<!---Submit Button----->
      </form>
  </div>
  <!--Body of Form ends--->
  </body>
  <script src="./assets/js/jquery-3.2.1.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>        
<script src="./sassets/js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</html>