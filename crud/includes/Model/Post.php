<?php
namespace Model;
use Model\Db\Row\Row;

class Post extends Row{
	const POST_STATUS_PENDING = 0;
	const POST_STATUS_PUBLISHED = 1;
	
	
	protected $_idFieldName = 'id';
	protected $_tableClass = "Model\Db\Table\PostTable";
	
	function getReadableStatus(){
		//switch (){
			
		//}
		if($this->status == self::POST_STATUS_PENDING){
			return "Pending";
		}else{
			return "Published";
		}
	}
}