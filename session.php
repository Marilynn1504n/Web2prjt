<?php
$connection = mysql_connect("localhost","marilynn","marilynn");
//selecting database
$db = mysql_select_db("web2prjt",$connection);

session_start();

$user_checker = $_SESSION['login_user'];

//SQL QUERY to fetch complete information of user
$ses_sql = mysql_query("SELECT name FROM client WHERE name='$user_checker'",$connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['name'];

if(!isset($login_session)){
	mysql_close($connection);   //closing connection
	header('location:index2.php'); //redireting to main page
}
?>