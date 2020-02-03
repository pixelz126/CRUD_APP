<?php 

include'db.php';

if(isset($_POST['send'])){

	$name = htmlspecialchars($_POST['name']);

	$sql = "INSERT INTO tasks (name) VALUES ('$name')";

	$query = $db->query($sql);

	if ($query) {
		header('location: index.php');
	}

}

?>