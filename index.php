<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('includes/config.php'); 

?>
<!DOCTYPE>
<html>
<head>
<style>
.p {
border-collapse: collapse;
width: 30%;
border-radius: 25px;
border: 2px solid #3B5166;
padding: 20px;     
}

th, td {
text-align: left;
padding: 5px;}

tr:nth-child(even){background-color: #3B5166}

th {
    background-color: #4CAF50;
    color: white;
}
#myInput {
  
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link rel="shortcut icon" href="images/icon1.ico">
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="wrapper">

	<div id="logo3"><a href="<?php echo DIR;?>"><img src="images/logo3.png" alt="<?php echo SITETITLE;?>" title="<?php echo SITETITLE;?>" border="0" /></a></div><!-- close logo -->
	
	<!-- NAV -->
	<div id="navigation">
	<ul class="menu">
	<li><a href="<?php echo DIR;?>">Home</a></li>
	<?php
		//get the rest of the pages
		$sql = mysql_query("SELECT * FROM pages WHERE isRoot='1' ORDER BY pageID");
		while ($row = mysql_fetch_object($sql))
		{
			echo "<li><a href=\"".DIR."?p=$row->pageID\">$row->pageTitle</a></li>"; 
		}
	?>
	</ul>
	</div>
	<!-- END NAV -->
	
	<div id="content">
	
	<?php	
	//if no page clicked on load home page default to it of 1
	if(!isset($_GET['p'])){
		//$q = mysql_query("SELECT * FROM pages WHERE pageID='1'");
		header('location: home.php');}
	  else { //load requested page based on the id
		$id = $_GET['p']; //get the requested id
		$id = mysql_real_escape_string($id); //make it safe for database use
		if($id == 2){
		header('location: product.php');}
		
		if($id == 3){
		header('location: trends.php');}
		
		if($id == 4){
		header('location: contact.php');}
		
		if($id == 5){
		header('location: career.php');}
		
		if($id == 6){
		header('location: index2.php');}
		
		
		
		else{
		$q = mysql_query("SELECT * FROM pages WHERE pageID='$id'");}
	}
	
	//get page data from database and create an object
	$r = mysql_fetch_object($q);
	
	//print the pages content
	echo "<h1>$r->pageTitle</h2>";
	echo $r->pageCont;
	
	
	?>
	
	</div><!-- close content div -->

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->


</body>
</html>