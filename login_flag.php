<?php
error_reporting(E_ALL ^ ~E_WARNING);
session_start(); // Starting Session
include('session.php');
include('connection.php');
$sno = $_POST['sno'];
$qno = $_POST['qno'];
$classid = $_POST['classid'];
$adid = $_SESSION['adid'];
$class = $_SESSION['class'];
$section = $_SESSION['section'];
$acad_se = $_SESSION['acad_se'];
/*for ($i = 1; $i<=$sno; $i++)
{
$fname = $name.$i =$_POST['fname'.$i];
echo $fname;
for ($j = 1; $j<=$qno; $j++)
{
	$n = $i * $j;
	echo $n;
$t.$i.$q.$n=$_POST['t'.$i.'q'.$j];
echo $q.$n;

}
$total = $q.$n;
*/$datea=date("d/m/y");
for ($i=1; $i <=$sno ; $i++) { 
	$sum=0;
$z=0;

	# code...
for ($j=1; $j <=$qno ; $j++) { 
	# code...
if(isset($_POST['t'.$i.'q'.$j]))
{ 
	$temp = $_POST['t'.$i.'q'.$j];
	if($temp==1)
	{
		$question = $temp +1;
	}
	else if($temp==2)
	{
		$question = $temp+2;
	}
	else if($temp==3)
	{
		$question = $temp +3;
	}
	else if($temp==4)
	{
		$question = $temp +4;
	}
	else
	{
	 	$question = $temp+5;	
	}

$z=$question;
}
$sum=$sum+$z;
}mysql_query("update feedbackdb set feedback='$sum' where qid='$j' and classid='$classid", $connection);

}
}}




$rating = 0;
for ($j=1; $j <=12 ; $j++) { 

if ( $_POST['com'.$j] > 6) {
	# code...
$rating = $rating -1;

}
else
	$rating = $rating +1;

}


mysql_query("update ratingdb set rating='$rating' where classid='$classid", $connection);
$query = mysql_query("update studentacademicsdb set flagfdb=1 where adid='$adid'", $connection);
$query2 = mysql_query("update allfacultydb set flagfdb=1 where  AND acad_se='$acad_se' AND section='$section'", $connection);

if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
mysql_close($connection); // Closing Connection*/
?>