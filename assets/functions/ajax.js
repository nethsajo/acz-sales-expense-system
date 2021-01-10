var url = getAbsolutePath();

function login() {
    var data = $('#formLogin').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'login/auth',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-login').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success:function(data) {
            data.success === true ? location.href = data.url : notify(data.type,data.message);
            $('#btn-login').html('Sign in <i class="icon-circle-right2 ml-2"></i>').attr('disabled',false);
        }
    });
}

function forgot() {
    var forgot_password_email = $('#forgot_password_email').val();

    $.ajax({
        type : 'POST',
        url : url + 'send_email',
        data :{ forgot_password_email : forgot_password_email },
        dataType : 'json',
        beforeSend:function() {
            $('#btn-forgot--password').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-forgot--password').html('<i class="icon-paperplane mr-2"></i> CONTINUE').attr('disabled',false);
        }
    });
}

function validate_code() {
    var data = $('#formSecurityCode').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'validate_security_code',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-security--code').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success:function(data) {
            data.success === true ? location.href = data.url : notify(data.type,data.message);
            $('#btn-security--code').html('VALIDATE').attr('disabled',false);
        }
    });
}

function reset_password() {
    var data = $('#formRecoverPassword').serialize();

    $.ajax({
        type : 'POST',
        url : url + 'update_password',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-reset--password').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success:function(data) {
            data.success === true ? location.href = data.url : notify(data.type,data.message);
            $('#btn-reset--password').html('RECOVER MY ACCOUNT <i class="icon-circle-right2 ml-2"></i>').attr('disabled',false);
        }
    });
}

function update_password() {
    var data = $('#formChangePassword').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'UpdatePassword',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-change--password').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-change--password').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    })
}

function graph() {
    $.ajax({
        url: url + 'chart',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "caption": "Expense Category Comparative",
                "subCaption": "ACZ Digital and Printing Services",
                "xAxisName": "Category",
                "yAxisName": "Sum of Total",
                "rotatevalues": "2",
                "theme": "fint",
                "drawcrossline": "1"
            };

            apiChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container',
                width: '95%',
                height: '350',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
}

function employee_modal() {
    var modal = $('#employee-modal');
    $.ajax({
        type: 'POST', url: url + 'GenerateEmployeeNumber', dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#btn-employee')).html('Add Employee <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
            modal.find($('#employee_id')).val('');
            modal.find($('#employee_surname')).val('');
            modal.find($('#employee_firstname')).val('');
            modal.find($('#employee_middlename')).val('');
            modal.find($('#employee_email')).val('');
            modal.find($('#employee_number')).val(data.employee_number);
            modal.find($('#employee_contact')).val('');
            modal.find($('#employee_address')).val('');
            modal.find($('#employee_birthdate')).val('');
            modal.find($('#employee_gender')).val('');
            modal.find($('#employee_role')).val('');
        }
    });
}

function InsertOrUpdateEmployee() {
    var data = $('#formEmployee').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateEmployee',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-employee').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Employee';
            $('#btn-employee').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            $('#employee-modal').modal('hide');
        }
    });
}

