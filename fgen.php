  <?php
error_reporting(E_ALL ^ ~E_WARNING);

session_start(); // Starting Session
include 'sessions.php';
include 'connection.php';

$adid = $_SESSION['slogin_user1'];
    $query1 = mysql_query("select * from studentacademicsdb where adid='$adid' ", $connection);
      
    while($row1 = mysql_fetch_assoc($query1))
{
    $class = $row1['class'];
     $acad_se = $row1['acad_se'];
      $section=$row1['section'];
  }
  $query8 = mysql_query(" select count(*) as total from allfacultydb where class='$class' and acad_se='$acad_se' and section='$section'" ,$connection);
$tno = mysql_fetch_assoc($query8);

   $query2 = mysql_query("select * from studentdb", $connection);
    while($row2 = mysql_fetch_assoc($query2))
{
    $sname = $row2['sname'];
     }   
     

?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback Form </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!--//webfonts-->
<!--webstyle-->
<script>
function submi()
{
var r=confirm("Are you sure you want to Submit?");
  if(r == true){
   return true;
  }else{
   return false;
  }}
  </script>
<!--webstyle-->
</head>
<style>
label > input{
  visibility: hidden;
  position: absolute;
}
label > input + img{
  cursor: pointer;
  border:2px solid transparent;
}
label > input:checked + img{
  border: 2px solid #000;
}
<style>
/* https://gist.github.com/toddparker/32fc9647ecc56ef2b38a */

/* Some basic page styles */
body {
  font:  AvenirNext-Regular, Corbel, "Lucida Grande", "Trebuchet Ms", sans-serif;
  color: #111; 
  background-color: #fff;
  margin: 2em 10%
}

/* Label styles: style as needed */
label {
  display:block;
  margin: 2em 1em .25em .75em;
  color:#333;
}

/* Container used for styling the custom select, the buttom class adds the bg gradient, corners, etc. */
.dropdown {
  position: relative;
  display:block;
  margin-top:0.5em;
  padding:0;
}

/* This is the native select, we're making everything the text invisible so we can see the button styles in the wrapper */
.dropdown select {
  width:100%;
  margin:0;
  background:none;
  border: 1px solid transparent;
  outline: none;
  /* Prefixed box-sizing rules necessary for older browsers */
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  /* Remove select styling */
  appearance: none;
  -webkit-appearance: none;
  /* Magic font size number to prevent iOS text zoom */
  font-size:1.25em;
  /* General select styles: change as needed */
  /* font-weight: bold; */
  color: #444;
  padding: .6em 1.9em .5em .8em;
  line-height:1.3;
}
.dropdown select,
label {
  font-family: AvenirNextCondensed-DemiBold, Corbel, "Lucida Grande","Trebuchet Ms", sans-serif;
}

/* Custom arrow sits on top of the select - could be an image, SVG, icon font, etc. or the arrow could just baked into the bg image on the select */

.dropdown::after {
  content: "";
  position: absolute;
  width: 9px;
  height: 8px;
  top: 50%;
  right: 1em;
  margin-top:-4px;
  z-index: 2;
  background: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12'%3E%3Cpolygon fill='rgb(102,102,102)' points='8,12 0,0 16,0'/%3E%3C/svg%3E") 0 0 no-repeat;  
  /* These hacks make the select behind the arrow clickable in some browsers */
  pointer-events:none;
}

/* This hides native dropdown button arrow in IE 10/11+ so it will have the custom appearance, IE 9 and earlier get a native select */
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .dropdown select::-ms-expand {
    display: none;
  }
  /* Removes the odd blue bg color behind the text in IE 10/11 and sets the text to match the focus style text */
  select:focus::-ms-value {
    background: transparent;
    color: #222;
  }
}

/* Firefox >= 2 -- Older versions of FF (v2 - 6) won't let us hide the native select arrow, so we'll just hide the custom icon and go with native styling */
/* Show only the native arrow */
body:last-child .dropdown::after, x:-moz-any-link {
  display: none;
}
/* reduce padding */
body:last-child .dropdown select, x:-moz-any-link {
  padding-right: .8em;
}

/* Firefox 7+ -- Will let us hide the arrow, but inconsistently (see FF 30 comment below). We've found the simplest way to hide the native styling in FF is to make the select bigger than its container. */
/* The specific FF selector used below successfully overrides the previous rule that turns off the custom icon; other FF hacky selectors we tried, like `*>.dropdown::after`, did not undo the previous rule */

