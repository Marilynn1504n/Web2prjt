<?php 
/*Author: Marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>

<style>

* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}



/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

.about{color:#B5B5B5;text-align:center;font-size:20px;}
.brand{color:#B5B5B5;text-align:center;font-size:20px;}
h1{color:black;text-align:center;}
h2{color:black;}
div.gallery {
    margin: 5px;
    border: 1px solid #B5B5B5;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

.column {
     width:300px;
     float:left;
	 color: #B5B5B5;
}
a:link {
    color: #B5B5B5;
}
a:hover {
    color: #B5B5B5;
	dislay : none;
}
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



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<button onclick="topFunction()" id="myBtn" title="Go to top">back to Top</button>
	<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/sliders1.jpg" style="width:100%">
 </div>

<div class="mySlides fade">
 <img src="images/sliders2.jpg" style="width:100%">
 </div>

<div class="mySlides fade">
 <img src="images/sliders3.jpg" style="width:100%">
  </div>



</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<div class = "about">
<h1>ABOUT US</h1>
Promenade is a member of the Leading Hotels of the World, Ltd. <br/>
Promenade is close to the magnificent Jeita Grotto, Casino du Liban, and the historic city and souks of Byblos, as well as ski resorts and upscale shopping districts. <br/>
Promenade has won numerous awards for excellence in GASTRONOMY and SPA FACILITIES.The complex boasts stunning views of the Mediterranean, and features a WATERGATE AQUA PARK during warm months.
</div></div>
<br/>
<div class="brands">
<h1>OUR ENTERTAINMENT</h1>
<div class="gallery">
  <img src="images/ent1.jpg" alt="ent1" width="400" height="300">
  </a>
  
</div>

<div class="gallery">
  <img src="images/ent2.jpg" alt="ent2" width="400" height="300">
  </a>
  
</div>

<div class="gallery">
    <img src="images/ent3.jpg" alt="ent3" width="400" height="300">
  </a>
  
</div>

<div class="gallery">
    <img src="images/ent4.jpg" alt="ent4" width="400" height="30">
  </a>
  
</div>

<div class="gallery">
    <img src="images/ent5.jpg" alt="ent5" width="400" height="300">
  </a>
</div>
<br/>
<br/>
<div class="social media">

<div class="column">
    <h2>Contact Us</h2>
    <p><i class="fa fa-facebook" style="font-size:24px;"></i>   Promenade<br/>
       <i class="fa fa-envelope" style="font-size:24px;"></i>   promenade.lebanon@gmail.com<br/>
       <i class="fa fa-phone" style="font-size:24px;"></i>      04 644400 <br/></p>
</div>
<div class="column">
    <h2>SiteMAP</h2>
    <a href="product.php">Rooms</a><br/>
	<a href="career.php">Career</a><br/>
	<a href="contact.php">Contact Us</a><br/>
	<a href="index2.php">reservation</a><br/>
</div>
<div class="column">
    <h2>terms & Conditions</h2>
    <p>* open 24/7 </p>
	<p>* create an account to reserve online</p>
	<p>* cancel a reservation before 3 days </p>
	
	
</div>


</div>

<script>


var slideIndex = 1;
showSlides(slideIndex);


function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
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
	</div><!-- close content div -->
	

	

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
</body>
</html>
	