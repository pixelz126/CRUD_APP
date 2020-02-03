<!DOCTYPE html>

<?php include'db.php'; 

if(isset($_POST['search'])){
	
$name =htmlspecialchars($_POST['search']);

$sql = "SELECT * FROM tasks WHERE name LIKE '%$name%' ";

$rows = $db->query($sql);

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
			<center><h2>Todo list</h2></center><br><br>
				
			<div class="col-md-10 col-md-offset-1 ">
				<button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-success" >Add Task</button>
				<button type="button" class="btn btn-default pull-right" onclick="print()" >Print</button>
				<hr><br>


					<div class="col-md-12 text-center">
						<p>Search</p>
						<form class="form-group" action="search.php" method="POST">
							<input type="text" name="search" placeholder="Search" class="form-control">
						</form>
					</div>

					<?php if(mysqli_num_rows($rows) < 1 ): ?>

						<h3 class="text-danger text-center">Nothing Found</h3>
						<a href="index.php">Go Back</a>
					<?php else: ?>
						<table class="table table-hover">
						  <thead>
						  	
						    <tr>
						      <th scope="col">No.</th>
						      <th scope="col">Task</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php while($row = $rows->fetch_assoc()): ?>
						    <tr>
						      <th scope="row"><?php echo $row['id'] ?></th>
						      <td class="col-md-9"><?php echo $row['name'] ?></td>
						      <td class="">
						      	<a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary ">Edit</a>
						      	<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger ">Delete</a>
						      </td>
						    </tr>
							<?php endwhile; ?>
						  </tbody>
						</table>


<?php endif; ?>
			</div>
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