function view_employee(employee_id) {
    var modal = $('#employee-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetInformationById', 
        data: { employee_id : employee_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#employee_id')).val(data.employee_id);
            modal.find($('#employee_surname')).val(data.employee_surname);
            modal.find($('#employee_firstname')).val(data.employee_firstname);
            modal.find($('#employee_middlename')).val(data.employee_middlename);
            modal.find($('#employee_email')).val(data.employee_email);
            modal.find($('#employee_number')).val(data.employee_number);
            modal.find($('#employee_contact')).val(data.employee_contact);
            modal.find($('#employee_address')).val(data.employee_address);
            modal.find($('#employee_birthdate')).val(data.employee_birthdate);
            modal.find($('#employee_gender')).val(data.employee_gender);
            modal.find($('#employee_role')).val(data.role_id);
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; UPDATE EMPLOYEE DETAILS');
            $('#btn-employee').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function view_employee_status(id) {
    var modal = $('#employee-status-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetInformationById', 
        data: { employee_id : id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#employee_status_id')).val(data.employee_id);
            modal.find($('#employee_status')).val(data.employee_status);
        }
    }); 
}

function UpdateEmployeeStatus() {
    var data = $('#formEmployeeStatus').serialize();
    $.ajax({
        type: 'POST', 
        url: url + 'EditEmployeeStatus', 
        data: data, 
        dataType: 'json',
        beforeSend:function() {
            $('#btn-employee--status').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success: function (data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-reset--password').html('Save Changes').attr('disabled',false);
            $('#employee-status-modal').modal('hide');
        }
    });
}

function delete_employee(employee_id) {
    var modal = $('#employee-delete-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    modal.find($("#btn-delete--employee")).val(employee_id);
}

function DeleteEmployeeById(employee_id) {
    var modal = $('#employee-delete-modal');
    var data = { employee_delete_id : employee_id, token : $('#token').val() };
    $.ajax({
        type : 'POST',
        url : url + 'DeleteEmployeeById',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete--employee').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            modal.modal('hide');
            notify(data.type,data.message);
        }
    });
}

function banks_modal() {
    var modal = $('#banks-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formBanks')[0].reset();
    
    modal.find($('#btn-banks')).html('Add Bank <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function InsertOrUpdateBanks() {
    var data = $('#formBanks').serialize();
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateBanks',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-banks').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Bank';
            $('#btn-banks').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            $('#banks-modal').modal('hide');
        }
    });
}

function view_banks(bank_id) {
    var modal = $('#banks-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetBanksById', 
        data: { bank_id : bank_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#bank_id')).val(data.bank_id);
            modal.find($('#bank_name')).val(data.bank_name);
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; UPDATE BANK NAME');
            $('#btn-banks').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function delete_banks(bank_id) {
    var modal = $('#bank-delete-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    modal.find($("#btn-delete--bank")).val(bank_id);
}

function DeleteBankById(bank_id) {
    var modal = $('#bank-delete-modal');
    var data = { bank_delete_id : bank_id, token : $('#token').val() };
    $.ajax({
        type : 'POST',
        url : url + 'DeleteBankById',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete--bank').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            modal.modal('hide');
            notify(data.type,data.message);
        }
    });
}

function category_expense_modal() {
    var modal = $('#category-expense-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formExpenseCategory')[0].reset();
    
    modal.find($('#btn-expense--category')).html('Add Category <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function InsertOrUpdateExpenseCategory() {
    var data = $('#formExpenseCategory').serialize();
    var modal = $('#category-expense-modal');
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateExpenseCategory',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-expense--category').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Category';
            $('#btn-expense--category').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            modal.modal('hide');
        }
    });
}

function view_expense_category(category_id) {
    var modal = $('#category-expense-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetExpenseCategoryById', 
        data: { expense_category_id : category_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#expense_category_id')).val(data.category_id);
            modal.find($('#expense_category_name')).val(data.category_name);
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; UPDATE CATEGORY NAME');
            $('#btn-expense--category').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function delete_expense_category(category_id) {
    var modal = $('#expense-delete-category-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    modal.find($("#btn-delete-expense--category")).val(category_id);
}

function DeleteExpenseCategoryById(category_id) {
    var modal = $('#expense-delete-category-modal');
    var data = { expense_category_delete_id : category_id, token : $('#token').val() };
    $.ajax({
        type : 'POST',
        url : url + 'DeleteExpenseCategoryById',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete-expense--category').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            modal.modal('hide');
            notify(data.type,data.message);
        }
    });
}

function payee_modal() {
    var modal = $('#payee-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formExpensePayee')[0].reset();
    
    modal.find($('#btn-expense--payee')).html('Add Payee <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
}

function InsertOrUpdatePayee() {
    var data = $('#formExpensePayee').serialize();
    var modal = $('#payee-modal');
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdatePayee',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-expense--payee').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Payee';
            $('#btn-expense--payee').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            modal.modal('hide');
        }
    });
}

