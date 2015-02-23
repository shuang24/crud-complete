<?php
define(DB_USERNAME, 'root');
define(DB_PASSWORD, '');
$db = new PDO('mysql:host=localhost;dbname=crud';charset=utf8', DB_USERNAME, DB_PASSWORD);

$stmt = $db->prepare('SELECT * from `categories` WHERE id=? ');

if()