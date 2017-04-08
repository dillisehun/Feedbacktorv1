<?php

error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';
// Password Generator
function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}
//All Post Variables
$name = $_POST['name'];
$names = explode(" ", $name);
$fname =  $names[0];
$sname =  $names[1]; 
$gender  = $_POST['gender'];
$yob = $_POST['yob'];
$gname = $_POST['gname'];
$state = $_POST['state'];
$address = $_POST['address'];
$pc = $_POST['pc'];
$dob = $_POST['dob'];
$mailid = $_POST['mailid'];
$role = $_POST['role'];
$pno = $_POST['pno'];
$scode = $_POST['scode'];
$rno = $_POST['rno'];
$adid = $_POST['adid'];
echo '<html>
	<head>
	 <title> User Inbound</title>
	    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>
		 <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>
	</head>
	<body><div class="container">
	<center><blockquote>
	';
	// for users who does not have Adhaar Card
if(isset($_POST['rno'])){
$rno = $_POST['rno'];
$adid = $rno;
$uadid =  $adid % 10000;
$uid = $uadid.$fname.$sname;


echo'<form method="post" action="registercheck.php">

	<input type="submit" class="btn btn-info" value="Go Back"   /></form>';
$pwd = generate_password();
$query1 = mysql_query(" INSERT INTO userdb VALUES ('$uid','$adid','$pwd','$role','$scode') ",  $connection);
if($query1)
	{echo '
	<h2>User Details</h2>
	<p>User ID : ';
	echo $uid.'</br>';
	echo 'Password :'.$pwd.'
	</p></blockquote></center></body>
	</html>';
}

}
// for users who does  have Adhaar Card
else if(isset($_POST['adid']))
{    
	$adid = $_POST['adid'];
$uadid =  $adid % 10000;
$uid = $uadid.$fname.$sname;
echo'<form method="post" action="register.php">

	<input type="submit" class="btn btn-info" value="Go Back"   /></form>';
$pwd = generate_password();


$query1 = mysql_query(" INSERT INTO userdb VALUES ('$uid','$adid','$pwd','$role','$scode') ",  $connection);
if($query1)
	{echo '
	<h2>User Details</h2>
	<p>User ID : ';
	echo $uid.'</br>';
	echo 'Password :'.$pwd.'
	</p></blockquote></center></body>
	</html>';
}

}
 else
	echo"User Already Exists";
?>