<!DOCTYPE html>

<?php include'db.php'; 

$id = (int)$_GET['id'];

$sql = "SELECT * FROM tasks WHERE id='$id' ";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();


if(isset($_POST['send'])){

	$name = htmlspecialchars($_POST['name']);

	$sql2 = "UPDATE tasks SET name = '$name' WHERE id = '$id' ";

	 $db->query($sql2);

		header('location: index.php');
	}

?>

<html>
<head>

	<title>Crud App</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container">

		<div class="row">
<br><br>
			<center><h2>Update Task</h2></center><br><br>
				
			<div class="col-md-10 col-md-offset-1 ">
				
				<br>
				<!-- Modal -->
					
					

					    
							      <form action="" method="POST">
									  <div class="form-group">
									    <label for="task">New Task Name:</label>
									    <input type="text" value="<?php echo $row['name']; ?>" required name="name" class="form-control" id="task">
									  </div>
									  <input type="submit" name="send" value="Update Task" class="btn btn-success ">
									  <a href="index.php" class="btn btn-warning">Go Back</a>
									</form>
			
					   
		</div>
	
	</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>