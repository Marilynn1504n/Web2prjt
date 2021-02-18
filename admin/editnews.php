<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('../includes/config.php'); 

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: '.DIRADMIN); 
}

if(isset($_POST['submit'])){
	
    $newsID = $_POST['newsID'];
	$title = $_POST['Newstitle'];
	$text = $_POST['Newstext'];
	$date = $_POST['Newsdate'];
	
	$title = mysql_real_escape_string($title);
	$text = mysql_real_escape_string($text);
	$date = mysql_real_escape_string($date);
	
	mysql_query("UPDATE news SET Newstitle='$title',Newstext='$text', Newsdate='$date' WHERE newsID='$newsID'");
	$_SESSION['success'] = 'News Updated';
	header('Location: '.DIRADMIN);
	exit();

}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/icon1.ico">
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

<h1>Edit News</h1>

<?php
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$q = mysql_query("SELECT * FROM news WHERE newsID='$id'");
$row = mysql_fetch_object($q);
?>


<form action="" method="post">
<p>Title:<br /> <input name="Newstitle" type="text" value="<?php echo $row->Newstitle;?>" size="103" /></p>

<p>Newstext<br />
  <textarea rows="4" cols="50" name="Newstext"><?php echo $row->Newstext;?></textarea>
 
<p>date<br /><input name="Newsdate" type="date" size="13" value="<?php echo $row->Newsdate;?>"/></p>

<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>
</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>