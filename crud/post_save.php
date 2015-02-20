<?php
require_once 'includes/bootstrap.php';
$data=$_POST;

if(empty($data))
{
	die("something error")
}

$post = new Model\Post()
$post->time=new time_created('NOW');
$post->setData($data)->save();
echo BASE_URL. 'index.php';

header("Location: ".BASE_URL."posts.php?cat=".$data['cateory_id']);
?>