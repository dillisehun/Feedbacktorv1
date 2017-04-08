 <?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session

 include'sessions.php';
 include 'connection.php';
 $adid = $_SESSION['hodlogin_user1'];
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>classid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container-fluid">
<CENTER>
  <h1>class id converter</h1>
  <div class="row">
   
   
   <div class="container">
    <table class="table">
    <thead>
      
        <th>CLASSID</th>
<th>decoded classid</th>
    <th>Academic Session</th>

    <th>CLASS</th>
    <th>SECTION</th>
        <th>SUBJECT</th>
       
    <th>Aadhar id</th>
      
    </thead>
    <tbody>
  
 

 <?php $sql3 = "
 SELECT classid
FROM feedbackdb";
?>



<?php


             $result3 = mysql_query ($sql3) or die (mysql_error ());
        while ($row3 = mysql_fetch_array ($result3)){
           echo '<tr> <td>';
      echo  $row3['classid'];
      echo' </td><td>'; 

$cid=$row3['classid'];


   $new=preg_replace('/[^A-Za-z0-9\-]/', '', $cid); // Removes special chars.
echo $new;
$acad=substr($new,0,-5);
$sbj = substr($new, -2);    // returns "f"
$cls= substr($new, -5,2);    // returns "ef"
$sect = substr($new, -3, 1); // returns "d"

if($sbj=='Ma')
{
	$sbj='Maths';
}else
if($sbj='Sc')
{
	$sbj='Science';
}

 
if($acad=='201516')
{
	$acad='2015-16';
}else
if($acad='201617')
{
	$acad='2016-17';
}     
      echo' </td><td>'; 
       echo $acad;
      echo' </td><td>'; 
       echo $cls;
      echo' </td><td>'; 
       echo $sect;
      echo' </td><td>'; 
       echo $sbj;
       echo'</td>
       <td>'; 
       echo $a;
       echo'</td>
       </tr>'; 



   }
   



   $q = mysql_query("select adid from allfacultydb where class='$cls' AND section='$sect' AND acad_se='$acad' AND subject='$sbj' ;",  $connection);
   while($r = mysql_fetch_assoc($q))
{
 $a = $r['adid'];
}?>
<b>
<h1>DECODED AADHAR ID IS:</h1>
<?php
 echo $a;
 ?></b> </div>
</div>
    


</CENTER></div>

</body>
</html>

<?php   

mysql_close($connection); ?>

     