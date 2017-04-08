<?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';

$adid = $_SESSION['slogin_user1'];
$uid = $_SESSION['suid'];
    $query1 = mysql_query("select feeno,statusa from feesubmitdb where adid='$adid' ", $connection);
    $query2 = mysql_query("select * from studentdb where adid = '$adid' ",  $connection);
    $query3 = mysql_query("select statusa,datea from fdbsubmitdb where adid='$adid' ", $connection);
    
while($row2 = mysql_fetch_assoc($query2))
{

  $sname = $row2['sname'];
    $section2 = $row2['section'];
    $term2 = $row2['term'];
    $class2 = $row2['class'];
    $acad_se2 = $row2['acad_se'];
    $mp = $row2['mp'];
    $ap = $row2['ap'];
    $mailid2 = $row2['mailid'];
    $pno2 = $row2['pno'];
    $address2 = $row2['address'];
    $query5 = mysql_query("select * from studentacademicsdb where adid='$adid' ", $connection);
   

}
while($row5 = mysql_fetch_assoc($query5))
{   $term = $row5['term'];
     $class = $row5['class'];
     $section = $row5['section'];
     $acad_se = $row5['acad_se'];
     $mp = $row5['mp'];
     $ap = $row5['ap'];
  
   }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <style>
  img {
    
    box-shadow: 0 0 30px black;
    }
    b{
    
  
 color: black;
    font-family: courier;
}

</style>
<style>
  body{
    font-family: "Ropa Sans", sans-serif; background-image: url("img/bg2.jpg");
     font-size:14px;  
  }
  </style>
  <style>
   header{
   background-color:#007399;
   }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-inverse " id="tbnav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><strong>Ministry of HRD</strong></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar navbar-right">
      </ul>
    </div>
  </div>
</nav>
<div class="container">

<div class="row">
 <div class="col-sm-4">
 <center><h3><b>Phone: <?php echo $pno2;?></b></h3></center>
 </div>

 <div class="col-sm-4">
 <center>
<a type="submit" class="btn btn-success" href="logout.php">LOGOUT</a>

<h3><B> Hello ! <?php echo $sname;?> </B></h3>
<img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
  <h5><B>User Id: <?php echo $uid; ?></B></h5>
</center>
</div>
<div class="col-sm-4">

<center><h3><b>MailID: <?php echo $mailid2;?></b></h3></center>
</div>
</div>


<div class="row">

<h4><b>Address </h4> 
<?php echo $address2;
?></b> <br>
 <br>
 
</div>
<div class="well">
<div class="row">
<div class="col-sm-3">
<p style="font-size: 30px"><b> Term </p> <br> <?php echo $term; ?>
</div>
<div class="col-sm-3">
<p style="font-size: 30px"><b>Section </p> <br> <?php echo $section; ?>
</div>
<div class="col-sm-3">
<p style="font-size: 30px"><b>Academic Session </p> <br> <?php echo $acad_se; ?>
</div>
<div class="col-sm-3">
<p style="font-size: 30px"><b>Class </p> <br> <?php echo $class; ?>
</div>
</div>
<div class="row">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Faculty Name</th>
        <th>Subjects</th>
      </tr>
    </thead>
    <tbody>
<?php
    $query6 = "select * from allfacultydb where  class='$class' AND section='$section' AND acad_se='$acad_se' ";
      $result = mysql_query($query6);
      if (mysql_num_rows($result) > 0) {
while($row6 = mysql_fetch_array($result))
{   
 
echo 
'      <tr>
        <td>'
         .$row6['fname'].'</td>
        <td>'
        .$row6['subject'].'</td>
      </tr>
'  ;
 
}
}
?>
</tbody>
</table>
</div>
</div>


<div class="well">
<div class="container">
<div class="row">
<div class="col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading">Marks</div>
  <div class="panel-body"><?php echo $mp; ?> %</div>
</div>
</div>
<div class="col-sm-5">
<div class="panel panel-default">
  <div class="panel-heading">Attendence</div>
  <div class="panel-body"><?php echo $ap; ?> %</div>
</div>
</div>
</div>

<div class="row">
  <div class="col-sm-6">
    <h2><b>Feedback Submitted</h2>

    <div class="well">
     <table class="responsive" border="2px">
     <thead>
    <th> Date</th><th> Status</th>
     </thead><tbody>
<?php while($row3 = mysql_fetch_assoc($query3))
{    $statusfdb = $row3['statusa'];
     $datefdb = $row3['datea'];

           
       echo '<tr>';
       echo '<td>';
        echo $datefdb ;
        echo '</td><td>';
        echo $statusfdb ;
        echo '</td></tr>';
 }

       ?>
      </table>
    </div>
  </div>
  <div class="col-sm-5">
    <h2><b>Contact Us</h2>
    <div class="well">
    <form action="hmessage.php" method="post">
     <div class="form-group">
   <h4>Adhaar id: </h4><?php echo $adid;?> </div>
   <div class="form-group">
  <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Any Help from HOD..." required></textarea>
  </div>
    <input type="submit" value="Submit" name="submit" class="btn btn-warning" />
  </form></div>
  
  </div><hr>
  <div class="col-sm-6">
    
    <div class="row">
  <div class="col-sm-12">
    <h2><b>Fees Submition Details</h2>

    <div class="well">
     <table class="responsive" border="2px">
     <thead>
     <th>Fee No</th><th> Status</th>
     </thead><tbody>
<?php while($row1 = mysql_fetch_array($query1))
{
    $feeno = $row1['feeno'];
     $statusfee = $row1['statusa']; 
  
        
       echo '<tr><td>';
        echo $feeno ;
       echo '</td><td>';
        echo $statusfee ;
        echo '</td></tr>';
 }

       ?>
</tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
<?php
 $query = mysql_query("select * from studentacademicsdb where  flagfdb = '0'",$connection);
      if (($result) > 0)
{


echo '  <div class="col-sm-6">
  <h2><b> Please Submit your Feedback Now</h2>
  
    <center><button class="btn btn-success" onclick="window.location.href="fgen.php">Submit</button></center>
  


</div>';}
?>
</div>
</div>
</center></div>
</body>
</html>
<?php   

mysql_close($connection); ?>