/* Set overflow:hidden on the wrapper to clip the native select's arrow, this clips hte outline too so focus styles are less than ideal in FF */
_::-moz-progress-bar, body:last-child .dropdown {
  overflow: hidden;
}
/* Show only the custom icon */
_::-moz-progress-bar, body:last-child .dropdown:after {
  display: block;
}
_::-moz-progress-bar, body:last-child .dropdown select {
  /* increase padding to make room for menu icon */
  padding-right: 1.9em;
  /* `window` appearance with these text-indent and text-overflow values will hide the arrow FF up to v30 */
  -moz-appearance: window;
  text-indent: 0.01px;
  text-overflow: "";
  /* for FF 30+ on Windows 8, we need to make the select a bit longer to hide the native arrow */
  width: 110%;
}

/* At first we tried the following rule to hide the native select arrow in Firefox 30+ in Windows 8, but we'd rather simplify the CSS and widen the select for all versions of FF since this is a recurring issue in that browser */
/* @supports (-moz-appearance:meterbar) and (background-blend-mode:difference,normal) {
.dropdown select { width:110%; }
}   */


/* Firefox 7+ focus style - This works around the issue that -moz-appearance: window kills the normal select focus. Using semi-opaque because outline doesn't handle rounded corners */
_::-moz-progress-bar, body:last-child .dropdown select:focus {
  outline: 2px solid rgba(180,222,250, .7);
}


/* Opera - Pre-Blink nix the custom arrow, go with a native select button */
x:-o-prefocus, .dropdown::after {
  display:none;
}


/* Hover style */
.dropdown:hover {
  border:1px solid #888;
}

/* Focus style */
select:focus {
  outline:none;
  box-shadow: 0 0 1px 3px rgba(180,222,250, 1);
  background-color:transparent;
  color: #222;
  border:1px solid #aaa;
}


/* Firefox focus has odd artifacts around the text, this kills that */
select:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #000;
}

option {
  font-weight:normal;
}


/* These are just demo button-y styles, style as you like */
.button {
  border: 1px solid #bbb;
  border-radius: .3em;
  box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
  background: #f3f3f3; /* Old browsers */
  background: -moz-linear-gradient(top, #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #ffffff 0%,#e5e5e5 100%); /* IE10+ */
  background: linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%); /* W3C */
}

.colors1 {
  color: #fff;
  display: none;
  
}
.colors2 {
  color: #fff;
  display: none;

}
.colors3 {
  color: #fff;
  display: none;
}
.colors4 {
  color: #fff;
  display: none;
}

a {
  color: #c04;
  text-decoration: none;
}

a:hover {
  color: #903;
  text-decoration: underline;
}</style>

</style>
<body>
<div class="container">
  <center>  
    <font size="20px" color="#464646" class="text-info">&nbsp &nbsp Feedback System</font><br/>
    &nbsp &nbsp <!-- <img src="images/cross.jpg" width="150px" height="150px"/></h1> -->
  </center>

    
  <div class="well">
    <div class="row2">
      <center>  
        <label >  
          <H3 id="welcome" class="text-success">Welcome : <?php echo $sname; ?></H3>
          <br/></center><hr>
          <div class="col-sm-4"><h4 class="text-warning">Class:<?php echo $class; ?> </h4></div>
          <div class="col-sm-4"><h4 class="text-warning">Section:<?php echo $section; ?> </h4></div>
          <div class="col-sm-4"><h4 class="text-warning">Acad. Session:<?php echo $acad_se; ?> </h4></div>
          </br><center><hr>
          <a href="logout.php" class="btn-lg btn-success" >Log Out</a></center>
        </label >
      
    </div>
      
  </div>
<div class="container">

<form action="login_flag.php" method="post">
      <h3 class="text-success">Please Submit Your Feedback Sincerely</h3>
       <div class="table-responsive">
        <table  class="table">

      <caption>
          <h3 class="text-warning">Rate the following questions according To your satisfaction Level</h3>
        <h4 class="text-warning">(5 is highest rating and 1 is lowest rating)</h4>
<h4>
        <script>

$(function() {
  $('#t1q1').change(function(){
    $('.colors1').hide();
    $('#' + $(this).val()).show();
  });
});

$(function() {
  $('#t2q1').change(function(){
    $('.colors2').hide();
    $('#' + $(this).val()).show();
  });
});

