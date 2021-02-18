<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('../includes/config.php'); 

if(isset($_POST['submit'])){

	$name = $_POST['Vacname'];
	$desc = $_POST['Vacdesc'];
	$shift = $_POST['Vacshift'];
	
	$name = mysql_real_escape_string($name);
	$desc = mysql_real_escape_string($desc);
	$shift = mysql_real_escape_string($shift);
	
	
	mysql_query("INSERT INTO vacancy (Vacname,Vacdesc,Vacshift) VALUES ('$name','$desc','$shift')")or die(mysql_error());
	$_SESSION['success'] = 'Vacancy Added';
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

<h1>Add Page</h1>

<form action="" method="post">
<p>name:<br /> <input name="Vacname" type="text" value="" size="103" /></p>
<p>desc:<br /> <input name="Vacdesc" type="text" value="" size="103" /></p>
<p>shift:<br /> <input name="Vacshift" type="text" value="" size="103" /></p>

 
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>