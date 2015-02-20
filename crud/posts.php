<?php
ini_set("display_errors", 1);
require_once 'includes/bootstrap.php';

$post_id = $_GET['post'];

if(empty($post_id)){
	die("Wrong category id supplied");
}
$categoryPrototype = new Model\Category(new Model\Db\Table\PostTable());
$categoryTable = new Model\Db\Table\Category($categoryPrototype);
$cat = $categoryTable->getById($cat_id);

if(empty($post)){
	die("Wrong category id supplied");
}

$posts = $cat->getAllPosts();

$view = new View(BASE_VIEW_PATH);

$view->cat = $cat;
$view->posts = $posts;

$view->render('post/index');
