
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
  <title>Message</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>
</head>
<body>

<div class="container">
<h1><center> Student Messages/Queries</center></h1><center>
   <table  class="table table-bordered">
   <thead>
   <th>
     Adid
   </th>
   <th>
     Date
   </th>
   <th>
     Class
   </th>

   <th>
     Section
   </th>
   <th>
     Academic Session
   </th>
   <th>
     Message/Query
   </th>
   </thead>
  <?php
    $query = "SELECT * FROM hodmsg order by datem";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
        
  while ($row = mysql_fetch_array ($result)){
  echo'<tbody><td>';
  echo $row['adid']."</td>";
  echo '<td>';
  echo $row['datem'];
  echo '</td>';
  echo '<td>';
  echo $row['class'];
  echo '</td>';
   echo '<td>';
  echo $row['section'];
  echo '</td>';
  echo '<td>';
  echo $row['acad_se'];
  echo '</td>';
  echo '<td>';
  echo $row['msg'];
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
