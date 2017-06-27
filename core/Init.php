<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'dbname' => 'northwind'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user'
	)
);


//require_once 'class/Config.php'; // this style is not maintainable
//instead use the "spl" (standard PHP library)
//this lets us included classes as we need them
spl_autoload_register( function($class) {
	require_once 'classes/' . $class . '.php'; // instead of: 'classes/DB.php';

});

require_once 'functions/sanatize.php';


?>
