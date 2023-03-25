<?php 
include_once("config.php");
$mode = isset($_GET['mode'])?$_GET['mode']:'add';
if ($_POST) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$sex = $_POST['sex'];
		$employee_types = $_POST['employee_types'];
        $db->employees->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' =>
            [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'sex' => $sex,
                'employee_type' => $employee_types
            ]
        ]);
        header("Location:index.php");
		return;
	}else{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$sex = $_POST['sex'];
		$employee_types = $_POST['employee_types'];
        $insertOneResult = $db->employees->insertOne([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'sex' => $sex,
            'employee_type' => $employee_types
        ]);
        header("Location:index.php");
		return;
	}
}
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
		<?php
		if ($mode == 'add') {
			include_once("add.php");
		}elseif ($mode == 'edit') {
			include_once("edit.php");
		}else{
			echo "404 not found!";
		}
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>