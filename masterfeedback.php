  <?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';

$adid = $_SESSION['slogin_user1'];
$uid = $_SESSION['sid'];
?>


<!DOCTYPE html>
<html>
<head>
<title> Question Master Page  </title>
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
    <div class="well">
      <center><h1>FEEDBACK  QUESTION MASTER</h1></center>
    </div>

    <div class="well">
      <div class="row">
        <center><h2>Questions</h2></center>
        <hr>
        <div class="col-sm-6">
          <ul class="list-group">
		  <?php  $query2 = mysql_query("select fedque,qid from fdqlist ", $connection);
		    while ($row = mysql_fetch_assoc($query2)) {
  $q=$row['fedque'];
			$id=$row['id'];?>
 

            <li class="list-group-item"><?php echo $id; 
			                            echo $q;?></li>
			<?php }?>
      </div>
      
        <div class="col-sm-6">
      <div class="row">  
          <div class="form-group">
            <label for="comment"><h3>Add New Question:</h3></label>
            
			
          <form method="get" action="test.php" enctype="multipart/form-data">
<input type = "text" name = "user_input">
<input type="submit">
</form></div>
<div class="row">           
		  <label for="sel1"><h3>Category:</h3></label>
            <select class="form-control" id="sel1">
              <option>--select--</option>
              <option >1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
			  
			  
			  
			  
			  
			  
            </select>
			</div>
			<div class="row">
			<label for="sel1"><h3>Weightage:</h3></label>
            <select class="form-control" id="sel1">
              <option>--select--</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
		  
        </div>
        <div class="row">
		
     <label form="sel1"><h3>Active/Inactive Question:</h3></label>
     
     
	   <form action="test2.php" method="get">    
           

          
		  <input type = "text" name = "taskOption">
<input type="submit">
        
		  </form>
        </div>
      </div>
    </div>
  </div>
  </div>  
</body>
</html>
<?php   
mysql_close($connection); ?>
