<?php
namespace Model\Db;

use \PDO;

class Adapter{
	
	static public $_adapter;
	
	function setAdapter(PDO $adapter){
		self::$_adapter = $adapter;
	}
	
	function getAdapter(){
		return self::$_adapter;
	}
}