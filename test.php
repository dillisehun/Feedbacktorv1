<?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';
$adid = $_SESSION['alogin_user1'];


$value =  $_GET['user_input'];



echo $value;




 $query2 = mysql_query("select * from fdqlist where adid='$adid' ", $connection);
$result = mysql_query('SELECT qid, qactive, startdate, enddate 
                         FROM fdqlist  
                     ORDER BY qid DESC 
                        LIMIT 1') or die('Invalid query: ' . mysql_error());

//print values to screen
while ($row = mysql_fetch_assoc($result)) {
  $a=$row['qid'];
   $b=$row['qactive'];
   $c=$row['startdate'];
   $d=$row['enddate'];
}
$a=$a+1;
$c = strtotime("1 day", strtotime($c));
$e = date("Y-m-d", $c);
mysql_query("insert into fdqlist (qid,fedque,qactive,startdate) VALUES ('$a','$value','$b','$e')", $connection);
?>