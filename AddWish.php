<?php 
/*Author: Marilynn hossry  Email: m.hossry@hotmail.com*/

require('includes/config.php'); 
include ('session.php');
session_start();

	
if(isset($_POST["search"])){
	$ValueSearch = $_POST['value'];
	$query = "SELECT * FROM `product` WHERE CONCAT(`Prodname`, `Prodprice`, `Prodqty`,`Level`) LIKE '%".$ValueSearch."%' ";
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


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
	    $WisherID = $_SESSION['login_user'];
        $id = $_GET["id"];
	    $date1 = $_POST["fromdate"];
		$date2 = $_POST["todate"];
		
		
		
	     $sql1 = mysql_query("SELECT Prodname,Prodprice FROM product WHERE id ='$id'");
	      while($row = mysql_fetch_array($sql1)) {
		  $ResRoom = $row["Prodname"];
		   $selecRoom = $row["Prodname"];
		  $Prodprice = $row["Prodprice"];}
		  
		  
		
		$link = mysql_connect("localhost", "marilynn", "marilynn");
        mysql_select_db("web2prjt", $link);

       $result = mysql_query("SELECT * FROM reservation WHERE ResRoom='$selecRoom' and (From_Date between '$date1' and '$date2') or (To_Date between '$date1' and '$date2');", $link);
       $num_rows = mysql_num_rows($result);

      
		
		
		
		
		if ($num_rows > 1 or $date1>$date2)  { echo "<script>alert(\"date error : you can't reserve between $date1 and $date2 \")</script>";  }
		
        
		else{
			
          //convertir les dates en seconde			
		  $date3 = strtotime($date1);
          $date4 = strtotime($date2);
       
         // difference
          $nbJoursTimestamp = $date4 - $date3;
 
         // convertir le timestamp (exprimé en secondes) en jours 
        $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24
        $nbNuit = $nbJours - 1;
		 
		 // calcul du prix total
		 $prixTotal = $nbJours * $Prodprice;

			  
		  mysql_query("INSERT INTO reservation (Clientname,ResRoom,From_Date,To_Date,nbOfDays,nbOfNight,TotalPrice) VALUES ('$WisherID','$ResRoom','$date1','$date2','$nbJours','$nbNuit','$prixTotal')");
		   
		 echo "<script>alert(\"reservation added\")</script>";}
         
		 
} }
			?>





<!DOCTYPE html>
<html>
<head>

<style>

#error{color:#B50049;font-size:30px;}
div.divise {
    margin: 5px;
    float: left;
    width: 300px;
	
}
#login {color:#B5B5B5  ; font-size:15px;}
select[name="value"] {
    background: #B50049  ;
	border :1 px solid white;
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
	<a href="EditWishList.php">Go to Main Page</a>
	
	 <form action="AddWish.php" method="POST">
	<p id="login"><strong>View by Level</strong></p>
   <select name ='value'>
  <option value="">all</option>
  <option value="level1">level1</option>
  <option value="level2">level2</option>
  <option value="level3">level3</option>
  <option value="level4">level4</option>
  <option value="level5">level5</option>
   </select>
<input type="submit" name="search" value="search">
<br/>

</form>

<?php  

while($row = mysqli_fetch_array($SearchResult)){ 
  
?>
	<!-- echo out the contents of each row into a table-->
	            <form method="POST" action="AddWish.php?action=add&id=<?php echo $row["id"];?>">
               	<div class="divise">
				<div style="border:1px solid #3B5166;background-color:#f1f1f1 ;border-radius:5px;padding:16px; height:500px" align="center">
				<h4><?php echo $row['Prodimg'];?></h4><br/>
				<h4 class="text-info"><?php echo $row["Prodname"];?></h4>
				<h4 class="text-danger">price/night : LL<?php echo $row["Prodprice"];?></h4>
				<h4 class="text-info">number of bed: <?php echo $row["Prodqty"];?></h4>
				<h4 class="text-info">level: <?php echo $row["Level"];?></h4>
				<h4>FROM Date:<input type="date" id="datefield" max="" min=""  name="fromdate" value="<?php echo $row['From_Date'];?>"/></h4>
				<h4>TO Date:<input type="date" id="datefield" max="" min=""  name="todate" value="<?php echo $row['To_Date'];?>"/></h4>
                <h4><input type ="submit" name="add" value="Book now " style="background-color:#B50049  ;"/></h4>
				</div>
				</div>
				</form>
				
				<?php } ?>	


	


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

//datevar2
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
document.getElementById("datefield1").setAttribute("min", today);


 


</script>
	</div><!-- close content div -->
	

	

	<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
</body>
</html>
	