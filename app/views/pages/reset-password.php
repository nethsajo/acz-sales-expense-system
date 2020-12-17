<?php if(!isset($_SESSION['correct_security_code'])) {
    redirect('login');
} ?>
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
                    <form ng-app="app" ng-controller="mainController" method="POST" name="formRecoverPassword" id="formRecoverPassword" class="login-form" novalidate>
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Reset your password</h5>
                                    <span class="d-block text-muted">Please set a new password for your account.</span>
                                </div>
                                <input type="hidden" id="token" name="token" value="<?=$data['token'];?>'">
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" name="new_password" id="new_password" ng-minlength=8 ng-model="new_password" required password-verify="{{confirm_password}}" placeholder="Enter your new password">
                                    <input value="<?=$_SESSION['correct_security_code'];?>" name="correct_security_code" id="correct_security_code" type="hidden">
                                    <input value="<?=rand(111111, 999999);?>" name="security_code" id="security_code" type="hidden">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    <span ng-messages="formRecoverPassword.new_password.$error" ng-if="formRecoverPassword.new_password.$dirty">
                                        <strong ng-message="minlength" class="text-danger">Password should be 8 characters.</strong>
                                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                                    </span>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" ng-model="confirm_password" name="confirm_password" id="confirm_password" placeholder="Confirm your new password" required password-verify="{{new_password}}">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                    <span ng-messages="formRecoverPassword.confirm_password.$error" ng-if="formRecoverPassword.confirm_password.$dirty">
                                        <strong ng-message="required" class="text-danger">This field is required.</strong>
                                        <strong ng-show="confirm_password != new_password" class="text-danger">Password not matched.</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" onclick="reset_password()" id="btn-reset--password" ng-disabled="formRecoverPassword.$invalid" class="btn bg-green btn-block">RECOVER MY ACCOUNT <i class="icon-circle-right2 ml-2"></i></button>
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
        <!-- Core JS files -->
        <script src="<?=ASSETS?>js/main/jquery.min.js"></script>
        <script src="<?=ASSETS?>js/main/bootstrap.bundle.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/loaders/blockui.min.js"></script>
        <!-- /Core JS files -->

        <!--Functions JavaScript-->
        <script type="text/javascript" src="<?=ASSETS?>functions/ajax.js"></script>
        <script type="text/javascript" src="<?=ASSETS?>angular/1.4.8.angular.min.js"></script>
        <script type="text/javascript" src="<?=ASSETS?>angular/1.4.2.angular.min.js"></script>
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
        </script>
    </body>
</html>