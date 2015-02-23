<?php
namespace  Model\Db\Table;
use Model\Db\Table\TableAbstract;

class Category extends TableAbstract{
	protected $_rowClass = 'Model\Category';
	protected $_name = "categories";	
}