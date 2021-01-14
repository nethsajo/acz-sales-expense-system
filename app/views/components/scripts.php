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
            app.controller('mainController',function($scope){
                $scope.payment = {};
                $scope.payment.payment_amount = '';
            });

            toastr_option();

            graph();
            graph_collected_uncollected();
            graph_media();
        </script>

        <script type="text/javascript">
            $('#expense_price_unit, #expense_qty').keyup(function(){
                var price_unit = parseFloat($('#expense_price_unit').val()) || 0;
                var qty = parseFloat($('#expense_qty').val()) || 0;

                $('#expense_total_price').val((price_unit * qty).toFixed(2));    
            });

            $('#sales_width, #sales_height').keyup(function(){
                var width = parseFloat($('#sales_width').val()) || 0;
                var height = parseFloat($('#sales_height').val()) || 0;

                $('#sales_total_area').val((width * height).toFixed(2));
            });

            $('#sales_price_unit').keyup(function(){
                var price_unit = parseFloat($('#sales_price_unit').val()) || 0;
                var total_area = parseFloat($('#sales_total_area').val()) || 0;

                $('#sales_sub_total').val((price_unit * total_area).toFixed(2));
            });

            $('#sales_qty').keyup(function(){
                var qty = parseFloat($('#sales_qty').val()) || 0;
                var sub_total = parseFloat($('#sales_sub_total').val()) || 0;
                var vat = 0.12;

                var sales_total = $('#sales_total').val((qty * sub_total).toFixed(2)).val();

                var sales_vat = $('#sales_vat').val((sales_total * vat).toFixed(2)).val();

                $('#sales_amount_due').val((parseFloat(sales_total) + parseFloat(sales_vat)).toFixed(2));
            });

            $('#sales_discount').keyup(function(){
                var discount = parseFloat($('#sales_discount').val()) || 0;
                var amount_due = parseFloat($('#sales_amount_due').val()) || 0;

                $('#sales_net_amount').val((amount_due - discount).toFixed(2));
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                implement_employee_datatable();
                implement_bank_datatable();
                implement_expense_category_datatable();
                implement_payee_datatable();
                implement_media_datatable();
                implement_logs_datatable();
                implement_expense_datatable();
                implement_cm_datatable();
                implement_emr_datatable();
                implement_sales_datatable();
                implement_employee_sales_datatable();
                implement_payment_datatable();
            });
        </script>
    </body>
</html>
