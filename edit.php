<?php
include_once("config.php");
$id = isset($_GET['id'])?$_GET['id']:'notfound';
if ($id != 'notfound'):
    $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
    $options = [];
    $employee = $db->employees->find($filter,$options);
    foreach ($employee as $info){
?>
		<div class="row justify-content-center">
			<h2>Edit Employee</h2>
		</div> 
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">
				<form method="POST" >
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="hidden" class="form-control" id="id" name="id" placeholder="id" required="required" value="<?php echo $info['_id'] ?>">
							<input type="textbox" class="form-control" id="name" name="name" placeholder="Name" required="required" value="<?php echo $info['name'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required"  value="<?php echo $info['email'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-sm-2 col-form-label">Phone</label>
						<div class="col-sm-10">
							<input type="textbox" class="form-control" id="phone" name="phone" placeholder="Phone"  value="<?php echo $info['phone'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"> <?php echo $info['address'] ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="sex" class="col-sm-2 col-form-label">Sex</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="sex1" value="M" <?php echo ($info['sex'] == 'M' ?  'checked':'')?> >
								<label class="form-check-label" for="sex1">M</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="sex2" value="F" <?php echo ($info['sex'] == 'F' ? 'checked':'') ?> >
								<label class="form-check-label" for="sex2">F</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="employee_types" class="col-sm-2 col-form-label">Employee Type</label>
						<div class="col-sm-10">
							<select id="employee_types" name="employee_types" class="form-control" required="required">
								<option selected>Choose...</option>
								<?php
                                $employee_types = $db->employee_types->find();
                                foreach ($employee_types as $type){
                                    $selected = $info['employee_type'] == $type['display_name'] ? 'selected="selected"':'';
                                    echo '<option value ="'.$type['display_name'].'" '.$selected.'>'.$type['display_name'].'</option>';
                                }
								?>
							</select>
						</div>
					</div>
					<div class="justify-content-center">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="index.php"><button class="btn btn-danger">Cancel</button></a>
					</div>
				</form>
			</div>
		</div>
	<?php }
endif ?>
