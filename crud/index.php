<?php
require_once 'includes/bootstrap.php';

$categoryTable = new Model\Db\Table\Category();

$cats = $categoryTable->fetchAll();
//M-V-C
//M - Model
//V - View
//C - Controller
$view = new View(BASE_VIEW_PATH);

$view->cats = $cats;


$view->render('index');