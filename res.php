<!DOCTYPE html>
<html lang="en">
<head>
  <title>Feedback Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <div class="well">
  	<center>
  	 <h1>FEEDBACK RESULT</h1><hr>
    </center> 
  </div>

  <div class="well well-lg">
  	<div class="row">
      
      <div class="col-sm-4">
        <center>
          <h3>Acad. Session: </h3>
          <h3>Feedback Date:</h3>
        </center>
      </div>
      
      <div class="col-sm-4">
        <center>
          <img src="img/sample.jpg" class="img-circle" alt="Cinque Terre" width="200" height="200"/>
          <hr>
          <b>TEACHER NAME!<b>
        </center>
      </div>

      <div class="col-sm-4">
        <center>
          <h3>Class:</h3>
          <h3>Section: </h3>
        </center>
      </div>
   
    </div>
  </div>

  <div class="well well-lg">  
    <div class="row">
  		<center><h3>Select the details you want FEEDBACK for:</h3></center>
  	</div>
  	<hr>
  	<div class="row">
  		<div class="col-sm-2">
  		<div class="form-group">
  			<label for="sel1">CLASS:</label>
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
    			<option>9</option>
    			<option>10</option>
    			<option>11</option>
    			<option>12</option>
    			<option>ALL</option>
  			</select>
		</div>
		</div>

		<div class="col-sm-2">
		<div class="form-group">
  			<label for="sel1">SECTION:</label>
  			<select class="form-control" id="sel1">
    			<option>--select--</option>
    			<option>A</option>
    			<option>B</option>
    			<option>C</option>
    			<option>D</option>
    			<option>ALL</option>
  			</select>
		</div>
		</div>

		<div class="col-sm-2">
		<div class="form-group">
  			<label for="sel1">ACC. SESSION:</label>
  			<select class="form-control" id="sel1">
    			<option>--select--</option>
    			<option>2015-16</option>
    			<option>2016-17</option>
    			<option>2017-18</option>
    			<option>2018-19</option>
    			<option>2019-20</option>
  			</select>
		</div>
		</div>

		<div class="col-sm-2">
		<div class="form-group">
  			<label for="sel1">SUBJECT:</label>
  			<select class="form-control" id="sel1">  			
    			<option>--select--</option>
    			<option>ENGLISH</option>
    			<option>HINDI</option>
    			<option>MATHS</option>
    			<option>SCIENCE</option>
    			<option>SOCIAL STUDIES</option>
  			</select>
		</div>
		</div>

		<div class="col-sm-2">
		<div class="form-group">
  			<label for="sel1">DATE:</label>
  			<select class="form-control" id="sel1">
    			<option>--select--</option>
    			<option></option>
    			<option></option>
    			<option></option>
    			<option></option>
    			<option></option>
  			</select>
		</div>
		</div>

		<div class="col-sm-2">
		<div class="form-group">
  			<label for="sel1">FACULTY:</label>
  			<select class="form-control" id="sel1">
    			<option>--select--</option>
    			<option>SATISH</option>
    			<option>VIVEK</option>
    			<option>DEEPAK</option>
    			<option>CHETAN</option>
    			<option>VISHAL</option>
    			<option>SHIVAM</option>
  			</select>
		</div>
		</div>						
	</div>
	<hr>
	<div class="row">
			<center>
			<a href="#" class="btn btn-info btn-block" role="button">SUBMIT</a>
			</center>
	</div>
	  </div>

   <div class="col-sm-12">
      <div class="well">
        <center>
          <h1>Report</h1>
           <div ><p>
            <center>We have concluded that Anil sharma needs to work on Maths and He is better at English. Where Chetan Sharma has Continously maintained his progress.
            <br/>Also Karuna Lochab and Deepak Gangwani needs to work on Practical Examples as well as Study Resources Properly. </center> 
           </p></div>
        </center>      
      </div>
    </div>

 <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">
 // Load Charts and the corechart package.
     google.charts.load('current', {'packages':['bar','gauge','corechart','table']});
    
     google.charts.setOnLoadCallback(drawbar);
     
     google.charts.setOnLoadCallback(drawdnChart);

     google.charts.setOnLoadCallback(mypieChart);

     google.charts.setOnLoadCallback(myTable);
      function drawbar() {
        var data = google.visualization.arrayToDataTable([
          ['year', 'marks','attendence','class'],
          ['2016-17', 70,65,11]
         
         
        ]);

        var options = {
          chart: {
            title: 'Feedback Results Yearly Subject Wise',
            subtitle: 'Session 2016-17 ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('mybarchart'));

        chart.draw(data, options);
      }


 
    

      function drawdnChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Maths - 10A', 100],
          ['Science - 9B', 70],
          ['Maths - 9C', 60],
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('mydynamicchart'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
function myTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Names');
        data.addColumn('number', '');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
          ['Mike',  {v: 10000, f: '$10,000'}, true],
          ['Jim',   {v:8000,   f: '$8,000'},  false],
          ['Alice', {v: 12500, f: '$12,500'}, true],
          ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('tablec'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
      function mypieChart() {

        var data = google.visualization.arrayToDataTable([
          ['Teachers', 'English Subject'],
          ['Anil Sharma',     11],
          ['Karuna Lochab',      2],
          ['Chetan Sharma',  2],
          ['Deepak Gangwani', 2],
          ['Vivek Mudgal',    7]
        ]);

        var options = {
          title: 'Faculty Results'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piec'));

        chart.draw(data, options);
      }
    </script>
  <div class="row">
    <div class="col-sm-6">
      <div class="well">
        <center>
          <h1>Results in Different Subjects</h1>
          <div id="mybarchart" style="width: 400px; height: 400px;"></div>
        </center>      
      </div>
    </div>

    <div class="col-sm-6">
      <div class="well">
        <center>
          <h1>Results in Different Subjects</h1>
          <div id="piec" style="width: 400px; height: 400px;"></div>
        </center>      
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="well">
        <center>
          <h1>RESULTS IN Dynamic Form</h1>
          <div id="mydynamicchart" style="width: 400px; height: 120px;"></div>
        </center>      
      </div>
    </div>

    <div class="col-sm-6">
      <div class="well">
        <center>
          <h1>Top 5 Teachers</h1>
           <div id="tablec"></div>
        </center>      
      </div>
    </div>

  </div>  	
</div>


</body>
</html>




