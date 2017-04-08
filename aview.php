<?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';

$adid = $_SESSION['alogin_user1'];
$uid = $_SESSION['auid'];
// in loop

$query1 = mysql_query("select * from facultydb where adid='$adid' AND desg ='admin' ",  $connection);
while($row1 = mysql_fetch_assoc($query1))
{
 $aname = $row1['aname'];
 $mailid=$row1['mailid'];
 $pno=$row1['pno'];

 $address=$row1['address'];
}

?>


<html lang="en">
<head>
  <title>Admin View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>


<script>
function pops()
{var r=confirm("Are you sure you want to Start Feedback?");
  if(r == true){
   return true;
  }else{
   return false;
  }}

function pope()
{
var r=confirm("Are you sure you want to End Feedback?");
  if(r == true){
   return true;
  }else{
   return false;
  }}
  function qready()
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
<div class="container"><div class="row">
<div class="col-sm-12">
 
<a type="submit" class="btn btn-default" href="logout.php">LOGOUT</a>


 <h3> Hello <?php echo $aname; ?></h3>
<img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
  <h5> Admin Name <?php echo $aname; ?>
   </h5>
   <h5>User Id: <?php echo $uid; ?></h5>
   <h5>MailId <?php echo $mailid; ?></h5>
   <h5>Pno <?php echo $pno; ?> </h5>
   <h5>Address <?php echo $address; ?> </h5>
</div></div>



<hr>
<div class="well">


<div class="row">
     <div class="col-sm-6">


    <h2>Moderate Feedback</h2>
<?php 
$query = "SELECT DISTINCT acad_se,class,section FROM allfacultydb where flagfdb = 0";
$result = mysql_query($query,$connection);
while ($row = mysql_fetch_array($result)) {
  # code...
    echo '<p>Active Feedback : '.$row['acad_se'].' '.$row['class'].' '.$row['section'].'</p>';

}
  
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>

    <form method="post" action="Start.php">
<?php 
$query = "SELECT DISTINCT class FROM allfacultydb";
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
$query = "SELECT DISTINCT acad_se FROM allfacultydb";
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
$query = "SELECT DISTINCT section FROM allfacultydb";
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
<div class="col-xs-6">
<input type="submit" class="btn btn-success btn-block btn-lg"  onclick="return pops();"  value="Start Feedback">
</div>
<div class="col-xs-6">
<input type="submit" class="btn btn-success btn-block btn-lg" formaction="Stop.php" onclick="return pope();"  value="Stop Feedback"/>
</div>
</div>
</form>
</div>


  <div class="col-sm-6">
  <center>
    <h2>New User</h2>
   </center>     
 <form  method="post" action="register.php" >
   <input type="submit" class="btn btn-primary btn-lg" onclick="return qready();" value=" Registration Page(QR)"/>
   </form>
<form  method="post" action="registercheck.php" >
   <input type="submit" class="btn btn-primary btn-lg" onclick="return uready();" value=" Registration Page(w/o QR)"/>
   </form>

  
</div></div>


<div class="row">
     <div class="col-sm-6">

    <form method="post" action="#">

    <h2>Faculty Moderator</h2>
      

    <div class="form-group">
    <div class="col-sm-6">
       <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Academic Session</option>
<?php 
$query = "SELECT DISTINCT acad_se FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['acad_se'].">".$ro['acad_se']."</option>";
}
?>        
</select>

      </div>


<div class="form-group">
  
       <div class="col-xs-6"> 
          <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Class </option>
<?php 
$query = "SELECT DISTINCT class FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['class'].">".$ro['class']."</option>";
}
?>        
</select>

       </div>
      
      </div>
    
    <div class="form-group">  
    
       <div class="col-xs-6"> 
 <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Section</option>
<?php 
$query = "SELECT DISTINCT section FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['section'].">".$ro['section']."</option>";
}
?>        
</select>

      </div>


</div>
<div class="form-group">  
       <div class="col-xs-6"> 
    
    
          <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Faculty </option>
<?php 
$query = "SELECT DISTINCT fname FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['fname'].">".$ro['fname']."</option>";
}
?>        
</select>
        </div>
       </div>
<div class="col-xs-12">
<input type="submit" class="btn btn-danger btn-block btn-lg" formaction="#" onclick="return popu();"  value="Make User Inactive"/>
</div>

</div>
</div>

     <div class="col-sm-6">

    <form method="post" action="#">

    <h2>Faculty Moderator</h2>
       <div class="col-xs-6"> 

    <div class="form-group">
    
       <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Academic Session</option>
<?php 
$query = "SELECT DISTINCT acad_se FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['acad_se'].">".$ro['acad_se']."</option>";
}
?>        
</select>

      </div>
  </div>


  
       <div class="col-xs-6"> 
          <select class="form-control" id="acad_se"  name="acad_se">
       <option>Choose Class </option>
<?php 
$query = "SELECT DISTINCT class FROM allfacultydb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($ro= mysql_fetch_array($result))
{
    echo "<option value=".$ro['class'].">".$ro['class']."</option>";
}
?>        
</select>

       </div>
       </div>

</div><hr>
</div>


</body>
</html>

<?php   
mysql_close($connection); ?>