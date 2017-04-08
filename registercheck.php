<?php

error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';
echo'<html>
	<head>
	 <title>Register user </title>
	    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.2.0.min.js"></script>
	 <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>
	</head>
	<body><br/>`
	<div class="container">
	<div class="row">
	<div class="col-sm-6">
<form method="post" >
    <input type="submit" class="btn btn-info" formaction="aview.php" value="Home"   /></form>
	<center>';
if(isset($_POST["data"]))
{
	$string = $_POST["data"];
	$_SESSION["data"] = $string;
	$xm = $_SESSION["data"] ; 
	$obj = json_decode($xm);
	$uid = $obj->{'_uid'};
	$name = $obj->{'_name'};
	$gender  = $obj->{'_gender'};
	$yob = $obj->{'_yob'};
	$gname = $obj->{'_gname'};
	$house = $obj->{'_house'};
	$lm = $obj->{'_lm'};
	$loc = $obj->{'_loc'};
	$vtc = $obj->{'_vtc'};
	$po = $obj->{'_po'};
	$dist = $obj->{'_dist'};
	$subdist = $obj->{'_subdist'};
	$state = $obj->{'_state'};
	$address = $house." ".$lm." ".$loc." ".$dist." ".$subdist." ".$dist;
	$pc = $obj->{'_pc'};
	$dob = $obj->{'_dob'};
	echo '<form method="post" action="register.php">
     
	<input type="submit" class="btn btn-info" value="Go Back"   /></form>

	<form action="reg/insert.php" class="responsive" method="post">
	<div class="form-group">
	<input type="text" class="form-control" value="'.$uid.'" name="adid" required readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="S01" name="scode" required readonly/>
	</div>

	<div class="form-group">
	<input type="text" class="form-control" value="'.$name.'" name="name" required readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$gender.'" name="gender" required  readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$yob.'" name="yob" required  readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$gname.'" name="gname" required readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$address.'" name="address" required  readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$state.'" name="state" required readonly/>
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="'.$dob.'" name="dob" required readonly/>
	</div>
	<div class="form-group">
	 <select name="role" class="form-control" required>
	 <option disabled selected>choose role</option>
	  <option value="stu">student</option>
	  <option value="fac">faculty</option>
	  <option value="hod">hod</option>
	  <option value="admin">admin</option>
	  <option value="sadmin">superadmin</option>\
	</select>
	</div>
	<div class="form-group">
	<input type="email" class="form-control" placeholder="Enter Email" name="mailid" required/>
	</div>
	<div class="form-group">
	<input type="tel" class="form-control"  placeholder="Enter Phone no" pattern="\d{3}\d{3}\d{4}" name="pno" required/>
	</div>
	<center>
	<input type="submit" class="btn btn-danger" value="Add Now" /></center> 
	
	</form>';
}
  else
{	echo '<form method="post" action="reg/registercheck.php">
    <input type="submit" class="btn btn-info" formaction="register.php" value="Add a User with AdhaarQR"   /> 
	<input type="submit" class="btn btn-info" value="New User"   /></form>

	<form action="reg/insert.php" class="responsive" method="post">
	<div class="form-group">
	<input type="text" class="form-control" placeholder="Roll No" name="rno" required />
	</div>
	<div class="form-group">
	<input type="text" class="form-control" value="S01" name="scode" required />
	</div>

	<div class="form-group">
	<input type="text" class="form-control" placeholder="Name" name="name" required />
	</div>
	<div class="form-group">
	<select name="gender" class="form-control" required>
	 <option disabled selected>Choose Gender</option>
	  <option value="m">Male</option>
	  <option value="f">Female</option>
	</select>
</div>
	<div class="form-group">
	<input type="text" class="form-control" placeholder="FathersName" Name" name="gname" required />
	</div>
	<div class="form-group">
	<input type="text" class="form-control"  name="address" placeholder="Address" required  />
	</div>
	<div class="form-group">
	<input type="text" class="form-control" placeholder="State" name="state" required/>
	</div>
	<div class="form-group">
	<input type="date(yyyy-mm-dd)" class="form-control" placeholder="Date of Birth" name="dob" required/>
	</div>
	<div class="form-group">
	 <select name="role" class="form-control" required>
	 <option disabled selected>choose role</option>
	  <option value="stu">student</option>
	  <option value="fac">faculty</option>
	  <option value="hod">hod</option>
	  <option value="admin">admin</option>
	  <option value="sadmin">superadmin</option>\
	</select>
	</div>
	<div class="form-group">
	<input type="email" class="form-control" placeholder="Enter Email" name="mailid" required/>
	</div>
	<div class="form-group">
	<input type="tel" class="form-control"  placeholder="Enter Phone no" pattern="\d{3}\d{3}\d{4}" name="pno" required/>
	</div>
	<center>
	<input type="submit" class="btn btn-danger" value="Add Now" /></center> 
	
	</form>';
}
echo'</div>

</center>
<div class="col-sm-6">
<p><b>Instructions:</b><ul>
<li>Fill Out the Form Correctly.</li>
<li>These Details will be used as your credentials for Further Process.</li>
<li>We Condemn the misuse of any information of the user.</li>
</li></p>
</div></div></body>
	</html>';
?>