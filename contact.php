<?php 
/*Author: Marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php'); ?>
<!DOCTYPE>
<html>
<head>
<style>

.address{border-collapse:collapse; width:50%; float:right;border-radius: 25px;
border: 2px solid #B50049;
padding: 20px;}

input[type=text], select {
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
    background-color: #B50049;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
background-color: #B50049;}
h2{color:#B50049;text-align:center;}
h3{ color:#B50049;}
h1{text-align:center;color:#B50049;}
h4{text-align:left;color:#B50049;}
.contact {
    border-radius: 5px;
    background-color: #CCCCCC;
    padding: 20px;
	float:left;
	width:400px;
}
.input {
    width:100%;
float:left;}
	
p.dotted {border-bottom-style: dotted;border-color:#B50049;}
.map{float:right;}
.commenter{float:left;}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #B50049;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #B50049;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/icon1.ico">
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>  

<?php
$name = $_POST['name'];
$family =$_POST['family'];
$email =$_POST['email'];
$phone=$_POST['phone'];
$comment = $_POST['comment'];

$message ="";   //error msg

if($_POST["isSubmit"]=="1")   //detection de la soumission du formulaire
{
	if(($name!=""))
	{ if (!ctype_alpha( $name)){
		$message = "invaid name" ; 
	}}
	else{	$message = "name required";}
		
	if(($family!=""))
	{ if (!ctype_alpha( $family)){
		$message = "invaid family name" ; 
	}}
	else{	$message = "family name required";}
	
	
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$message = "invalid email address";
		
	}
	if (!preg_match("#^[0-9][1-9]([-. ]?[0-9]{2}){3}$#",$phone))
	{
		$message = "invalid phone number";
		
	}
	if(($comment=="")){
		$message = "no comment";
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
            mysql_query("INSERT INTO comment (name,family,email,phone,comment) VALUES ('$name','$family','$email','$phone','$comment')")or die(mysql_error());}
?>



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
	<div class="premier">
	<p><h1>Contact us</h1></p>
	<p><h3>We would  love to hear from you. Get in touch to discover what we can do for you</h3></p>
	<div class="contact">


<p><span class="error">* required field.</span></p>
<form method="post"> 

<input type="hidden" name="isSubmit" value="1">

<label for="name">First Name</label>
<span class="error">* <?php echo $nameErr;?></span>
<input type="text"  placeholder="Your name.." name="name" value="">

 
 
 <label for="family">last Name</label>
 <span class="error">* <?php echo $familyErr;?></span>
<input type="text"  placeholder="Your family name.." name="family" value="">



<label for="email">Email</label>
<span class="error">* <?php echo $emailErr;?></span>
<input type="text"  placeholder="Your email name.." name="email" value="">


<label for="phone">Phone</label>
<span class="error">* <?php echo $phoneErr;?></span>
<input type="text"  placeholder="Your Phone number.." name="phone" value="">


<label for="comment">Comment</label>
<textarea rows="5" cols="40" name="comment" placeholder="Your comment.."></textarea>	
 
  
<input type="submit" name="submit" value="Submit">  
</form>
</div>
	<div class = "map">
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52992.27367299955!2d35.46917670975374!3d33.88921332201602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17215880a78f%3A0x729182bae99836b4!2sBeirut!5e0!3m2!1sen!2slb!4v1503824609191" width="494" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<br/>
	<h1>Locate Us</h2>
	<br/>
	
	<table class="address"> 
	
   <tr>
   <td><b>Address</b></td>
   <td><b>dbayeh</b></td>
   </tr>
   <tr>
   <td><b>Email</b></td>
   <td><b>promenade.lebanon.com</b></td>
   </tr>
   <tr>
   <td><b>phone</b></td>
   <td><b>+961 04 644 400</b></td>
   </tr>
   </table>
   </div>
	<div class="input">
	<br/>
	<h2> Your Comment</h2>
	<?php
	
	$q = mysql_query("SELECT * FROM comment ORDER BY comID");
		echo '<br/>';
	while($row = mysql_fetch_array($q)) {
				// echo out the contents of each row into a table
                ?>
          <div class="col-md-4">
				
				<div style="border:1px solid #B50049;background-color:#f1f1f1 ;border-radius:5px;padding:16px;" align="center">
				<h3 class="commenter"><i class="fa fa-comment"></i>&nbsp<?php echo $row["name"];?></h3><br/>
				<h3 class="comment"><?php echo $row["comment"];?></h3>
				
				</div>
				<br/>
				</div>
	<?php  } ?>
				
</div>

	
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