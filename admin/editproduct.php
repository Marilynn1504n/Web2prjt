<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('../includes/config.php'); 

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: '.DIRADMIN); 
}

if(isset($_POST['submit'])){
	
    $prodID = $_POST['id'];
	$name = $_POST['Prodname'];
	$image = $_POST['Prodimg'];
	$price = $_POST['Prodprice'];
	$quantity = $_POST['Prodqty'];
	$level = $_POST['Level'];
	
	
	$name = mysql_real_escape_string($name);
	$image = mysql_real_escape_string($image);
	$price = mysql_real_escape_string($price);
	$quantity = mysql_real_escape_String((int)$quantity);
	$level = mysql_real_escape_string($level);
	
	mysql_query("UPDATE product SET Prodname='$name',Prodimg='$image',Prodqty='$quantity',Level='$level' WHERE id='$prodID'");
	$_SESSION['success'] = 'product Updated';
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<link rel="shortcut icon" href="images/icon1.ico">
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

<h1>Edit Product</h1>

<?php
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$q = mysql_query("SELECT * FROM product WHERE id='$id'");
$row = mysql_fetch_object($q);
?>


<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<p>Title:<br /> <input name="Prodname" type="text" value="<?php echo $row->Prodname;?>" size="103" />
</p>
<p>content<br /><textarea id="Prodimg" name="Prodimg" cols="100" rows="20"><?php echo $row->Prodimg;?></textarea>
</p>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'Prodimg', {
    filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>

  
 
<p>Price per night<br /><input name="Prodprice" type="text" value="<?php echo $row->Prodprice;?>" size="13" /></p>

<p>Number of bed<br /><input name="Prodqty" type="text" value="<?php echo $row->Prodqty;?>" size="13" /></p>

  <p>level<br /><select name="Level">
  <option value="level1">level1</option>
  <option value="level2">level2</option>
  <option value="level3">level3</option>
  <option value="level4">level4</option>
  <option value="level5">level5</option>
  </select> 

<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>