<?php
require_once 'includes/bootstrap.php';

$data = $_POST;

if(empty($data)){
	die("Wrong place");
}

$post = new Model\Post();

$postData = array();
$postData ['title'] = $data ['title'];
$postData ['content'] = $data['content'];
$postData ['time_created'] = time();
$postData ['author'] = $data ['author'];
$postData ['status'] = $data ['status'];
$postData ['id'] = $data ['postid'];

$post->setData($data)->save();

header("Location:".BASE_URL. 'posts.php?cat='.$data['postid']); 
?>