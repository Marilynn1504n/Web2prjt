<?php
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
require('includes/config.php'); 
$name = $_POST['name'];
$phone=$_POST['phone'];
$password = $_POST['password'];

$message ="";   //error msg

if($_POST["isSubmit"]=="1")   //detection de la soumission du formulaire
{
	if(($name!=""))
	{  if (!ctype_alpha( $name)){
		$message = "invalid name" ; 
	}}
	else {	$message = "name reequired";}
		
	
	
	if (!preg_match("#^[0-9][1-9]([-. ]?[0-9]{2}){3}$#",$phone))
	{
		$message = "invalid phone number";
		
	}
	if(($password=="")){
		$message = "no password";
	}
}
if($message!=""){
	?>
	<script language="javascript">
	alert("<?php echo($message);?>");
	</script>
<?php } else 
	if(isset($_POST['submit']))
        {
            mysql_query("INSERT INTO client (name,phone,password) VALUES ('$name','$phone','$password')")or die(mysql_error());}
?>



<!DOCTYPE>
<html>
    <head>
	<style>
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
.error {color: #FF0000; font-size:15px;}


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

h3{text-align:center; color:#3B5166;}
h1{text-align:center;color:#3B5166;}
h4{text-align:left;color:#3B5166;}
form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:100%;
}
.welcome {text-align:center; color:#B5B5B5  ; font-size:25px;}
.input {
    width:100%;
float:left;}
label{color:black;font-size:15px;}
.back{float:left;color:#B5B5B5  ;font-size:20px;}

	</style>
	<meta charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/icon1.ico">
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
        <p class="welcome"><strong>Welcome!</strong></p><br>
		<div class="back"><i class="fa fa-long-arrow-left">&nbsp </i><a href="#" onclick="history.back();">Back</a></div>
		<br/>
		<br/>
		<p><span class="error">* required field.</span></p>
        <form action="NewCustomer.php" method="POST">
		
		<input type="hidden" name="isSubmit" value="1">
		
		<label for="name">Your Username</label>
        <span class="error">*</span>
        <input type="text"  placeholder="Your name.." name="name"><br/>
        
			<label for="phone">Phone</label>
            <span class="error">*</span>
            <input type="text"  placeholder="Your Phone number.." name="phone" value="">
			
			<label for="password">Your Password</label>
            <span class="error">*</span>
            <input type="password"  placeholder="Your password.." name="password"><br/>
           
            
			<input type="submit" name ="submit" value="submit"/>

        </form>
</div>
<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script>
</script>
</body>
</html>
    