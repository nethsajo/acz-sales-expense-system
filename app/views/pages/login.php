<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$data['title']?> - <?=COMPANY_NAME?></title>
        <!-- Stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/components.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>css/colors.min.css" rel="stylesheet" type="text/css">
        <link href="<?=ASSETS?>toastr/css/toastr.min.css" rel="stylesheet" type="text/css">
        <!-- /Stylesheets -->
        <!-- Amaran Notification  -->
        <link href="<?=ASSETS?>css/parsley/parsley.css" rel="stylesheet" type="text/css" />
        <!-- Amaran Notification  -->
        <link href="<?=ASSETS?>css/amaran.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=ASSETS?>css/animate.min.css" rel="stylesheet" type="text/css"/>
    </head>
	
    <body>
		<!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">
                    <!-- Login form -->
                    <form ng-app="app" ng-controller="mainController" method="POST" name="formLogin" id="formLogin" class="login-form" autocomplete="off" novalidate>
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>
								<input type="hidden" id="token" name="token" value="<?=$data['token'];?>'">
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" name="account_number" id="account_number" ng-model="account_number" placeholder="Employee ID" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
									<span ng-messages="formLogin.account_number.$error" ng-if="formLogin.account_number.$dirty">
										<strong ng-message="required" class="text-danger">Employee Number is required.</strong>
									</span>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" name="account_password" id="account_password" ng-model="account_password" placeholder="Password" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
									<span ng-messages="formLogin.account_password.$error" ng-if="formLogin.account_password.$dirty">
										<strong ng-message="required" class="text-danger">Password is required.</strong>
									</span>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <a href="<?=URL?>login/forgot_password" class="ml-auto text-success">Forgot password?</a>
							    </div>
                                <div class="form-group">
                                    <button type="submit" onclick="login()" id="btn-login" name="btn-login" ng-disabled="formLogin.$invalid" class="btn bg-green btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->
                </div>
                <!-- /content area -->
                <!-- Footer -->
                <div class="card mb-0">
                    <div class="card-body p-2">
                        <div class="text-center">
                            <span>ACZ Digital and Printing Services <?= date("Y"); ?></span>
                        </div>
                    </div>
                </div>
                <!-- /Footer -->
            </div>
        </div>
	    <!-- /page content -->

        <!-- Core JS files -->
        <script src="<?=ASSETS?>js/main/jquery.min.js"></script>
        <script src="<?=ASSETS?>js/main/bootstrap.bundle.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/loaders/blockui.min.js"></script>
        <!-- /Core JS files -->

        <!--Functions JavaScript-->
        <script type="text/javascript" src="<?=ASSETS?>functions/ajax.js"></script>
		<script type="text/javascript" src="<?=ASSETS?>angular/1.4.8.angular.min.js"></script>
		<script type="text/javascript" src="<?=ASSETS?>angular/1.4.2.angular.min.js"></script>
        <script type="text/javascript" src="<?=ASSETS?>toastr/js/toastr.min.js"></script>
        <!--/Functions JavaScript-->

        <!--Parsley Validation-->
        <script type="text/javascript" src="<?=ASSETS?>js/parsley/parsley.min.js"></script>
        <!-- /Parsley Validation-->

        <!---Amaran Notification-->
        <script type="text/javascript" src="<?=ASSETS?>js/amaran/jquery.amaran.min.js"></script>
        <!-- /Amaran Notification-->
        <?php if(isset($_SESSION['message'])) { ?>
            <script type="text/javascript">
                Command: toastr["success"]('<?=$_SESSION['message'];?>')
            </script>
        <?php unset($_SESSION['message']); } ?>
        <script type="text/javascript">
            var app = angular.module('app', ['ngMessages']);
            app.controller('mainController',function($scope){});
            toastr_option();
        </script>
    </body>
</html>