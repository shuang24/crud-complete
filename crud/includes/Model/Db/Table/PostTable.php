<?php
namespace  Model\Db\Table;
use Model\Db\Table\TableAbstract;

class PostTable extends TableAbstract{
	
	protected $_rowClass = 'Model\Post';
	protected  $_name = "posts";
	
	function getPostsByCategoryId($cat_id){
		$posts = $this->fetchAll(array('category_id'=>$cat_id),null,'id desc');
		return $posts;
	}
	
	
}