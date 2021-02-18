<?php

require('../includes/config.php');



// get id value

$id = $_GET['id'];



// delete the entry


$sql1 = mysql_query("SELECT description,quantity FROM wishes WHERE cartID ='$id'");
	      while($row = mysql_fetch_array($sql1)) {
			  $product = $row["description"];
			  $qt = $row["quantity"];

		 
$result = "DELETE FROM reservation WHERE cartID='$id'";
	if (mysql_query($result)){
		
		mysql_query("UPDATE product SET Prodqty = Prodqty + '$qt' WHERE Prodname = '$product'");
		  mysql_query("UPDATE product SET Resqty = Resqty - '$qt' WHERE Prodname = '$product'");
		  
		header('Location: ' .DIRADMIN);}
		 
} 









?>