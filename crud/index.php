<?php
ini_set("display_errors", 0);
require_once 'includes/bootstrap.php';
//require_once 'element/header.php';
 
$categoryTable = new Model\Db\Table\Category();
$cats = $categoryTable->fetchAll();
//M-V-C
//M - Model
//V - View
//C - Controller
$view = new View(BASE_VIEW_PATH);

$view->cats = $cats;

$view->render('index');