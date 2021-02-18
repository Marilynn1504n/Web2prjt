<?php

require('includes/config.php');



// get id value

$id = $_GET['id'];



// delete the entry

 mysql_query("DELETE FROM reservation WHERE cartID='$id'")or die(mysql_error());
 header('location:EditWishList.php');
?>

