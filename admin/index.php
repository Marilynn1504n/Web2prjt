<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('../includes/config.php'); 

//make sure user is logged in, function will redirect use if not logged in
login_required();

//if logout has been clicked run the logout function which will destroy any active sessions and redirect to the login page
if(isset($_GET['logout'])){
	logout();
}

//run if a page deletion has been requested
if(isset($_GET['delpage'])){
		
	$delpage = $_GET['delpage'];
	$delpage = mysql_real_escape_string($delpage);
	$sql = mysql_query("DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delProd'])){
		
	$delProd = $_GET['delProd'];
	$delProd = mysql_real_escape_string($delProd);
	$sql = mysql_query("DELETE FROM product WHERE id = '$delProd'");
    $_SESSION['success'] = "Product Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delCust'])){
		
	$delCust = $_GET['delCust'];
	$delCust = mysql_real_escape_string($delCust);
	$sql = mysql_query("DELETE FROM wishers WHERE id = '$delCust'");
    $_SESSION['success'] = "Customer Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delvac'])){
		
	$delvac = $_GET['delvac'];
	$delvac = mysql_real_escape_string($delvac);
	$sql = mysql_query("DELETE FROM Vacancy WHERE vacID = '$delvac'");
    $_SESSION['success'] = "Vacancy Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delnews'])){
		
	$delnews = $_GET['delnews'];
	$delnews = mysql_real_escape_string($delnews);
	$sql = mysql_query("DELETE FROM news WHERE newsID = '$delnews'");
    $_SESSION['success'] = "News Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delr'])){
		
	$delr = $_GET['delr'];
	$delwish = mysql_real_escape_string($delr);
	$sql = mysql_query("DELETE FROM recruitment WHERE rID = '$delr'");
    $_SESSION['success'] = "CV Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}
if(isset($_GET['delw'])){
		
	$delw = $_GET['delw'];
	$delwish = mysql_real_escape_string($delw);
	$sql = mysql_query("DELETE FROM reservation WHERE cartID = '$delw'");
    $_SESSION['success'] = "reservation Deleted"; 
    header('Location: ' .DIRADMIN);
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
<script language="JavaScript" type="text/javascript">
	function delpage(id, title)
	{
	   if (confirm("Are you sure you want to delete '" + title + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delpage=' + id;
	   }
	}
	
	function delCust(id, name)
	{
	   if (confirm("Are you sure you want to delete '" + name + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delCust=' + id;
	   }
	}
	
	function delProd(id, Prodname)
	{
	   if (confirm("Are you sure you want to delete '" + Prodname + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delProd=' + id;
	   }
	}
	
	function delvac(vacID, Vacname)
	{
	   if (confirm("Are you sure you want to delete '" + Vacname + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delvac=' + vacID;
	   }
	}
	function delnews(newsID, Newstitle)
	{
	   if (confirm("Are you sure you want to delete '" + Newstitle + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delnews=' + newsID;
	   }
	}
	function delr(rID, name)
	{
	   if (confirm("Are you sure you want to delete cv of '" + name + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delr=' + rID;
	   }
	}
	function delw(cartID, Clientname)
	{
	   if (confirm("Are you sure you want to delete reservation of '" + Clientname + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delw=' + cartID;
	   }
	}
	
</script>
</head>
<body>

<div id="wrapper">

<div id="logo3"><a href="<?php echo DIRADMIN;?>"><img src="images/logo3.png" alt="<?php echo SITETITLE;?>" border="0" /></a></div>

<!-- NAV -->
<div id="navigation">
	<ul class="menu">
		<li><a href="<?php echo DIRADMIN;?>">Admin</a></li>		
		<li><a href="<?php echo DIR;?>" target="_blank">View Website</a></li>
		<li><a href="<?php echo DIRADMIN;?>?logout">Logout</a></li>
	</ul>
</div>
<!-- END NAV -->

<div id="content">

<?php 
	//show any messages if there are any.
	isset($_GET['messages'])

?>

<h1>Manage Pages</h1>

<table>
<tr>
	<th><strong>Title</strong></th>
	<th><strong>action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM pages ORDER BY pageID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->pageTitle</td>";
		if($row->pageID == 1){ //home page hide the delete link
			echo "<td><a href=\"".DIRADMIN."editpage.php?id=$row->pageID\">Edit</a></td>";
		} else {
			echo "<td><a href=\"".DIRADMIN."editpage.php?id=$row->pageID\">Edit</a> | <a href=\"javascript:delpage('$row->pageID','$row->pageTitle');\">Delete</a></td>";
		}
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addpage.php" class="button">Add Page</a></p>



<h1>Manage Rooms</h1>

<table>
<tr>
	<th><strong>Product name</strong></th>
	<th><strong>number of bed</strong></th>
	<th><strong>level</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM product ORDER BY id");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->Prodname</td>";
		echo "<td>$row->Prodqty</td>";
		echo "<td>$row->Level</td>";
		
	    echo "<td><a href=\"".DIRADMIN."editproduct.php?id=$row->id\">Edit</a> | <a href=\"javascript:delProd('$row->id','$row->Prodname');\">Delete</a></td>";
		
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addproduct.php" class="button">Add product</a></p>


<h1>Manage Clients</h1>

<table>
<tr>
	<th><strong>Customer name</strong></th>
	<th><strong> phone number</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM client ORDER BY id");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->name</td>";
		echo "<td>$row->phone</td>";
	    echo "<td><a href=\"".DIRADMIN."editcustomer.php?id=$row->id\">Edit</a> | <a href=\"javascript:delCust('$row->id','$row->name');\">Delete</a></td>";
		
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addcustomer.php" class="button">Add a customer</a></p>


<h1>Manage Vacancies</h1>

<table>
<tr>
	<th><strong>Vacancy</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM vacancy ORDER BY vacID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->Vacname</td>";
		if($row->newsID == 1){ //home page hide the delete link
			echo "<td><a href=\"".DIRADMIN."editvac.php?id=$row->vacID\">Edit</a></td>";
		} else {
			echo "<td><a href=\"".DIRADMIN."editvac.php?id=$row->vacID\">Edit</a> | <a href=\"javascript:delvac('$row->vacID','$row->Vacname');\">Delete</a></td>";
		}
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addvac.php" class="button">Add Vacancy</a></p>


<h1>Manage News</h1>

<table>
<tr>
	<th><strong>News</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM news ORDER BY newsID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->Newstitle</td>";
		if($row->newsID == 1){ //home page hide the delete link
			echo "<td><a href=\"".DIRADMIN."editnews.php?id=$row->newsID\">Edit</a></td>";
		} else {
			echo "<td><a href=\"".DIRADMIN."editnews.php?id=$row->newsID\">Edit</a> | <a href=\"javascript:delnews('$row->newsID','$row->Newstitle');\">Delete</a></td>";
		}
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addnews.php" class="button">Add News</a></p>

<h1>Recruitments</h1>

<table>
<tr>
	<th><strong>Name</strong></th>
	<th><strong>family</strong></th>
	<th><strong>email</strong></th>
	<th><strong>Position</strong></th>
	<th><strong>start date</strong></th>
	<th><strong>phone</strong></th>
	<th><strong>address</strong></th>
	<th><strong>Multi-shift</strong></th>
	<th><strong>company last work for</strong></th>
	<th><strong>any comment/reference</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM recruitment ORDER BY rID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->name</td>";
		echo "<td>$row->family</td>";
		echo "<td>$row->email</td>";
		echo "<td>$row->position</td>";
		echo "<td>$row->startDate</td>";
		echo "<td>$row->phone</td>";
		echo "<td>$row->address</td>";
		echo "<td>$row->shift</td>";
		echo "<td>$row->company</td>";
		echo "<td>$row->reference</td>";
		
		echo "<td><a href=\"javascript:delr('$row->rID','$row->name');\">Delete</a></td>";
		
		
	echo "</tr>";
}
?>
</table>

<h1>Manage Reservations</h1>

<table>
<tr>
	<th><strong>Client</strong></th>
	<th><strong>ResRoom</strong></th>
	<th><strong>From</strong></th>
	<th><strong>To<strong></th>
	<th><strong>NNumber of Days<strong></th>
	<th><strong>Number of Night<strong></th>
	<th><strong>Total price<strong></th>
	<th><strong>Delete</strong></th>
	<th><strong>Check</strong></th>
	
</tr>

<?php
$sql = mysql_query("SELECT * FROM reservation ORDER BY cartID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->Clientname</td>";
		echo "<td>$row->ResRoom</td>";
		echo "<td>$row->From_Date</td>";
		echo "<td>$row->To_Date</td>";
		echo "<td>$row->nbOfDays</td>";
		echo "<td>$row->nbOfNight</td>";
		echo "<td>$row->TotalPrice</td>";
		echo "<td><a href=\"javascript:delw('$row->cartID','$row->Clientname');\">Delete</a></td>";
        echo '<td><a href="editWish.php?id=' . $row->cartID . '">Edit</a></td>';	
		
		?>
		

	<?php echo "</tr>";
}
?>
</table>


</div>

<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>