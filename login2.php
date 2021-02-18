<?php
session_start();   //starting session
$error='';    //variable to store error message
if(isset($_POST['login'])){
	if(empty($_POST['name'])|| empty($_POST['password'])){
		$error ='username or password is invalid';
	}
	else
	{
		$username = $_POST['name'];
		$pass= $_POST['password'];
		
		$connection = mysql_connect("localhost","marilynn","marilynn");
		
		//to protect mysql injection
		$username = stripcslashes($username);
		$pass= stripcslashes($pass);
		$username = mysql_real_escape_string($username);
		$pass = mysql_real_escape_string($pass);
		
		//selecting database
		$db = mysql_select_db("web2prjt",$connection);
		
		//sql query to fetch information of registred users and find user match
		$query = mysql_query("SELECT * FROM client WHERE name = '$username' AND password = '$pass'",$connection);
	    
		$rows = mysql_num_rows($query);
		
		if ($rows == 1){
			
			$_SESSION['login_user'] = $username;   //initializing session
			header ("location:EditWishList.php");   //redirecting to other page
		}
		else {
			//$error ='uername or password is invalid';
			
			header ("location:index2.php");
		}
		mysql_close($connection); //closing connection
		}
		}
		?>
		
		
		
	