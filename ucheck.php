<?php

error_reporting(E_ALL ^ ~E_WARNING);
session_start(); // Starting Session
// Define $username and $password
	
$uid=$_POST['uid'];
$pwd=$_POST['pwd'];
$submit = $_POST['submit'];
include  'connection.php';
$query2 = mysql_query("select * from userdb where uid='$uid' AND pwd='$pwd'  ",  $connection);
		while($row2 = mysql_fetch_assoc($query2))
{

  $role = $row2['role'];
$adid = $row2['adid'];


}
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
if (isset($submit) && $role!='stu'  ) {
	     if($role=='fac'){
				       $_SESSION['flogin_user1']=$adid;
				       $_SESSION['fuid']=$uid;

	       header("location: fview.php"); // Redirecting To Other Page
	}
	else 
header("location: index.php"); // Redirecting To Other Page

       if($role=='admin'){
				       $_SESSION['alogin_user1']=$adid;
				       $_SESSION['auid']=$uid;
	       header("location: aview.php"); // Redirecting To Other Page
	}
	else 
header("location: index.php"); // Redirecting To Other Page

	   if($role=='sadmin'){
				       $_SESSION['salogin_user1']=$adid;
						$_SESSION['sauid']=$uid;
				       			       

	       header("location: saview.php"); // Redirecting To Other Page
	}
	else 
header("location: index.php"); // Redirecting To Other Page

   if($role=='hod'){
	       	       $_SESSION['hodlogin_user1']=$adid;
	       	       $_SESSION['hoduid']=$uid;
				       
	       header("location: hview.php"); // Redirecting To Other Page
	}
	else 
header("location: index.php"); // Redirecting To Other Page
}
	
else if (isset($submit) && $role=='stu'  ){
				       $_SESSION['slogin_user1']=$adid;
				       $_SESSION['suid']=$uid;
				       
 
	       header("location: sview.php"); // Redirecting To Student Page
	}
	else 
header("location: index.php"); // Redirecting To student Login Page



mysql_close($connection); // Closing Connection


?>
