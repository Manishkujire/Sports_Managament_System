<?php
ob_start();
session_start();
//=========== database connection variables ====================
define('DB_SERVER', "sql301.epizy.com	
"); // database host name eg. localhost or 127.0.0.1
define('DB_USER', "epiz_33668131"); // database user name eg. root
define('DB_DATABASE', "epiz_33668131_sports"); //database name
define('DB_PASSWORD', "pXup7zlkxXd4ro"); //database user password
define('DB_TYPE', 'mysql'); //database drive eg. mysql, pgsql, mongodb etc


//========== site details described here ========================
define('SITE_TITLE', 'demo.com');
define('SITE_TAG_LINE', 'give your tag line of your project here');

//contact ifnormation
define('SITE_CONTACT', 'your number');
//email information
define('SITE_EMAIL_INFO', 'your mail id');
//url information
define('BASE_URL', 'http://localhost/cud opertaion/');

// included main class
require_once 'app/Main.php';

/**
 * @param $class
 */
spl_autoload_register(function($class){
    require_once('app/'.$class.'.php');
});