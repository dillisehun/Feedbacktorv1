<?php
$suser_check=$_SESSION['slogin_user1'];
$sauser_check=$_SESSION['salogin_user1'];
$fuser_check=$_SESSION['flogin_user1'];
$hoduser_check=$_SESSION['hodlogin_user1'];
$auser_check=$_SESSION['alogin_user1'];
if(isset($suser_check) || isset($sauser_check) || isset($fuser_check) || isset($hoduser_check) || isset($auser_check))
{}
else
{ mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}

?>