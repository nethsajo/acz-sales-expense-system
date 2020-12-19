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
                <h5 class="card-title">Profile Information</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Employee Number</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_number;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Name</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data['user']->employee_firstname .' '.  $data['user']->employee_surname;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_email;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Contact</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_contact;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Address</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_address;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Birth Date</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_birthdate;?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Gender</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="text" value="<?=$data["user"]->employee_gender == 'M' ? 'Male' : 'Female';?>" class="form-control" readonly="readonly">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Account Settings</h5>
            </div>
            <div class="card-body">
            <form method="POST" name="formChangePassword" id="formChangePassword" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token'];?>'">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Current Password</label>
								<input type="password" type="password" placeholder="Enter current password" name="current_password" id="current_password" class="form-control" ng-model="current_password" required>
								<span ng-messages="formChangePassword.current_password.$error" ng-if="formChangePassword.current_password.$dirty">
									<strong ng-message="required" class="text-danger">This field is required.</strong>
								</span>
							</div>
							<div class="col-md-4">
								<label>New Password</label>
								<input type="password" placeholder="Enter new password" name="new_password" id="new_password" class="form-control" ng-minlength=8 ng-model="new_password" required password-verify="{{retype_password}}">
								<span ng-messages="formChangePassword.new_password.$error" ng-if="formChangePassword.new_password.$dirty">
									<strong ng-message="minlength" class="text-danger">Password should be 8 characters.</strong>
									<strong ng-message="required" class="text-danger">This field is required.</strong>
								</span>
							</div>
							<div class="col-md-4">
								<label>Confirm Password</label>
								<input type="password" placeholder="Repeat new password" name="retype_password" id="retype_password" class="form-control" ng-model="retype_password" required password-verify="{{new_password}}">
								<span ng-messages="formChangePassword.retype_password.$error" ng-if="formChangePassword.retype_password.$dirty">
									<strong ng-message="required" class="text-danger">This field is required.</strong>
									<strong ng-show="retype_password != new_password" class="text-danger">Password not matched.</strong>
								</span>
							</div>
						</div>
                    </div>
					<div class="text-right">
						<button type="submit" onclick="update_password()" ng-disabled="formChangePassword.$invalid" name="btn-change--password" id="btn-change--password" class="btn bg-green">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
            </div>
        </div>
    </div>