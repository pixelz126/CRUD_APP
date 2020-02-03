<!DOCTYPE html>

<?php include'db.php'; 

$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);

$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "SELECT * FROM tasks limit ".$start." , ".$perPage." ";

$total = $db->query("SELECT * FROM tasks")->num_rows;

$pages = ceil($total / $perPage);

$rows = $db->query($sql);

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
				<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Add Task</h4>
					      </div>
					      <div class="modal-body">
							      <form action="add.php" method="POST">
									  <div class="form-group">
									    <label for="email">Task Name:</label>
									    <input type="text" required name="name" class="form-control" id="task">
									  </div>
									  <input type="submit" name="send" value="Add Task" class="btn btn-success ">
									</form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>

					<div class="col-md-12 text-center">
						<p>Search</p>
						<form class="form-group" action="search.php" method="POST">
							<input type="text" name="search" placeholder="Search" class="form-control">
						</form>
					</div>
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

				<center>
					<ul class="pagination">
						<?php for( $i = 1; $i <= $pages; $i++) : ?>
						<li>
							<a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage ?>"><?php echo $i; ?></a>
						</li>
						<?php endfor; ?>
					</ul>
				</center>
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