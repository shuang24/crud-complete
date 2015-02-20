<?php
namespace Model;
use Model\Db\Row\Row;
use Model\Db\Table\PostTable;

class Category extends Row{
	
	protected $_idFieldName = 'id';
	protected $_tableClass = "Model\Db\Table\Category";
	protected $_postService;
	
	function __construct(PostTable $postService = null, array $config = array()){
		
		parent::__construct($config);

		if($postService == null){
			$this->_postService = new PostTable();
		}else{
			$this->_postService = $postService;
		}
	}
	
	function getAllPosts(){
		return $this->_postService->getPostsByCategoryId($this->id);
	}
	
}