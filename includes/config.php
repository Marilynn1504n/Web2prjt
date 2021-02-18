<?php

/*Author: marilynn hossry  Email: m.hossry@hotmail.com*/

ob_start();
session_start();

// db properties
define('DBHOST','localhost');
define('DBUSER','marilynn');
define('DBPASS','marilynn');
define('DBNAME','web2prjt');


$conn = mysql_connect (localhost, marilynn, marilynn);
$conn = mysql_select_db (web2prjt);
if(!$conn){
	die( "connection failed");
}

//  site path
define('DIR','http://localhost/web2prjt/');

//  admin site path
define('DIRADMIN','http://localhost/web2prjt/admin/');

define('DIRADMIN2','http://localhost/web2prjt/');

//  site title for top of the browser
define('SITETITLE','promenade');

// include checker
define('included', 1);

include('functions.php');
?>