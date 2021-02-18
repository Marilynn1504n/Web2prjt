<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('includes/config.php'); 
include ('session.php');

?>
 
 
<!DOCTYPE html>
<html>
<head>

<style>
#welcome{color:#B5B5B5; font-size:40px;}

.button2 {
    background-color: #B50049  ;
    border-radius:10px;
    color: white;
    width :50%;
	box-sizing: border-box;
	border: 1px solid #B50049  ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 50px;
    
    cursor: pointer;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.error {color: #FF0000;}

textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}

input[type=submit] {
    width: 100%;
    background-color: #B50049  ;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
background-color: #B50049  ;}

h3{text-align: center; color:#B5B5B5;}
h1{text-align:center;color:#B5B5B5;}
h4{text-align:left;color:#B5B5B5;}
.form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	float:left;
	width:400px;
}
.input {
    width:100%;
float:left;}

#logintext{color:#3B5166;}
.back{float:left;color:#B5B5B5;font-size:20px;}
.loading{float:right;}
.logout{float:right;color:#B5B5B5;font-size:20px;}
</style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/icon.ico">
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<br/>
	<center><b id="welcome">welcome   <i><?php echo $login_session;?></i></b></center><br/>
	<div class="premier">
	<div class="back"><i class="fa fa-long-arrow-left">&nbsp </i><a href="#" onclick="history.back();">Back</a></div>
	<div class="logout"><i class="fa fa-times"></i><a href="logout.php">Log out</a></div>
	<p><h1>Edit your info</h1></p>
	
	<?php 
if(isset($_SESSION['login_user'])){

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
	$phone = $_POST['phone'];
    $password = $_POST['password'];

    $s=mysql_query("UPDATE client SET name='$name', phone='$phone', password='$password'  WHERE name='".mysql_real_escape_string($_SESSION["login_user"])."'");

    if ($s)
        { echo "<script type='text/javascript'>alert('Successful - Record Updated!'); window.location.href = 'index2.php';</script>"; }
    else
        { echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!'); window.location.href = 'account.php';</script>"; }
}

$query1=mysql_query("SELECT * FROM client WHERE name='".mysql_real_escape_string($_SESSION["login_user"])."'");
$query2=mysql_fetch_array($query1); 
 ?>
 <div>
	<div class="form">


<p><span class="error">* required field.</span></p>
<form method="post"> 
<input type="hidden" name="isSubmit" value="1">
<label for="name">First Name</label>
<span class="error">* <?php echo $nameErr;?></span>
<input type="text"  placeholder="Your name.." name="name" value="<?php  echo $query2['name'];  ?>">


<label for="phone">Phone</label>
<span class="error">* <?php echo $familyErr;?></span>
<input type="text"  placeholder="Your Phone number.." name="phone" value="<?php  echo $query2['phone'];  ?>">


<label for="password">Password</label>
<span class="error">* <?php echo $nameErr;?></span>
<input type="password"  placeholder="Your name.." name="password" value="<?php  echo $query2['password'];  ?>">



<input type="submit" name="submit" value="Submit">  
</form>
<?php
//  close  while  loop
}
?>
</div>
<div class="loading">
 <img src="images/loading.png" alt="loading" width="400" height="400">
 </div>
 </div>
</div><!-- close content div -->
	
	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script>
</script>
</body>
</html>
	