function view_payee(payee_id) {
    var modal = $('#payee-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetPayeeById', 
        data: { expense_payee_id : payee_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#expense_payee_id')).val(data.payee_id);
            modal.find($('#expense_payee_name')).val(data.payee_name);
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; UPDATE PAYEE');
            $('#btn-expense--payee').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function delete_payee(payee_id) {
    var modal = $('#payee-delete-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    modal.find($("#btn-delete--payee")).val(payee_id);
}

function DeletePayeeById(payee_id) {
    var modal = $('#payee-delete-modal');
    var data = { payee_delete_id : payee_id, token : $('#token').val() };
    $.ajax({
        type : 'POST',
        url : url + 'DeletePayeeById',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete--payee').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            notify(data.type,data.message);
            modal.modal('hide');
        }
    });
}

function expense_modal() {
    var modal = $('#expense-transaction-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formExpenseTransaction')[0].reset();
    
    modal.find($('#btn-expense--transaction')).html('Add Expense <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
    modal.find($('#expense_qty')).val(0);
    modal.find($('#expense_price_unit')).val(0);
    modal.find($('#expense_discount')).val(0);
    modal.find($('#expense_vat')).val(0);
}

function InsertOrUpdateExpense() {
    var data = $('#formExpenseTransaction').serialize();
    var modal = $('#expense-transaction-modal');
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateExpenseTransaction',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-expense--transaction').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Expense';
            $('#btn-expense--transaction').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            modal.modal('hide');
        }
    });
}

