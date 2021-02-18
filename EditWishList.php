<?php
/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/
        require('includes/config.php');
        include ('session.php');
        session_start();
		
		
	


	
?>
<!DOCTYPE html>
<html>
    <head>
	<style>
	
	.action{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:50%;
	
}
   .action a{color: #3B5166; font-size:20px;}
   .action i{color: #3B5166; font-size:20px;}
   .news {width:60%; background:#CCCCCC; font-family:Verdana,Arial,Sans-Serif;font-size:12px;float:right;}
   
   .option{float:left; width:40%;}
   
.news a { text-decoration:none; }


.title {
text-align:center;
font-size:25px;
font-weight:bold;
color:#B50049;

}

.newsticker-jcarousellite { width:300px;}
.newsticker-jcarousellite ul li{ list-style:none; display:block; padding-bottom:1px; margin-bottom:5px; }
.newsticker-jcarousellite .info { float:right; width:300px; font-size:20px; color:#B50049  ;}
.newsticker-jcarousellite .info span.cat { display: block; font-size:15px; color:white  ; }



	</style>
	
<script src="javascript/jquery-latest.pack.js" type="text/javascript"></script>
<script src="javascript/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 2,
		auto:500,
		speed:1000
	});
});


</script>
    <meta charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/icon1.ico">
    <title><?php echo SITETITLE;?></title>
    <link href="<?php echo DIR;?>style/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="style/wishlist.css" type="text/css" rel="stylesheet" media="all" />-->
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
	
	
        <table>
            <tr><th>ResRoom</th><th>From</th><th>To</th><th>Number Of Days</th><th>Number Of night</th><th>Total</th><th>notification</th><th>delete</th>
            <?php
			$WisherID = $_SESSION['login_user'];
            $sql1 = mysql_query("SELECT * FROM reservation WHERE Clientname = '$WisherID'");
	      while($row = mysql_fetch_array($sql1)) {

               echo "<tr>";
			   echo '<td>' . $row['ResRoom'] . '</td>';
			   echo '<td>' . $row['From_Date'] . '</td>';
			   echo '<td>' . $row['To_Date'] . '</td>';
			   echo '<td>' . $row['nbOfDays'] . '</td>';
			   echo '<td>' . $row['nbOfNight'] . '</td>';
			   echo '<td>' . $row['TotalPrice'] . '</td>';
			   echo '<td>' . $row['response'] . '</td>';
			    echo '<td><a href="delete.php?id=' . $row['cartID'] . '">Delete</a></td>';
               echo "</tr>";
               
?>
            <?php
            echo "</tr>\n";
		  }
            ?>
        </table>
		<div class="div">
		<div class="option">
            <form class="action">            
           <a href="AddWish.php">Add a wish</a>&nbsp <i class="fa fa-chevron-right"></i>
            </form>
		   <br/>
			<form class="action">            
           <a href="index2.php">Back to main page</a>&nbsp <i class="fa fa-chevron-right"></i>
		   </form>
		  <br/>
		   <form class="action">            
           <a href="account.php">Edit your info</a>&nbsp <i class="fa fa-chevron-right"></i>
		   </form>
		   <br/>
		   
		   </div>
		   
		   <div class="news">
		     
    <div class="title">Latest News</div>
    <div class="newsticker-jcarousellite">
		
         <ul>   
				<?php
	$id = $_POST["newsID"];
	$q = mysql_query("SELECT * FROM news ORDER BY newsID");
		
		echo '<br/>';
                while($row = mysql_fetch_array($q)) {   ?>
				 
				 <li>
				<div class="info">
					<?php echo $row["Newstitle"];?> &nbsp <?php echo $row["Newsdate"];?> <br/>
					<span class="cat"><?php echo $row["Newstext"];?></span>
				</div>
				</li>
				
			<?php }

?>	
	</ul>	
    </div>
    
</div>
		   </div>
          </div>  
			
    </div><!-- end of div content-->
<div id="footer">	
			<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
	</div><!-- close footer -->
</div><!-- close wrapper -->
<script>

</script>
</body>
</html>
    