<?php
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
    require('includes/config.php');
    include('login2.php');
?>

<!DOCTYPE html>
<html>
    <head>
	<style>
	#login{float:center;}
.address{border-collapse:collapse; width:50%; float:left;border-radius: 25px;
border: 2px solid #3B5166;
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

h3{text-align: center; color:#B5B5B5  ;}
h1{text-align:center;color:#B5B5B5  ;}
h4{text-align:left;color:#B5B5B5  ;}
.form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	float:right;
	width:400px;
}
.input {
    width:100%;
float:left;}

#logintext{color:#3B5166;}

.map{float:left;}
.createWishList{color:#B5B5B5  ;font-size:30px;}
.create{float:left;}

	p{color:#3B5166;font-size:15px;}
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
  background-color: #D3D3D3;
}
	</style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Favicons -->
   <link rel="shortcut icon" href="images/icon1.ico">
   <title><?php echo SITETITLE;?></title>
   <link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Wish List Application</title>
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
	<div class="wishlist">
	<img src="images/wishlist.png" alt="wishlist">
          <div class="createWishList">
		  <div class="create">
            Still don't have an account?! <a href="NewCustomer.php">Create now</a>
		 </div>
		 
        </div>
        <div class="logon">
            <input type="submit" name="myWishList" value="My Account >>" onclick="javascript:showHideLogonForm()"/>
            <form method="POST" action ="">
               
                <p>Username:</p>
                <input type="text" name="name"/>

                <p>Password:</p>
                <input type="password" name="password"/><br/>
                
                <div class="error">
                    
                    
                </div>
                <input type="submit" name="login" class="button" value="login" />
            </form>
        </div>
        
    </div>
	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script type="text/javascript">
            

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
