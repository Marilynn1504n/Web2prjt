<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('../includes/config.php'); 

if(isset($_POST['submit'])){

	$title = $_POST['pageTitle'];
	$content = $_POST['pageCont'];
	
	$title = mysql_real_escape_string($title);
	$content = mysql_real_escape_string($content);
	
	mysql_query("INSERT INTO pages (pageTitle,pageCont) VALUES ('$title','$content')")or die(mysql_error());
	$_SESSION['success'] = 'Page Added';
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
	<script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script>
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
<p>Title:<br /> <input name="pageTitle" type="text" value="" size="103" /></p>
<p>content<br />
			
			<textarea id="pageCont" name="pageCont" rows="10" cols="80"></textarea>
    </p>
 
<script type="text/javascript">
var editor = CKEDITOR.replace( 'pageCont', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
 
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>