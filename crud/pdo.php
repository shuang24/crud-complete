<?php
$db = new PDO("mysql:host=localhost", "root", "");
echo "PDO connection object created";

$stmt = $db->prepare("SELECT * FROM `categories` WHERE `name' ASC");
//$stmt->bindValue(':column', $column, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	while($row = $stmt->fetch(PDO::FETCH_OBJ)) 
	{
		$rows[]=$row;
	}
}
?>