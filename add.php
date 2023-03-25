<div class="row justify-content-center">
	<h2>Create Employee</h2>
</div> 
<div class="row justify-content-center">
	<div class="col-12 col-md-10 col-lg-8">
		<form method="POST" >
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="textbox" class="form-control" id="name" name="name" placeholder="Name" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
				</div>
			</div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">Phone</label>
				<div class="col-sm-10">
					<input type="textbox" class="form-control" id="phone" name="phone" placeholder="Phone">
				</div>
			</div>
			<div class="form-group row">
				<label for="address" class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="sex" class="col-sm-2 col-form-label">Sex</label>
				<div class="col-sm-10">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sex" id="sex1" value="M">
						<label class="form-check-label" for="sex1">M</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sex" id="sex2" value="F">
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
                        $result = $db->employee_types->find();
                        foreach ($result as $row){
                            echo '<option value="'.$row['display_name'].'">'.$row['display_name'].'</option>';
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
