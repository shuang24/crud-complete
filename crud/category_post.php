<?php
require_once 'includes/bootstrap.php';
$data = $_POST;

if(empty($data)){
	die("Wrong place");
}
var_dump($data);
$category = new Model\Category();

$category->setData($data);
var_dump($category);
$category->save();

header("Location: ".BASE_URL.'index.php');