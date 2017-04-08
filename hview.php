<?php
error_reporting(E_ALL ^ ~E_WARNING); //error reporting

session_start(); // Starting Session
include 'sessions.php'; 
include 'connection.php';
// checking for required files
$adid = $_SESSION['hodlogin_user1'];
$query1 = mysql_query("select * from facultydb where adid='$adid' AND desg ='hod'", $connection);
    while($row1 = mysql_fetch_assoc($query1))
      {
        $fname = $row1['fname'];
        $mailid = $row1['mailid'];
        $pno=$row1['pno'];
        $class = $row1['class'];
        $section = $row1['section'];
      }   
     

$query2 = mysql_query("select * from allfacultydb where adid='$adid' ", $connection);
    while($row2 = mysql_fetch_assoc($query2))
      {
        $class = $row2['class'];
        $section = $row2['section'];
      }   
     
$query3 = mysql_query("select DISTINCT(datea) from fdbsubmitdb ", $connection);
    while($row3 = mysql_fetch_assoc($query3))
      {
        $date= $row3['datea'];
      }   
     
$query = "SELECT DISTINCT * FROM studentacademicsdb";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOD View</title>
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
    <div class="col-sm-12">
      <a type="submit" class="btn btn-default" href="sess/logout.php">LOGOUT</a>
      <h3>HELLO! <?php echo $hname;?></h3>
      <img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
      <h5>HOD Name <?php echo $fname;?> </h5>
      <h5>Adhaar Card No. <?php echo $adid;?></h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-6">
      <p style="font-size: 30px">Class: <?php echo $class;?></p>
    </div>
    <div class="col-sm-6">
      <p style="font-size: 30px">Section: <?php echo $section;?></h5></p> <br>
      </b>
    </div>
  </div>
  
  <hr>
  <div class="row">
    <div class="col-sm-6">
      <div class="well">
        <h2>FEEDBACK</h2>
        <button class="btn btn-success btn-block" onclick="window.location.href='res.php';">SUBMIT</button>
        </form>
      </div>  
    </div>
    <div class="col-sm-6">
      <div class="well">
        <h2>Check Student Messages/Queries</h2>
        <form action="msgs.php" method="post">
        <div class="form-group">

        <div class="col-xs-4">
          <select class="form-control" id="class" name="class" >
            <?php  $query = "SELECT * FROM hodmsg ";
              $result = mysql_query($query) or die(mysql_error()."[".$query."]");
              while ($row = mysql_fetch_array($result))
             {
                echo "<option value=".$row['class'].">".$row['class']."</option>";
              }
            ?>        
          </select>
        </div>
        
        <div class="col-xs-4">
          <select class="form-control" id="section" name="section" >
            <?php $query2 = "SELECT * FROM hodmsg "; 
              $result2 = mysql_query($query2) or die(mysql_error()."[".$query2."]");
                while ($row2 = mysql_fetch_array($result2))
                {
                  echo "<option value=".$row2['section'].">".$row2['section']."</option>";
                }
            ?>     
          </select>
        </div>

        <div class="col-xs-4">
                         <select class="form-control" id="acad_se" name="acad_se">
                       <?php $query4 = "SELECT * FROM hodmsg ";
                         $result4 = mysql_query($query4) or die(mysql_error()."[".$query4."]");
                           while ($row4 = mysql_fetch_array($result4))
                              {
                          echo "<option value=".$row4['acad_se'].">".$row4['acad_se']."</option>";
                                }
                       ?>     
                     </select>
                   <hr>
                </div>

<div class="col-xs-12">
  </h5>
  <select class="form-control" id="datem" name="datem"  >
  <?php $query4 = "SELECT * FROM hodmsg ";
                         $result4 = mysql_query($query4) or die(mysql_error()."[".$query4."]");
                           while ($row4 = mysql_fetch_array($result4))
                              {
                          echo "<option value=".$row4['datem'].">".$row4['datem']."</option>";
                                }
                       ?>     
                   
 </select><hr>
</div>

</div>

<input type="submit" class="btn btn-success btn-block"  value="CHECK">
</form>
    </div>
  </div>

  
  


    
    <div class="row">
  <div class="col-sm-6">

    <div class="well">
    <h2>Faculty List</h2>

 
 
     <form action="faclist.php" method="post">

         <div class="form-group">
 
  
           <div class="col-xs-4">
               <select class="form-control" id="class" name="class" >
                 <?php  $query = "SELECT DISTINCT * FROM allfacultydb";
                       $result = mysql_query($query) or die(mysql_error()."[".$query."]");
                                 while ($row = mysql_fetch_array($result))
                                     {
                                       echo "<option value=".$row['class'].">".$row['class']."</option>";
                                    }
                  ?>        
               </select>
            </div>
          <div class="col-xs-4">
                      <select class="form-control" id="section" name="section" >
                        <?php $query2 = "SELECT DISTINCT * FROM allfacultydb"; 
                          $result2 = mysql_query($query2) or die(mysql_error()."[".$query2."]");
                              while ($row2 = mysql_fetch_array($result2))
                                   {
                                   echo "<option value=".$row2['section'].">".$row2['section']."</option>";
                                  }
                        ?>     
                       </select>
         </div>

                 <div class="col-xs-4">
                         <select class="form-control" id="subject" name="subject">
                           <?php $query3 = "SELECT DISTINCT * FROM allfacultydb";
                              $result3 = mysql_query($query3) or die(mysql_error()."[".$query3."]");
                              while ($row3 = mysql_fetch_array($result3))
                              {
                               echo "<option value=".$row3['subject'].">".$row3['subject']."</option>";
                                  }
                                ?>     
                                </select>
                               <hr>
                </div>

                 <div class="col-xs-12">
                  <select class="form-control" id="acad_se" name="acad_se">
                       <?php $query4 = "SELECT DISTINCT * FROM allfacultydb";
                         $result4 = mysql_query($query4) or die(mysql_error()."[".$query4."]");
                           while ($row4 = mysql_fetch_array($result4))
                              {
                          echo "<option value=".$row4['acad_se'].">".$row4['acad_se']."</option>";
                                }
                       ?>     
                     </select>
                   <hr>
                 </div>

                   <input class="btn btn-success btn-block" value="Submit" type="submit" />
      </form>
</div></div></div>
     <script>
          function some() {
   
         window.location = 'ap.php';
    };

</script>
<script>
function some2() {
   
         window.location = 'mp.php';
    };

</script>

 <div class="col-sm-6">
    <div class="well">
  <h2>Student Performance</h2>

    <button class="btn btn-success btn-block" onclick="some()">By Attendence  </button>
    <hr>
    <button class="btn btn-success btn-block" onclick="some2()">By Marks</button>
</div>
<hr>

</div>
</center><hr>
</body>
</html>
<?php   

mysql_close($connection); ?>