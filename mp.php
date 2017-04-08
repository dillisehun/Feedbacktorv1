
 <?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session

 include'sessions.php';
 include 'connection.php';
 $adid = $_SESSION['hodlogin_user1'];
        /*while ($row1 = mysql_fetch_array ($result1)){
			echo $row1['adid'],"<br>";
			echo $row1['ap'];
		}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MARKS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>
</head>
<body>



<div class="container-fluid">
<CENTER>
  <h1>MARKS PERCENTAGE VIEW</h1>
  <div class="row">
   
   
   <div class="container">
    <table class="table">
    <thead>
      
        <th>ADID</th>
        <th>SNAME</th>
        <th>MP</th>
		<th>CLASS</th>
		<th>SECTION</th>
		<th>Academic Session</th>
      
    </thead>
    <tbody>
  
 <?php $sql3 = "
 SELECT *
FROM studentacademicsdb
INNER JOIN studentdb ON studentacademicsdb.adid = studentdb.adid";
             $result3 = mysql_query ($sql3) or die (mysql_error ());
			  while ($row3 = mysql_fetch_array ($result3)){
           echo '<tr> <td>';
			echo  $row3['adid'];
			echo' </td><td>'; 
			echo $row3['sname'];
			echo' </td><td>'; 
			 echo $row3['mp'];
			echo' </td><td>'; 
			 echo $row3['class'];
			echo' </td><td>'; 
			 echo $row3['section'];
			echo' </td><td>'; 
			 echo $row3['acad_se'];
			 echo'</td>
			 </tr>'; }
   ?>
	</div>
</div>
    


</CENTER></div>

</body>
</html>

<?php   

mysql_close($connection); ?>
