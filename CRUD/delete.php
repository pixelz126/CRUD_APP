<?php

include'db.php';

$id = (int)$_GET['id'];

$sql = "DELETE FROM tasks WHERE id = '$id' ";

$query = $db->query($sql);

if ($query) {
	
	header('location: index.php');

}


?>