function view_expense_transaction(expense_id) {
    var modal = $('#expense-transaction-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetExpenseTransactionById', 
        data: { expense_id : expense_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#expense_id')).val(expense_id);
            modal.find($('#expense_vendor')).val(data.expense_vendor);
            modal.find($('#expense_category')).val(data.expense_category);
            modal.find($('#expense_si')).val(data.expense_si);
            modal.find($('#expense_or')).val(data.expense_or);
            modal.find($('#expense_tin')).val(data.expense_tin);
            modal.find($('#expense_particular')).val(data.expense_particular);
            modal.find($('#expense_unit')).val(data.expense_unit);
            modal.find($('#expense_payee')).val(data.expense_payee);
            modal.find($('#expense_bank')).val(data.expense_bank);
            modal.find($('#expense_cvno')).val(data.expense_cvno);
            modal.find($('#expense_cn')).val(data.expense_cn);
            modal.find($('#expense_check_date')).val(data.expense_check_date);
            modal.find($('#expense_qty')).val(data.expense_qty);
            modal.find($('#expense_price_unit')).val(data.expense_price_unit);
            modal.find($('#expense_discount')).val(data.expense_discount);
            modal.find($('#expense_vat')).val(data.expense_vat);
            modal.find($('#expense_total_price')).val(data.expense_total);
            $('#modal-title').html('<i class="icon-file-spreadsheet mr-2"></i>&nbsp; UPDATE EXPENSE DETAILS');
            $('#btn-expense--transaction').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function view_remarks(id) {
    var modal = $('#expense-remarks-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetExpenseTransactionById', 
        data: { expense_id : id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#expense_details_id')).val(id);
            modal.find($('#expense_remarks')).val(data.expense_remarks);
        }
    }); 
}

function UpdateExpenseRemarks() {
    var data = $('#formExpenseRemarks').serialize();
    var modal = $('#expense-remarks-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'EditExpenseRemarks', 
        data: data, 
        dataType: 'json',
        beforeSend:function() {
            $('#btn-expense--remarks').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled', true);
        },
        success: function (data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            $('#btn-expense--remarks').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            modal.modal('hide');
        }
    });
}

function delete_expense_transaction(expense_id) {
    var modal = $('#expense-delete-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    modal.find($("#btn-delete--expense")).val(expense_id);
}

function DeleteExpensesById(expense_id) {
    var modal = $('#expense-delete-modal');
    var data = { expense_delete_id : expense_id, token : $('#token').val() };
    $.ajax({
        type : 'POST',
        url : url + 'DeleteExpensesById',
        data : data,
        dataType : 'json',
        beforeSend:function(){
            $('#btn-delete--payee').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            notify(data.type,data.message);
            modal.modal('hide');
        }
    });
}

//Sales
function sales_modal() {
    var modal = $('#sales-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formSales')[0].reset();
    
    modal.find($('#btn-sales')).html('Add Sales <i class="icon-arrow-right14 position-right"></i>').attr('disabled',true);
    modal.find($('#sales_width')).val(0);
    modal.find($('#sales_height')).val(0);
    modal.find($('#sales_price_unit')).val(0);
    modal.find($('#sales_qty')).val(0);
    modal.find($('#sales_vat')).val(0);
    modal.find($('#sales_amount_due')).val(0);
    modal.find($('#sales_discount')).val(0);
    modal.find($('#sales_net_amount')).val(0);
}

function InsertOrUpdateSales() {
    var data = $('#formSales').serialize();
    var modal = $('#sales-modal');
    $.ajax({
        type : 'POST',
        url : url + 'InsertOrUpdateSales',
        data : data,
        dataType : 'json',
        beforeSend:function() {
            $('#btn-sales').html(' <i class="icon-spinner2 spinner"></i>').attr('disabled',true);
        },
        success:function(data) {
            data.success === true ? notify(data.type,data.message) : notify(data.type,data.message);
            var content = data.type == 'info' ? 'Save Changes' : 'Add Sales';
            $('#btn-sales').html(content +' <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
            modal.modal('hide');
        }
    });
}

function view_sales(sales_id) {
    var modal = $('#sales-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'GetSalesById', 
        data: { sales_id : sales_id }, 
        dataType: 'json',
        success: function (data) {
            modal.modal({ backdrop: 'static', keyboard: false});
            modal.find($('#sales_id')).val(sales_id);
            modal.find($('#sales_po')).val(data.sales_po);
            modal.find($('#sales_so')).val(data.sales_so);
            modal.find($('#sales_dr')).val(data.sales_dr);
            modal.find($('#sales_si')).val(data.sales_si);
            modal.find($('#sales_particulars')).val(data.sales_particulars);
            modal.find($('#sales_media')).val(data.sales_media);
            modal.find($('#sales_width')).val(data.sales_width);
            modal.find($('#sales_height')).val(data.sales_height);
            modal.find($('#sales_unit')).val(data.sales_unit);
            modal.find($('#sales_total_area')).val(data.sales_total_area);
            modal.find($('#sales_price_unit')).val(data.sales_price_unit);
            modal.find($('#sales_sub_total')).val((parseFloat(data.sales_total_area) * parseFloat(data.sales_price_unit)).toFixed(2));
            modal.find($('#sales_qty')).val(data.sales_qty);
            modal.find($('#sales_total')).val(data.sales_total);
            modal.find($('#sales_vat')).val(data.sales_vat);
            modal.find($('#sales_amount_due')).val((parseFloat(data.sales_total) + parseFloat(data.sales_vat)).toFixed(2));
            modal.find($('#sales_discount')).val(data.sales_discount);
            modal.find($('#sales_net_amount')).val(data.sales_net_amount);
            $('#modal-title').html('<i class="icon-add-to-list mr-2"></i>&nbsp; UPDATE SALES DETAILS');
            $('#btn-sales').html('Save Changes <i class="icon-arrow-right14 position-right"></i>').attr('disabled',false);
        }
    });
}

function view_payment(sales_id) {
    var modal = $('#payment-sales-modal');
    modal.modal({ backdrop: 'static', keyboard: false});
    $('#formPayment')[0].reset();
}

function notify(type,message) {
    Command: toastr[type](message)
}

function toastr_option() {
    toastr.options = {
        "newestOnTop": true, "progressBar": false, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": 300, "hideDuration": 1000, "timeOut": 3000, "extendedTimeOut": 1000, "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", onHidden: function(){ location.reload(); }
    }
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}