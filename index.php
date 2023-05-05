<?php
include_once("config.php");
$filter = [];
$options = ['sort' => ['_id' => -1]];
$result = $db->employees->find($filter,$options);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<br/>
		<div class="row justify-content-center">
			<h2>Employee List Test CI/CD</h2>
		</div>
		<div class="justify-content-center">
			<a href="form.php?mode=add"><button type="button" class="btn btn-primary">ADD</button></a>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Sex</th>
							<th scope="col">Employee Type</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        $index = 0;
                        foreach ($result as $res) {
                            $index++;
                            echo "<tr>";
                            echo '<th scope="row">'.$index.'</th>';
                            echo "<td>".$res['name']."</td>";
                            echo "<td>".$res['email']."</td>";
                            echo "<td>".$res['phone']."</td>";
                            echo '<td>'.$res['sex'].'</td>';
                            echo '<td>'.$res['employee_type'].'</td>	';
                            echo "<td><a href=\"form.php?mode=edit&id=$res[_id]\">Edit</a> | <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                        }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
