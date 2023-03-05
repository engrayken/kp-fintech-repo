<?php

//header("X-Frame-Options: SAMEORIGIN");

//change the values to your database settings
define('DB_HOST', 'localhost'); //localhost
define('DB_USER', 'kenspayc_p');  //username
define('DB_PASSWORD', 'C95FiXf[-95ojN');  //password
define('DB_NAME', 'kenspayc_pay'); //database name
define('URL', 'https://kenspay.com.ng'); //end url with '/'
$url=URL; 
$kenhost=('kenspay.com.ng'); //end url with '/'

if (version_compare(phpversion(), '5.4.0', '<') == true) {
	exit('PHP5.4+ Required');
}
require_once('castro_func.php');



?>