<?php

error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';

$adid = $_SESSION['salogin_user1'];
    $query1 = mysql_query("select * from sadmindb where adid='$adid' AND desg ='sadmin' ", $connection);
    while($row1 = mysql_fetch_assoc($query1))
{
    $saname = $row1['saname'];
     $mailid = $row1['mailid'];
      $pno=$row1['pno'];

    $address = $row1['address'];
    
  }   
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SuperADMIN View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <style>
  body{font-family: "Ropa Sans", sans-serif; color:#666; font-size:14px; color:#333;  background-image: url("img/bg2.jpg");}</style>
</head>
<body>
<hr>
<center>
   <div class="container">

             <div class="row">
                <div class="col-sm-4">
                     <center><h3><b>PHONE N0. <?php echo $pno; ?></b></h3></center>
                </div>

               <div class="col-sm-4">
                     <center>
                
<a type="submit" class="btn btn-default" href="logout.php">LOGOUT</a>


 <h3>SUPERADMIN Name! <?php echo $saname; ?></h3>
<img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
  <h5>SUPERADMIN Name :<?php echo $saname; ?></h5><h5>Adhaar Card No.:<?php echo $adid; ?></h5></center>
</div>
<div class="col-sm-4">

<center><h3><b>EMAIL ID:<?php echo $mailid; ?></b></h3></center>
</div>
</div>
</div>

</center><hr>



<div class="row">
            <div class="col-sm-6">
                 <div class="well">
                  <CENTER>
                   <h2>School list</h2></CENTER>


                       <form>
                         <div class="form-group">

                            <div class="col-xs-12">

                                     <select class="form-control" id="sel1">
                                     <option>District 1</option>
    
                                     </select><hr>
                           </div>

                         <div class="col-xs-6">
                               <select class="form-control" id="sel1">
                                   <option>State 1</option>
                                     </select><hr>
                          </div>
                           <div class="col-xs-6">
                                <select class="form-control" id="sel1">
                                          <option>School code 1</option>
                               </select><hr>
                           </div>
                          <div class="col-xs-12">
                           <select class="form-control" id="sel1">
                              <option>City 1</option>
                          </select><hr>
                          </div>
                        </div>
                    </form>


<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">GO</button>









</div>
</div>

<div class="col-sm-6">
            <div class="well">
                     <center>
                         <h2>Send Notice</h2>
                     </center>     
                  <form>
               <div class="form-group">
                 <div class="col-xs-12">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                       <input id="email" type="text" class="form-control" name="email" placeholder="Faculty">
    
                        <input id="email" type="text" class="form-control" name="email" placeholder="Student">
                </div>
                <div class="col-xs-12">
                       <select class="form-control" id="sel1">
                       <option>District 1</option>
                       </select>
                  </div>
                    <div class="col-xs-6">
                      <select class="form-control" id="sel1">
                         <option>School Code 1</option>
                      </select>
                    </div>
                        <div class="col-xs-6">
                        <select class="form-control" id="sel1">
                     <option>State 1</option>
                        </select>
                         </div>
                    <div class="col-xs-12">

                    <select class="form-control" id="sel1">
                      <option>City 1</option>
                     </select><hr>
                       </div>

                       <hr>

<button type="button" class="btn btn-success btn-block" >Send</button>


</form>


  </div>
</div></div>
<hr>
<hr><hr>
<div class="row">
                 <div class="col-sm-6">
                 <div class="well">
                   <center>
                      <h2>ZONE</h2>
                    </center>

                    <form>
                          <div class="form-group">

                                 <div class="col-xs-12">
                                             <select class="form-control" id="sel1">
                                                <option>ZONE 1</option>
                                             </select><hr>
                                 </div>
                          </div>
                    </form>


<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Check</button>

</div>  
   
</div>
</div>
</div>

</body>
</html>

<?php   
mysql_close($connection); ?>


