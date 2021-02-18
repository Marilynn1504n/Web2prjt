<?php 
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php'); ?>
<!DOCTYPE>
<html>
<head>
<style>
button.accordion {
    background-color: #eee;
    color: #B50049  ;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 25px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #B50049  ; 
	color: white;
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}
h1{text-align:center; color:#B50049  ;}
h3{text-align:left;color:#B50049  ;}
.info{color:grey; font-size:15px;}
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
<title><?php echo SITETITLE;?></title>
<link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/icon1.ico">
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
	<img src="images/job.jpg" alt="job">
	
	<h1>JOIN OUR TEAM</h1>
	

<button class="accordion">Why us?</button>
<div class="panel">
  <p><h1>Full Potential</h1>
<p class="info"> For our employees, we provide a stage on which they can flourish and realise their full potential. Dedicated to please, educated to entertain and never compromising on the European elegance of service, we are driven by our passion for crafting the rich and meaningful experiences that inspire our guests to return to us time and time again.</p>
<h1>Trainings</h1>
<p class="info">Through formal training and development programs as well as informal learning opportunities, we provide you with the tools and encouragement you need to succeed and embrace the entrepreneurial spirit of those who came before you. Kempinski gives you the opportunity to work alongside industry leaders and apply your creativity and unique style in some of the world’s most remarkable locations.

</p></div>

<button class="accordion">Join Our team</button>
<div class="panel">
  <p><h1>Want to Join Our Team, Apply <a href="cv.php">Here.</a></h1>
<h3>Job Description</h3>
<p class="info">If you are interested to join our family and you believe that you have the necessary qualifications, kindly choose from the different ways to submit your resume; our recruitment team will be happy to support you.</p>
<h3>Job Requirements</h3>

<ul>
<li><p class="info">One Recent Passport Photo</p></li>
<li><p class="info">Copy of Identification Card</p></li>
<li><p class="info">Copy of Family Status Record (إخراج قيد عائلي)</p></li>
<li><p class="info">Certificate of Employment (when applicable)</p></li>
</ul></p>
</div>

<button class="accordion">Vacancies</button>
<div class="panel">
<?php
	$id = $_POST["vacID"];
	$q = mysql_query("SELECT * FROM vacancy ORDER BY vacID");
		
		echo '<br/>';
                while($row = mysql_fetch_array($q)) {   ?>
				<!-- echo out the contents of each row into a table-->
               	
				<div class="col-md-4">
				
				<div style="border:1px solid #B50049  ;background-color:#CCCCCC ;border-radius:5px;padding:16px;" align="center">
				
				<h4 class="text-info"><?php echo $row["Vacname"];?></h4>
				<h4 class="text-danger"><?php echo $row["Vacdesc"];?></h4>
				<h4 class="text-info"><?php echo $row["Vacshift"];?></h4>
                </div>
				</div>
				
				<?php }

?>	
  

</div>



	</div><!-- close content div -->

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}

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