$(function() {
  $('#t1q2').change(function(){
    $('.colors3').hide();
    $('#' + $(this).val()).show();
  });
});

$(function() {
  $('#t2q2').change(function(){
    $('.colors4').hide();
    $('#' + $(this).val()).show();
  });
});

</script>
</h4>
      </caption>
    
      <thead>
      <tr class="success">
      <th>Sno</th>
        <th>Feedback Criteria</th>
        <?php
$tno =1;
 $query5 = mysql_query(" select * from allfacultydb where class='$class' and acad_se='$acad_se' and section='$section'" ,$connection);
while($tlist = mysql_fetch_array($query5))
        { 

          echo'<th>';
          echo $tno.'.'.strtoupper($tlist['fname']);
          echo '(';
          echo $tlist['subject'];
          echo ')';
          echo'</th>';
       $tno = $tno +1;} 
       ?>

      </tr>
    </thead>
<tbody >
  
         <?php
         $cno = 1;
         $queryqw  = mysql_query("select * from fdqlist where qactive=0 AND enddate is NULL ",$connection);
         while($rows = mysql_fetch_array($queryqw))
         { echo'<tr class="info">
<td class="danger">';
echo $cno.'</td>
          <td class="danger">';
          echo $rows['fedque'].'(Points:'.$rows['weightage'].')</td>
         ';
for($i=1;$i<$tno;$i++){
echo '<td><div class="button dropdown"> 
  <select id="t'.$i.'q'.$cno.'" name="t'.$i.'q'.$cno.'" required>
     <option selected disabled>Marks</option>
     <option value="1" >1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
  </select>
</div></td>';}
 
     echo'</tr>

';
  $cno = $cno +1;
}
?>

        </tr>
        
      </tr>
    </tbody>
  </table>
    </div>
    <div class="well">
   <div id="1" class="colors1 1"> <img src="img/w.png" style="width: 50px; height: : 50px; " class="img-circle"  />+</div>
  <div id="2" class="colors1 2">  <img src="img/ns.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="3" class="colors1 3">  <img src="img/s.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="4" class="colors1 4">  <img src="img/g.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="5" class="colors1 5">  <img src="img/vg.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>

  <div id="1" class="colors2 1"> <img src="img/w.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="2" class="colors2 2">  <img src="img/ns.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="3" class="colors2 3">  <img src="img/s.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="4" class="colors2 4">  <img src="img/g.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="5" class="colors2 5">  <img src="img/vg.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>

  <div id="1" class="colors3 1"> <img src="img/w.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="2" class="colors3 2">  <img src="img/ns.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="3" class="colors3 3">  <img src="img/s.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="4" class="colors3 4">  <img src="img/g.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="5" class="colors3 5">  <img src="img/vg.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>

  <div id="1" class="colors4 1"> <img src="img/w.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="2" class="colors4 2">  <img src="img/ns.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="3" class="colors4 3">  <img src="img/s.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="4" class="colors4 4">  <img src="img/g.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div>
  <div id="5" class="colors4 5">  <img src="img/vg.png" style="width: 50px; height: : 50px; " class="img-circle" />+</div> 
</div>

    </div>
  <div class="row">
    <center>
    
    <div class="col-xs-12">
      <h3 class="text-warning">Principal Judgement Criteria:</h3>
              <?php
         $mno = 1;
         
         $queryrw  = mysql_query("select * from ratingdb  ",$connection);
         while($rowss = mysql_fetch_array($queryrw))
{
    echo'  <div class="col-xs-4">
    
    <div class="form-group" >
    <label for="mat'.$mno.'"> '.$rowss['rlist'].'(Points:'.$rowss['weightage'].')</label>';
     $queryf = mysql_query(" select * from allfacultydb where class='$class' and acad_se='$acad_se' and section='$section'" ,$connection);
      while($rowsss = mysql_fetch_array($queryf))
{
 echo'<input type="checkbox" name="rate" />'.strtoupper($rowsss['fname']).'('.$rowsss['subject'].')'.'<br>';
 }     
  echo ' </div>  
    </div>';
}    ?>
    </div>
   </center> 
  </div></div>
  </div>


</form>
      
  </div>

  

<hr>
  <div class="well">
    <center>
        <input type="submit" class="btn-lg btn-success" onclick="return submi();" value="Submit" >
    </center>
  </div>
</body>
</html>

<?php   

mysql_close($connection); ?>
