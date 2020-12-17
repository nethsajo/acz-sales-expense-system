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
		<button id="button_employee" class="btn bg-green mb-3" onclick="modal_add_employee()"><i class="icon-people mr-2"></i><b> NEW EMPLOYEE</b></button>
		<div class="card">
			<table id="show-employee-table" class="table datatable-basic">
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
				<tbody id="show_employee_table"><!--content will go here--></tbody>
			</table>     
		</div>
	</div>
	<div id="modal_employee" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-people mr-2"></i> &nbsp;ADD EMPLOYEE</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formAddEmployee" id="formAddEmployee" autocomplete="off" class="nobottommargin" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<input type="hidden" id="employee_id" name="employee_id" class="form-control" />
								<input type="hidden" id="employee_password" name="employee_password" class="form-control" value="!ACZ<?php echo date("Y");?>" />
								<input type="hidden" id="employee_set_status" name="employee_set_status" class="form-control" value="Not Active" />
								<div class="col-md-4">
									<label for="">Surname <small>*</small></label>
									<input type="text" id="employee_surname" name="employee_surname" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-4">
									<label for="">First Name <small>*</small></label>
									<input type="text" id="employee_firstname" name="employee_firstname" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-4">
									<label for="">Middle Name <small>*</small></label>
									<input type="text" id="employee_middlename" name="employee_middlename" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Employee ID <small>*</small></label>
									<input type="text" id="employee_number" name="employee_number" class="form-control" disabled>
								</div>
								<div class="col-md-4">
									<label for="">Email <small>*</small></label>
									<input type="text" id="employee_email" name="employee_email" placeholder="Email Address" class="form-control" data-parsley-type="email" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-4">
									<label for="">Contact <small>*</small></label>
									<input type="text" id="employee_contact" name="employee_contact" placeholder="Contact Number" class="form-control" data-parsley-type="digits" data-parsley-trigger="keyup" data-parsley-required="true" maxlength="11">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<label for="">Address <small>*</small></label>
									<input type="text" id="employee_address" name="employee_address" placeholder="Home Address" class="form-control" data-parsley-pattern="^(?:[0-9A-Za-z]+[ -])*[0-9A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup">
								</div>
								<div class="col-md-4">
									<label for="">Birth Date <small>*</small></label>
									<input type="date" id="employee_birthdate" name="employee_birthdate" class="form-control" data-parsley-required="true">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="">Gender <small>*</small></label>
									<select id="employee_gender" name="employee_gender" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<option value="M">Male</option>
										<option value="F">Female</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="">Role <small>*</small></label>
									<select id="employee_role" name="employee_role" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data->get_roles() as $row_roles):?>
											<option value="<?=$row_roles['role_id']?>"><?=$row_roles['role_name']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-submit--employee" class="btn bg-green">Add Employee</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal_employee_status" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-eye mr-2"></i> &nbsp; UPDATE EMPLOYEE STATUS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formEditEmployeeStatus" id="formEditEmployeeStatus" autocomplete="off" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="">Status <small>*</small></label>
									<input type="hidden" id="employee_status_id" name="employee_status_id" class="form-control" />
									<select id="employee_status" name="employee_status" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<option value="Active">Active</option>
										<option value="Not Active">Not Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-status--employee" class="btn bg-green">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal_delete_employee" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE EMPLOYEE?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="employee_delete_id" name="employee_delete_id" class="form-control"/>
					<p class="text-center">Are you sure do you want to delete this employee?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" id="data-delete--employee" class="btn bg-green" onclick="delete_employee_by_id(this.value)">Confirm</button>
				</div>
			</div>
		</div>
	</div>