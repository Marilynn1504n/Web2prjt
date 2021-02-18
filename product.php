<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php');

if(isset($_POST["search"])){
	$ValueSearch = $_POST['value'];
	$query = "SELECT * FROM `product` WHERE CONCAT(`Prodname`, `Prodprice`, `Prodqty`,`level`) LIKE '%".$ValueSearch."%' ";
	$SearchResult = filtertable($query);
}
else {
	$query= "SELECT * FROM product";
	$SearchResult = filtertable($query);
}

function filtertable($query){
	$username ="marilynn";
	$password ="marilynn";
	$database ="web2prjt";
	$connect = mysqli_connect("localhost",$username,$password,$database);
	$filter_Result = mysqli_query($connect,$query);
	return $filter_Result;
}
 

?>	
	


<!DOCTYPE html>
<html>
<head>
<style>
div.divise{
    margin: 5px;
    float: left;
    width: 300px;
	
}
#login {color:#B5B5B5  ; font-size:25px;}
select[name="value"] {
    background: #B50049  ;
	border :1 px solid #B50049  ;
	color:white;
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #B50049  ;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}


#myBtn:hover {
  background-color: #D3D3D3;
}

</style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo SITETITLE;?></title>
<link rel="shortcut icon" href="images/icon1.ico">
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
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
	<button onclick="topFunction()" id="myBtn" title="Go to top">back to Top</button>
	<form action="product.php" method="POST">
	<p id="login"><strong>view by Level</strong></p>
   <select name ='value'>
  <option value="">all</option>
  <option value="level1">level1</option>
  <option value="level2">level2</option>
  <option value="level3">level3</option>
  <option value="level4">level4</option>
  <option value="level5">level4</option>
   </select>
<input type="submit" name="search" value="search">
<br/>



<?php  

while($row = mysqli_fetch_array($SearchResult)){   ?>
	<!-- echo out the contents of each row into a table-->
               	<div class="divise">
				
				<div style="border:1px solid #B50049  ;background-color:#CCCCCC   ;border-radius:5px;padding:16px; height:380px" align="center">
				<h4><?php echo $row['Prodimg'];?></h4><br/>
				<h4 class="text-info"><?php echo $row["Prodname"];?></h4>
				<h4 class="text-danger">LL<?php echo $row["Prodprice"];?></h4>
				<h4 class="text-info">number of bed: <?php echo $row["Prodqty"];?></h4>
				<h4 class="text-info">level :<?php echo $row["Level"];?></h4>
				</div>
				</div>
				
				<?php } ?>	

</form>
	
    </div><!-- close content div -->

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>