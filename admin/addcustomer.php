<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('../includes/config.php'); 



if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$family = $_POST['family'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	
	
	
	$name = mysql_real_escape_string($name);
	$family = mysql_real_escape_string($family);
	$phone = mysql_real_escape_string($phone);
	$password = mysql_real_escape_string($password);
	
	
	mysql_query("INSERT INTO client (name,family,phone,password) VALUES ('$name','$family','$phone','$password')")or die(mysql_error());
	$_SESSION['success'] = 'Customer Added';
	header('Location: '.DIRADMIN);
	exit();

}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/icon1.ico">
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
</head>
<body>
<div id="wrapper">

<div id="logo3"><a href="<?php echo DIR;?>"><img src="images/logo3.png" alt="<?php echo SITETITLE;?>" title="<?php echo SITETITLE;?>" border="0" /></a></div><!-- close logo -->

<!-- NAV -->
<div id="navigation">
<ul class="menu">
<li><a href="<?php echo DIRADMIN;?>">Admin</a></li>
<li><a href="<?php echo DIRADMIN;?>?logout">Logout</a></li>
<li><a href="<?php echo DIR;?>" target="_blank">View Website</a></li>
</ul>
</div>
<!-- END NAV -->

<div id="content">

<h1>Add Customer</h1>

<form action="" method="post">
<p>name:<br /> <input name="name" type="text" value="" size="103" /></p>
<p>family name<br /><input name="family" type="text" value="" size="103" /></p>
<p>phone:<br /> <input name="name" type="text" value="" size="103" /></p>			
<p>password:<br /> <input name="name" type="password" value="" size="103" /></p>		
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>