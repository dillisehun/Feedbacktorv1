 <?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session

 include'sessions.php';
 include 'connection.php';
   $class = $_POST['class']; 
	 $acad_se = $_POST['acad_se']; 
  	 $section = $_POST['section']; 
		 $subject = $_POST['subject']; 
		 $sql1 = "SELECT fname,subject FROM allfacultydb WHERE class='$class' AND subject='$subject' AND section='$section' AND acad_se='$acad_se'";
 $result1 = mysql_query ($sql1) or die (mysql_error ());
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty list</title>
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
  <h1>FACULTY LISTS</h1>
  <div class="row"><div class="col-sm-12">
 	 <div class="container"><center>
   <table  class="table table-bordered">
   <thead>
   <th>
     Faculty List
   </th>
   <th>
     Subject
   </th></thead>
  <?php        
  while ($row = mysql_fetch_array ($result1)){
  echo'<tbody><td>';
  echo $row['fname']."</td>";
  echo '<td>';
  echo $row['subject'];
  echo '</td>';
  } 
   echo '</tbody>';
   ?>
   </table></center>
   </div>
</div></div>
    
</div></div>

</center>

</body>
</html>

<?php   

mysql_close($connection); ?>
