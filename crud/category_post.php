<?php
require_once 'includes/bootstrap.php';
$data = $_POST;

if(empty($data)){
	die("Wrong place");
}

$category = new Model\Category();
$category->setData($data)->save();

header("Location: ".BASE_URL.'index.php');
?>