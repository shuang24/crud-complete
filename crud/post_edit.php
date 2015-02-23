<?php
require_once 'includes/bootstrap.php';
$post_id = $_GET['id'];
if(empty($post_id)){
	die("Wrong post id supplied");
}

$postTable = new Model\Db\Table\Post();
$post = $postTable->getById($post_id);
//$postRow = new Model\Db\PostRow();
if(empty($post)){
	die("Wrong post id supplied");
}

$categoryTable = new Model\Db\Table\Category();
$cat = $categoryTable->getById($post->category_id);

$cats = $categoryTable->fetchAll();

$view = new View(BASE_VIEW_PATH);
$view->cats = $cats;
$view->post = $post;
$view->cat = $cat;

$view->render('post/edit');