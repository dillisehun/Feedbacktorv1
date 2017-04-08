<?php error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';


$adid = $_SESSION['hodlogin_user1'];
$q1=1;
$q2=2;
$q3=3;
$q4=4;
$q5=3;
$q6=2;
$q7=4;
$q8=5;
$s=0;

    $query1 = mysql_query("select * from fdqlist ", $connection);
    $c = mysql_query("select count(*) from fdqlist ", $connection);
    echo $c;
 $j=1;   
 while($row1= mysql_fetch_assoc($query1))
{


    $wt= $row1['weight'];
    $t=($q.$j)*$wt;
    $s=$s+$t;
    $j=$j+1;

  }   
 
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>SUPER ADMIN RESULT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(mylineChart);

      function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'FEEDBACK');
      data.addColumn('number', 'ACADEMIC SECTION');
    

      data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  25.4],
        [4,  11.7],
        [5,  11.9],
        [6,   8.8],
        [7,   7.6],
        [8,  12.3],
       
      ]);

      var options = {
        chart: {
          title: 'Feedback report between academic section and average mean',
          subtitle: ''
        },
        width: 500,
        height: 300,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top'));
      chart.draw(data, options);
    }

    function mylineChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'FEEDBACK');
      data.addColumn('number', 'ACADEMIC SECTION');
    

        data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  25.4],
        [4,  11.7],
        [5,  11.9],
        [6,   8.8],
        [7,   7.6],
        [8,  12.3],
       
      ]);
      var options = {
        chart: {
          title: 'Feedback report between academic section and average mean',
          subtitle: ''
        },
        width: 500,
        height: 300,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>

<div class="container">
      <div class="panel panel-primary">
      <div class="panel-heading">PRINCIPLE REPORT</div>
      <div class="panel-body">
    

  
  <div class="row"><DIV CLASS="WELL">
    <div class="col-sm-6" style="background-color:lavender;"><table class="table table-striped">
    <thead>
      <tr>
        <th>CRITERIA</th>
        <th>Percentage</th>
      
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>q1</td>
        <td>%</td>
      </tr>
      <tr>
        <td>q2</td>
        <td>%</td>
      </tr>
      <tr>
        <td>q3</td>
        <td>%</td>
<tr>
        <td>q4</td>
        <td>%</td>
      </tr>
      <tr>
        <td>q5</td>
        <td>%</td>
      </tr>
      <tr>
        <td>q6</td>
        <td>%</td>
<tr>
        <td>q7</td>
        <td>%</td>
      </tr>
      <tr>
        <td>q8</td>
        <td>%</td>
      </tr>
    </tbody>
  </table></div></DIV>
  <div class="col-sm-6">
  <div class="panel panel-primary">
      <div class="panel-heading">RESULT</div>
      <div class="panel-body"><div class="col-sm-6" id="line_top_x" ></div>
    </div>
  </div>

    
       </div>
</div>
  
<hr>
<div class="row">
  <div class="col-sm-6">
  <div class="panel panel-primary">
      <div class="panel-heading">RESULT</div>
      <div class="panel-body"><div class="col-sm-6" id="line_top" ></div>
    </div>
  </div>
</div>
      
    
  </div></div>
</div></div>
</body>
</html>
