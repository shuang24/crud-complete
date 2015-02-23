<?php
require_once 'includes/bootstrap.php';
$post_id = $_GET['id'];

if(empty($post_id)){
	die("Wrong post id supplied");
}

$postTable = new Model\Db\Table\Post();
$post = $postTable->getById($post_id);

if(empty($post)){
	die("Wrong post id supplied");
}
$cat_id=$post->category_id;
echo $cat_id;
$post->delete();

//header("Location: ".BASE_URL."posts.php?cat=".$cat_id);