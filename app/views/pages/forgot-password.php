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
                    <!-- Password recovery form -->
                    <form ng-app="app" ng-controller="mainController" method="POST" name="formForgotPassword" id="formForgotPassword" class="login-form" novalidate>
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Password Recovery</h5>
                                    <span class="d-block text-muted">We'll send you instructions in email</span>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="email" class="form-control" id="forgot_password_email" name="forgot_password_email" ng-model="forgot_password_email" placeholder="Your email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-mail5 text-muted"></i>
                                    </div>
                                    <span ng-messages="formForgotPassword.forgot_password_email.$error" ng-if="formForgotPassword.forgot_password_email.$dirty">
                                        <strong ng-message="pattern" class="text-danger">Please enter valid email.</strong>
                                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" onclick="forgot()" name="btn-forgot--password" id="btn-forgot--password" ng-disabled="formForgotPassword.$invalid" class="btn bg-green btn-block"><i class="icon-paperplane mr-2"></i> CONTINUE</button>
                                </div>

                                <div class="text-center">
								    <a href="<?=URL?>login" class="text-success">Sign in your account</a>
							    </div>
                            </div>
                        </div>
                    </form>
                    <!-- /password recovery form -->
                </div>
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
        <script type="text/javascript">
            var app = angular.module('app', ['ngMessages']);
            app.controller('mainController',function($scope){});
            toastr_option();
        </script>
    </body>
</html>