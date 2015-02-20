<?php
//("display_errors", 1);
require_once 'includes/bootstrap.php';

$cat_id = $_GET['catid'];

if(empty($cat_id)){
	die("Wrong category id supplied");
}
$categoryPrototype = new Model\Category(new Model\Db\Table\PostTable());
$categoryTable = new Model\Db\Table\Category($categoryPrototype);
$cat = $categoryTable->getById($cat_id);

if(empty($cat)){
	die("Wrong category id supplied");
}

$view = new View(BASE_VIEW_PATH);

$view->cat = $cat;

$view->render('post/add');
?>