<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Employees</span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Manage Account</span>
					<span class="breadcrumb-item active">Employee</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button onclick="employee_modal()" class="btn bg-green mb-3"><i class="icon-people mr-2"></i><b> NEW EMPLOYEE</b></button>
		
		<div class="card">
			<table id="show-employee-table" class="table datatable-responsive">
				<thead>
					<tr>
						<th>Employee Number</th>	
						<th>Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Status</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['employees'] as $row) { ?> 
						<?php $employee_status = ($row['employee_status'] == "Active") ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Not Active</span>';?>
						<tr>
							<td><?=$row['employee_number'];?></td>
							<td><?=$row['employee_surname'];?>, <?=$row['employee_firstname'];?></td>
							<td><?=$row['employee_email'];?></td>
							<td><?=$row['employee_contact'];?></td>
							<td><?=$employee_status;?></td>
							<td style="text-align:center"><a onclick="view_employee('<?=$row['employee_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="view_employee_status('<?=$row['employee_id']?>')" style="cursor:pointer" alt="Status"><i class="icon-eye text-teal-800"></i></a></td>
							<td style="text-align:center"><a onclick="delete_employee('<?=$row['employee_id']?>')" style="cursor:pointer" alt="Remove"><i class="icon-trash text-warning-800"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>     
		</div>
	</div>

	<div id="employee-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-people mr-2"></i> &nbsp;ADD EMPLOYEE</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formEmployee" id="formEmployee" novalidate>
					<input type="hidden" id="token" name="token" class="form-control" value="<?=$data['token']?>'">
					<input type="hidden" id="employee_id" name="employee_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Surname <small>*</small></label>
									<input type="text" id="employee_surname" name="employee_surname" placeholder="Surname" class="form-control" ng-pattern ="/^[a-zA-Z\s]*$/" ng-model="employee_surname" required>
									<span ng-messages="formEmployee.employee_surname.$error" ng-if="formEmployee.employee_surname.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">First Name <small>*</small></label>
									<input type="text" id="employee_firstname" name="employee_firstname" placeholder="First Name" class="form-control" ng-pattern ="/^[a-zA-Z\s]*$/" ng-model="employee_firstname" required>
									<span ng-messages="formEmployee.employee_firstname.$error" ng-if="formEmployee.employee_firstname.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Middle Name <small>*</small></label>
									<input type="text" id="employee_middlename" name="employee_middlename" placeholder="Middle Name (optional)" class="form-control" ng-pattern ="/^[a-zA-Z\s]*$/" ng-model="employee_middlename">
									<span ng-messages="formEmployee.employee_middlename.$error" ng-if="formEmployee.employee_middlename.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Employee Number <small>*</small></label>
									<input type="text" id="employee_number" name="employee_number" ng-model="employee_number" class="form-control" readonly>
								</div>
								<div class="col-md-4">
									<label for="">Email <small>*</small></label>
									<input type="text" id="employee_email" name="employee_email" placeholder="Email Address" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" ng-model="employee_email" required>
									<span ng-messages="formEmployee.employee_email.$error" ng-if="formEmployee.employee_email.$dirty">
										<strong ng-message="pattern" class="text-danger">Please enter a valid email address.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Contact <small>*</small></label>
									<input type="text" id="employee_contact" name="employee_contact" placeholder="Contact Number" class="form-control" ng-pattern="/^[0-9]*$/" ng-model="employee_contact" maxlength="11" required>
									<span ng-messages="formEmployee.employee_contact.$error" ng-if="formEmployee.employee_contact.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type valid number..</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="">Address <small>*</small></label>
									<input type="text" id="employee_address" name="employee_address" placeholder="Home Address" class="form-control" ng-model="employee_address" required>
									<span ng-messages="formEmployee.employee_address.$error" ng-if="formEmployee.employee_address.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Birth Date <small>*</small></label>
									<input type="date" id="employee_birthdate" name="employee_birthdate" class="form-control" ng-model="employee_birthdate" required>
									<span ng-messages="formEmployee.employee_birthdate.$error" ng-if="formEmployee.employee_birthdate.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="">Gender <small>*</small></label>
									<select id="employee_gender" name="employee_gender" class="form-control" ng-model="employee_gender" required>
										<option value="" disabled selected>Select your option</option>
										<option value="M">Male</option>
										<option value="F">Female</option>
									</select>
									<span ng-messages="formEmployee.employee_gender.$error" ng-if="formEmployee.employee_gender.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-6">
									<label for="">Role <small>*</small></label>
									<select id="employee_role" name="employee_role" class="form-control" ng-model="employee_role" required>
										<option value="" disabled selected>Select your option</option>
										<?php foreach($data['roles'] as $row) { ?> 
											<option value="<?=$row['role_id']?>"><?=$row['role_name']?></option>
										<?php } ?>
									</select>
									<span ng-messages="formEmployee.employee_role.$error" ng-if="formEmployee.employee_role.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit"  ng-disabled="formEmployee.$invalid" id="btn-employee" name="btn-employee" onclick="InsertOrUpdateEmployee()"class="btn bg-green">Add Employee</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="employee-status-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-eye mr-2"></i> &nbsp; UPDATE EMPLOYEE STATUS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formEmployeeStatus" id="formEmployeeStatus" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="">Status <small>*</small></label>
									<input type="hidden" id="employee_status_id" name="employee_status_id" class="form-control">
									<select id="employee_status" name="employee_status" class="form-control" ng-model="employee_status" required>
										<option value="" disabled selected>Select your option</option>
										<option value="Active">Active</option>
										<option value="Not Active">Not Active</option>
									</select>
									<span ng-messages="formEmployeeStatus.employee_status.$error" ng-if="formEmployeeStatus.employee_status.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" ng-disabled="formEmployeeStatus.$invalid" onclick="UpdateEmployeeStatus()" id="btn-employee--status" class="btn bg-green">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="employee-delete-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE EMPLOYEE?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="formDeleteEmployee" id="formDeleteEmployee" method="POST" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
					<div class="modal-body">
						<input type="hidden" id="employee_delete_id" name="employee_delete_id" class="form-control"/>
						<p class="text-center">Are you sure do you want to delete this employee?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="btn-delete--employee" class="btn bg-green" onclick="DeleteEmployeeById(this.value)">Confirm <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>