<?php
error_reporting(E_ALL ^ ~E_WARNING);
session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';
$adid = $_SESSION['flogin_user1'];
$uid = $_SESSION['fuid'];

// in loop
	$query4 = mysql_query("select * from facultydb where adid='$adid'  AND desg ='fac' ",  $connection);
while($row4 = mysql_fetch_assoc($query4))
{ $fname = $row4['fname'];  
 $address = $row4['address'];
    $mailid = $row4['mailid'];
    $pno = $row4['pno'];

} // in loop

		$query5 = mysql_query("select * from allfacultydb where adid='$adid'  ",  $connection);
while($row5 = mysql_fetch_assoc($query5))
{
	$subject = $row5['subject'];
$class = $row5['class'];
$section = $row5['section'];
$acad_se = $row5['acad_se'];
$classt = $row5['classt'];
}
		

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>

<script>   function qready()
{
var r=confirm("Please be ready with your Adhaar QR Code !!");
  if(r == true){
  return true;
  }else{
   return false;
  }}
   function uready()
{
var r=confirm("Please be ready with your Details and Next time be sure to have Adhaar Card !!");
  if(r == true){
  return true;
  }else{
   return false;
  }}
</script>

</head>
<body>
<hr>
<center>
<div class="col-sm-17">
 
<a type="submit" class="btn btn-default" href="logout.php">LOGOUT</a>


 <h3>Hello <?php echo $fname; ?>!</h3>
<img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
  <h5>Class Teacher of <?php echo $class . $section . $acad_se ;  ?></h5><h5>User Id: <?php echo $uid; ?></h5>
  <h5>Phone No: <?php echo $pno; ?></h5><h5>EmailID: <?php echo $mailid; ?></h5>
</div>
<div class="container">
<div class="row">
<div class="well">
<blockquote>
<h4><b>Address</b> </h4> 
<?php echo $address;
?> <br>
 <br>
 
</blockquote>
</div>
</div>
</div>
<?php
if($classt!=0){
echo ' <div class="container">
  <div class="well">
<div class="row">
 <div class="col-sm-6">
  <center>
  	<h2>New User</h2>
   </center>     
 <form  method="post" action="reg/register.php" >
   <input type="submit" class="btn btn-primary btn-lg" onclick="return qready();" value=" Registration Page(QR)"/>
   </form><br/>
<form  method="post" action="reg/registercheck.php" >
   <input type="submit" class="btn btn-primary btn-lg" onclick="return uready();" value=" Registration Page(w/o QR)"/>
   </form>

</div>
 
';}
?> <div class="col-sm-6">
  <center>
  	<h2>Feedback Survey </h2>
   </center>     
 <!--content goes here-->
   <form method="post" action="../res.php">
<?php 
$query = "SELECT DISTINCT class FROM allfacultydb where adid = '$adid'";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>




       <div class="col-xs-6"> 

     <div class="form-group">
    
      <select class="form-control" id="class" name="class">
<?php 
while ($row = mysql_fetch_array($result))
{
    echo "<option value=".$row['class'].">".$row['class']."</option>";
}
?>        
</select>



    
      </div>
     </div>
  

       <div class="col-xs-6"> 

    <div class="form-group">
    
       <select class="form-control" id="acad_se" name="acad_se">
<?php 
$query = "SELECT DISTINCT acad_se FROM allfacultydb where adid = '$adid'";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['acad_se'].">".$ro['acad_se']."</option>";
}
?>        
</select>

      </div>
  </div>


      

      <div class="col-xs-12"> 

     <div class="form-group">

       <select class="form-control" id="section" name="section">
<?php 
$query = "SELECT DISTINCT section FROM allfacultydb where adid = '$adid'";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
while ($r = mysql_fetch_array($result))
{
    echo "<option value=".$r['section'].">".$r['section']."</option>";
}
?>        
</select>
   
      </div>
</div>    




    <div class="form-group">  
<div class="col-xs-12">
<input type="submit" class="btn btn-success btn-block btn-lg"    value="check">
</div>
</div>
</form>
  </div>
   </div></div>
<br/>
<hr>
<div class="container">

 <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#page1">Page 1</a></li>
     </ul>
  </center></div>
  <div class="container">
<div class="col-sm-17" style="background-color:lavender;">
  <div class="tab-content">
    <?php
$query2 = mysql_query("select s.sname,sa.mp,sa.ap,sa.class,sa.section,sa.acad_se,af.subject,sa.adid,s.address,s.pno from allfacultydb af INNER JOIN studentacademicsdb sa ON sa.class = af.class AND sa.section = af.section AND sa.acad_se = af.acad_se INNER JOIN studentdb s ON s.adid = sa.adid ",  $connection);
	echo' <div id="page1" class="tab-pane fade in active">

<table class="table table-hover">
        <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone No</th>
        <th>Marks Percentage</th>
        <th>Attendance Percentage</th>
      </tr>
    </thead>
    <tbody>
      
';
while($row2 = mysql_fetch_array($query2))
 {
echo '<tr>  <td> <img src="sample.jpg" class="img-circle" alt="Cinque Terre" width="20" height="20"/>
</td>'; 
        
echo '<td>'.$row2["sname"].'</td>';
echo '<td>'.$row2["address"].'</td>';
echo '<td>'.$row2["pno"].'</td>';
 echo '<td>'.$row2["mp"].' </td>';
echo '<td>'.$row2["ap"].'</td>
        ';
       
}

    echo'  
    </tbody>
  </table>
    </div>';

  echo '  </div>';?>
</div>
<hr>



</body>
</html>
<?php   
mysql_close($connection); ?>