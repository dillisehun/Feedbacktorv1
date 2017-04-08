<?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session

include 'connection.php';
include 'sessions.php';
$adid = $_SESSION['slogin_user1'];
$msg = $_POST['comment']; 

$query0 = mysql_query("select * from studentacademicsdb where adid='$adid' ", $connection);
    while($row0 = mysql_fetch_assoc($query0))
{
    $class = $row0['class'];
     $acad_se = $row0['acad_se'];
      $section=$row0['section'];
  }
   date_default_timezone_set('India/Kolkata');
 $datem=date("d/m/y");

    $query1 = mysql_query("INSERT INTO hodmsg VALUES ('$acad_se','$adid','$datem','$class','$section','$msg')  ", $connection);
if($query1)
header('Location: sview.php');
else
echo "Error in Sending Message";
?>