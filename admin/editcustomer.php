<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('../includes/config.php'); 

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: '.DIRADMIN); 
}

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$custID = $_POST['id'];
	
	$name = mysql_real_escape_string($name);
	$phone = mysql_real_escape_string($phone);
	$password = mysql_real_escape_string($password);
	
	mysql_query("UPDATE client SET name='$name', phone='$phone', password='$password' WHERE id='$custID'");
	$_SESSION['success'] = 'Customer Updated';
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

<h1>Edit Customer</h1>

<?php
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$q = mysql_query("SELECT * FROM client WHERE id='$id'");
$row = mysql_fetch_object($q);
?>


<form action="" method="post">
<input type="hidden" name="custID" value="<?php echo $row->custID;?>" />
<p>name:<br /> <input name="name" type="text" value="<?php echo $row->name;?>" size="103" />
</p>
<p>phone<br /><input name="phone" type="text" value="<?php echo $row->phone;?>" size="103" />
<p>password<br /><input name="password" type="password" value="<?php echo $row->password;?>" size="103" />
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>