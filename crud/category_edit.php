<?php
require_once 'includes/bootstrap.php';
$cat_id = $_GET['id'];

if(empty($cat_id)){
	die("Wrong category id supplied");
}

$categoryTable = new Model\Db\Table\Category();
$cat = $categoryTable->getById($cat_id);

if(empty($cat)){
	die("Wrong category id supplied");
}

$view = new View(BASE_VIEW_PATH);

$view->cat = $cat;

$view->render('category/edit');