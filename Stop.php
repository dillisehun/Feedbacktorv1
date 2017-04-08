<?php
error_reporting(E_ALL ^ ~E_WARNING);
session_start();
include 'sessions.php';
 include 'connection.php';
 // Starting Session
$adid=$_SESSION['alogin_user1'];
$class=$_POST['class'];
$section=$_POST['section'];
$acad_se=$_POST['acad_se'];


$date=date("d/m/y");
$query = mysql_query("update studentacademicsdb set flagfdb=1 where class='$class' AND section='$section' AND acad_se='$acad_se'  ", $connection);
$query2 = mysql_query("update allfacultydb set flagfdb=1 where class='$class' AND section='$section' AND acad_se='$acad_se'  ", $connection);
header("Location: aview.php"); // Redirecting To Home Page
mysql_close($connection); // Closing Connection
?>