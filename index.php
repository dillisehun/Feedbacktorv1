<?php
session_start();
if(isset($_SESSION['slogin_user1']))
header("location: sview.php");
else if(isset($_SESSION['flogin_user1']))
header("location: fview.php");
else if(isset($_SESSION['alogin_user1']))
header("location: aview.php");
else if(isset($_SESSION['salogin_user1']))
header("location: saview.php");
else if(isset($_SESSION['hodlogin_user1']))
header("location: hview.php");

else 
{
echo '
<!DOCTYPE html>

<html lang="en">
<head>

  <title>FBS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  body{
    font-family: "Ropa Sans", sans-serif; 
    background-color:#808080; font-size:14px; ; 
  }
  </style>
  <style>
   header{
   background-color:#007399;
   }
p  {
    color: white;
    font-family: courier;
    font-size: 280%;
}
.well {
    margin-top: 50px;
    box-shadow: 0 0 30px black;
    padding:0 15px 0 15px;
}
h1
{
  color: white;
    font-family: courier;
    font-size: 180%;
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
      <a class="navbar-brand" href="#"><b>Ministry of HRD</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar navbar-right">
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="row"><div class="col-sm-4"></div><div class="col-sm-5"><center><p>FEEDBACK EVALUATION</p></center><center><h1>SYSTEM</h1></center></div><div class="col-sm-3"></div></div>
<div class="row">
<div class="col-sm-4"><img src="SIH.png" class="img-rounded" alt="Cinque Terre" width="350" height="400"></div>
<div class="col-sm-5">
<div class="well">
                        <center><h2 class="text-success">   User Login</h2></center>
                          <form class="form-horizontal" method="post" action="ucheck.php">
                          <div class="form-group">
                         <label class="control-label col-sm-2" for="adid"><h5 class="text-warning"></b>User ID:<b></h5></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Enter User-Id" class="validate"  required>
       </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd" ><b><h5 class="text-warning"></b>Password:</h5></label>
      <div class="col-sm-10">          
        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password"  required>
      </div>
    </div>

    
    <div class="form-group">        
      <div>
       <center> <input type="submit" value="Submit" name="submit" class="btn btn-success"/></center>
        </div>
      </div>
    </div>
  </form></div>

<div class="col-sm-3"><br><br><br><br><br><br><img src="hrdlogo.png" class="img-rounded" alt="Cinque Terre" width="300" height="150"></div>
</div>
</body>
</html>
';
}
?>