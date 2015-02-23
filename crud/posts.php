<?php
ini_set("display_errors", 0);
require_once 'includes/bootstrap.php';

$cat_id = $_GET['cat'];

if(empty($cat_id)){
	die("Wrong category id supplied");
}
$categoryPrototype = new Model\Category(new Model\Db\Table\Post());
$categoryTable = new Model\Db\Table\Category($categoryPrototype);
$cat = $categoryTable->getById($cat_id);

if(empty($cat)){
	die("Wrong category id supplied");
}

$posts = $cat->getAllPosts();

$view = new View(BASE_VIEW_PATH);

$view->cat = $cat;
$view->posts = $posts;

$view->render('post/index');
