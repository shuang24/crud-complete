<?php
require_once 'includes/bootstrap.php';
$post_id = $_GET['postid'];

if(empty($post_id)){
	die("Wrong category id supplied");
}

$postTable = new Model\Db\Table\PostTable();
$post = $postTable->getById($post_id);

if(empty($post)){
	die("Wrong post id supplied");
}

$categoryTable = new Model\Db\Table\category();
$cat = $categoryTable->getById($post->category_id);
$cats = $categoryTable->fetchAll();

$view = new View(BASE_VIEW_PATH);
$view->cats=$cats;
$view->post = $post;
$view->cat=$cat;

$view->render('post/edit');