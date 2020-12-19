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

        <!-- Theme JS files -->
        <script src="<?=ASSETS?>js/plugins/tables/datatables/datatables.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/responsive.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/forms/selects/select2.min.js"></script>

        <script src="<?=ASSETS?>js/app.js"></script>
        <script src="<?=ASSETS?>js/custom.js"></script>
        <!-- Theme JS files -->

        <!--Parsley Validation-->
        <script src="<?=ASSETS?>js/parsley/parsley.min.js"></script>
        <!-- /Parsley Validation-->

        <!---Amaran Notification-->
        <script src="<?=ASSETS?>js/amaran/jquery.amaran.min.js"></script>
        <!-- /Amaran Notification-->
        <script type="text/javascript">
            var app = angular.module('app', ['ngMessages']);
            app.controller('mainController',function($scope){});

            toastr_option();
        </script>

        <script type="text/javascript">
            implement_employee_datatable();
            implement_bank_datatable();
            implement_expense_category_datatable();
            implement_payee_datatable();
            implement_logs_datatable();
        </script>
    </body>
</html>
