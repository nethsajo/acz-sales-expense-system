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
        <script src="<?=ASSETS?>js/plugins/ui/moment/moment.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/datatables.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/responsive.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
        <script src="<?=ASSETS?>js/plugins/forms/selects/select2.min.js"></script>

        <script src="<?=ASSETS?>js/app.js"></script>
        <script src="<?=ASSETS?>js/custom.js"></script>

        <script src="<?=ASSETS?>graph/fusioncharts.js"></script>
        <script src="<?=ASSETS?>graph/fusioncharts.charts.js"></script>
        <script src="<?=ASSETS?>graph/themes/fusioncharts.theme.zune.js"></script>
        <script src="<?=ASSETS?>graph/themes/fusioncharts.theme.ocean.js"></script>
        <script src="<?=ASSETS?>graph/themes/fusioncharts.theme.carbon.js"></script>
        <script src="<?=ASSETS?>graph/themes/fusioncharts.theme.fint.js"></script>
        <script src="<?=ASSETS?>js/jquery-ui.js"></script>
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

            graph();
        </script>

        <script type="text/javascript">
            $('#expense_price_unit, #expense_qty').keyup(function(){
                var price_unit = parseFloat($('#expense_price_unit').val()) || 0;
                var qty = parseFloat($('#expense_qty').val()) || 0;

                $('#expense_total_price').val((price_unit * qty).toFixed(2));    
            });
            
            implement_employee_datatable();
            implement_bank_datatable();
            implement_expense_category_datatable();
            implement_payee_datatable();
            implement_logs_datatable();
            implement_expense_datatable();

            $(document).ready(function(){
                implement_cm_table();
            });
        </script>
    </body>
</html>
