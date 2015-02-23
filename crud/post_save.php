<?php
require_once 'includes/bootstrap.php';
$data = $_POST;

if(empty($data)){
	die("Wrong place");
}

$post = new Model\PostRow();
$post->time_created=new DateTime('NOW');
$post->setData($data)->save();
echo BASE_URL.'index.php';

header("Location: ".BASE_URL."posts.php?cat=".$data['category_id']);