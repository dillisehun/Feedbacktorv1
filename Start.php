<?php
error_reporting(E_ALL ^ ~E_WARNING);
session_start();
include 'sessions.php';
 include 'connection.php';
 // Starting Session
// Define $username and $password
$adid=$_SESSION['alogin_user1'];
$class=$_POST['class'];
$section=$_POST['section'];
$acad_se=$_POST['acad_se'];

$query = mysql_query("update studentacademicsdb set flagfdb=0 where class='$class' AND section='$section' AND acad_se='$acad_se'  ", $connection);
$query10 = mysql_query("select * from allfacultydb where class='$class' AND section='$section' AND acad_se='$acad_se'   ", $connection);

$query3 = mysql_query("select count(*) as total from fdqlist where enddate is NULL AND qactive = 0   ", $connection);
$result = mysql_fetch_assoc($query3);
$total = $result['total'];
while($row10 = mysql_fetch_array($query10)) {
     $rest = substr($row10['subject'],0,2); 
        $classid = $acad_se.'_'.$class.'_'.$section.'_'.$rest;
        $classid = strtoupper($classid);
 for($i=1;$i<=$total;$i++){
$qid = $i;
$query2=mysql_query("insert into feedbackdb(qid,classid,feedback,datem) values('$qid','$classid','0',now())", $connection);
}}
if($query2)
{	header('Location: aview.php');
mysql_close($connection); // Closing Connection
}
else
echo "Error in Starting Feedback";

?>