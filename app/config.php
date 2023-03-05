<?php

//header("X-Frame-Options: SAMEORIGIN");

//change the values to your database settings
define('DB_HOST', 'localhost'); //localhost
define('DB_USER', 'root');  //username
define('DB_PASSWORD', 'password');  //password
define('DB_NAME', 'dbname'); //database name
define('URL', 'https://example.com'); //end url with '/'
$url=URL; 
$kenhost=('example.com'); //end url with '/'

if (version_compare(phpversion(), '5.4.0', '<') == true) {
	exit('PHP5.4+ Required');
}
require_once('castro_func.php');



?>
