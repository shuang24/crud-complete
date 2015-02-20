<?php
require_once 'includes/bootstrap.php';
$cat_id = $_GET['id'];

if(empty($cat_id)){
	die("Wrong category id supplied");
}

$categoryTable = new Model\Db\Table\Category();
$cat = $categoryTable->getById($cat_id);

if(empty($cat)){
	die("Wrong category id supplied");
}

$cat->delete();

header("Location: ".BASE_URL.'index.php');