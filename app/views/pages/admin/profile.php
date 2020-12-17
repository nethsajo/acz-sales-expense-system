<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">My Profile</span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item active">Profile</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Account Settings</h5>
			</div>
			<div class="card-body">
				<form method="POST" name="formChangePassword" id="formChangePassword" autocomplete="off" data-parsley-validate="true">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Name</label>
								<input type="hidden" value="<?= $_SESSION["account_id"]?>" name="employee_id" id="employee_id" class="form-control">
								<input type="text" value="<?=$data['user']->employee_firstname .' '.  $data['user']->employee_surname;?>" readonly="readonly" class="form-control">
							</div>

							<div class="col-md-6">
								<label>Current Password</label>
								<input type="password" type="password" placeholder="Enter current password" name="current_password" id="current_password" class="form-control" data-parsley-required-message="Please enter your current password" data-parsley-trigger="keyup" data-parsley-required="true">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>New Password</label>
								<input type="password" placeholder="Enter new password" name="new_password" id="new_password" class="form-control" data-parsley-required-message="Please enter your new password" data-parsley-required="true" data-parsley-length="[8,16]" data-parsley-trigger="keyup">
							</div>

							<div class="col-md-6">
								<label>Confirm Password</label>
								<input type="password" placeholder="Repeat new password" name="retype_password" id="retype_password" class="form-control" data-parsley-required-message="Please retype your new password" data-parsley-required="true" data-parsley-equalto="#new_password" data-parsley-trigger="keyup">
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" name="btn-change--pasword" id="btn-change--pasword" class="btn bg-green">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>