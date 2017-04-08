
  <?php  $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $prefix = "";
    $mysql_database="schooldb";
		
    $connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
// To protect MySQL injection for Security purpose
	$db = mysql_select_db($mysql_database, $connection);
	
// SQL query to fetch information of registerd users and finds user match.
?>