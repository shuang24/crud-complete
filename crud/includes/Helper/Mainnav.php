<?php
namespace Helper;
use Helper\ViewHelperInterface;
use Model\Db\Table\Category;

class Mainnav implements ViewHelperInterface{
	function render(){
		$cats = $this->_getAllCats();
		
		foreach($cats as $cat){
			echo "<li><a href='".BASE_URL."posts.php?cat=".$cat->id."'>".$cat->name."</a></li>";
        	
		}
	}
	
	private function _getAllCats(){
		$catTable = new Category();
		$cats = $catTable->fetchAll(null,null,"position ASC");
		return $cats;
	}
}
