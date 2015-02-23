<?php
namespace Model;
use Model\Db\Row\Row;
use Model\Db\Table\Post;
class Category extends Row{
	
	protected $_idFieldName = 'id';
	protected $_tableClass = "Model\Db\Table\Category";
	protected $_postService;

	function __construct(Post $postService=null){
		if($postService==null){
			$this->_postService = new Post();
		}else{	
			$this->_postService = $postService;
		}
	}
	function getAllPosts(){
		return $this->_postService->getPostsByCategoryId($this->id);
	}
}