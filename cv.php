<?php 
/*Author: Marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php'); 

$name = $_POST['name'];
$family = $_POST['family'];
$email = $_POST['email'];
$position = $_POST['position'];
$startDate = $_POST['startDate'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$shift= $_POST['shift'];
$company =$_POST['company'];
$reference = $_POST['reference'];

$message ="";   //error msg

if($_POST["isSubmit"]=="1")   //detection de la soumission du formulaire
{
	if(($name!=""))
	{  if (!ctype_alpha( $name)){
		$message = "invaid name" ; 
	}}
	else {	$message = "name required";}
	
    if(($family!=""))
	{  if (!ctype_alpha( $family)){
		$message = "invaid family name" ; 
	}}
	else {	$message = "family name required";}
			
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$message = "invalid email address";
		
	}
	
	if(($position !="" ))
	{  if (!ctype_alpha( $position)){
		$message = "invaid position" ; 
	}}
	else {	$message = "positon required";}
	
	
	if (!preg_match("#^[0-9][1-9]([-. ]?[0-9]{2}){3}$#",$phone))
	{
		$message = "invalid phone number";
		
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
            mysql_query("INSERT INTO recruitment (name,family,email,position,startDate,phone,address,shift,company,reference) VALUES ('$name','$family','$email','$position','$startDate','$phone','$address','$shift','$company','$reference')")or die(mysql_error());}
?>

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/icon1.ico">
<title><?php echo SITETITLE;?></title>
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
	<form action="" method="post" id="EmploymentApplication"> 
    <input type="hidden" name="isSubmit" value="1">

   <table border="0" cellpadding="5" cellspacing="0">
   <tr> <td style="width: 50%">
   <label for="name"><b>First name *</b></label><br />
   <input name="name" type="text" maxlength="50" style="width: 260px" />
   </td> 
   <td style="width: 50%">
   <label for="family"><b>Last name *</b></label><br />
   <input name="family" type="text" maxlength="50" style="width: 260px" />
   </td> </tr> 
   <tr> <td colspan="2">
   <label for="email"><b>Email *</b></label><br />
    <input name="email" type="text" maxlength="100" style="width: 535px" />
    </td> </tr> 
	<tr> <td colspan="2">
     <label for="position"><b>Position you are applying for *</b></label><br />
    <input name="position" type="text" maxlength="100" style="width: 535px" />
    </td> </tr> 
	<tr> <td colspan="2">
     <label for="startDate"><b>when can you start? </b></label><br />
     <input type="date" name="startDate" id="datefield" min="" maxlength="100" style="width: 535px" />
     </td> </tr>
	<tr> <td>
    <label for="phone"><b>Phone *</b></label><br />
    <input name="phone" type="text" maxlength="50" style="width: 260px" />
     </td>
	 <td>
     <label for="address"><b>Address(region)</b></label><br />
     <input name="address" type="text" maxlength="50" style="width: 260px" />
     </td> </tr> 
	 <tr> <td colspan="2">
     <label for="shift"><b>Are you willing to multiple shifts?</b></label><br />
     <input name="shift" type="radio" value="Yes" checked="checked" /> Yes      
     <input name="shift" type="radio" value="No" /> No      
     <input name="shift" type="radio" value="NotSure" /> Not sure
     </td> </tr> 
	 <tr> <td colspan="2">
     <label for="company"><b>Last company you worked for</b></label><br />
     <input name="company" type="text" maxlength="100" style="width: 535px"/>
     </td> </tr> 
	 <tr> <td colspan="2">
     <label for="reference"><b>Reference / Comments / Questions</b></label><br />
     <textarea name="reference" rows="7" cols="40" style="width: 535px"></textarea>
     </td> </tr> 
	  <tr> <td colspan="2" style="text-align: center;">
      <input name="submit" type="submit" value="Send Application" />
     </td> </tr>
</table>
</form>
	
	
	</div><!-- close content div -->

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script type="text/javascript">

//date
//datevar 
today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    }
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);

</script>
</body>
</html>
	