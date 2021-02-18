<?php

/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

 require('../includes/config.php'); 
if(logged_in()) {header('Location: '.DIRADMIN);}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITETITLE;?></title>
<link rel="stylesheet" href="<?php echo DIR;?>style/login.css" type="text/css" />
<link rel="shortcut icon" href="images/icon1.ico">
</head>
<body>
<div class="lwidth">
	<div class="page-wrap">
		<div class="content">
		
		<?php 
		if($_POST['submit']) {
			login($_POST['username'], $_POST['password']);
		}
		?>

<div id="login">
	<p><?php echo messages();?></p>        
	<form method="post" action="">
	<p><label><strong>Username</strong><input type="text" name="username" /></label></p>
	<p><label><strong>Password</strong><input type="password" name="password" /></label></p>
	<p><br /><input type="submit" name="submit" class="button" value="login" /></p>                       
	</form>	  	  
</div>
		
		</div>	
		<div class="clear"></div>		
	</div>
<div class="footer">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>	
</div>
</body>
</html>