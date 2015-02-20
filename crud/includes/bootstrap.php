<?php

ini_set("display_errors", 1);

define('BASE_PATH', realpath(dirname(dirname(__FILE__))));
define('BASE_VIEW_PATH',BASE_PATH.'/views');


require_once BASE_PATH.'/config/config.php';

//autoload
function my_autoloader($class)
{
	$filename = BASE_PATH . '/includes/' . str_replace('\\', '/', $class) . '.php';
	include($filename);
}

spl_autoload_register('my_autoloader');
date_default_timezone_set("America/Los_Angeles");


try{
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USERNAME, DB_PASSWORD);
	@Model\Db\Adapter::setAdapter($db);	
}catch (PDOException $e){
	echo $e->getMessage();
	die();
}

