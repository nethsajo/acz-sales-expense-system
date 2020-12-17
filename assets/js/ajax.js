var url = '../../class/functions.php';


// #region Accounts
function account_login() {
    $('document').ready(function(){
        $("#account-login-form").parsley();
        $("#account-login-form").on('submit', function(e){
            e.preventDefault();
            if($("#account-login-form").parsley().isValid()) {
                var data = {
                    action: 'Login',
                    account_number : $("#account_number").val(), 
                    account_password : $("#account_password").val()
                }
    
                $.ajax({
                    type: 'POST', url: '../class/functions.php', data: data, cache: false, dataType: 'json',
                    beforeSend:function() {
                        $("#account_login").attr('disabled', 'disabled');
                    },
                    success:function(data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $("#account_login").attr('disabled', false);
                        
                        if(data.success && data.role_id == 1) {
                            location.href = "admin/dashboard.php";
                        } else if (data.success && data.role_id == 2) {
                            location.href = "employee/index.php";
                        } else {
                            return;
                        }
                    }
                });
            }
        });
    });
}

function change_password() {
    $('document').ready(function(){
        $("#formChangePassword").parsley();
        $("#formChangePassword").on('submit', function(e){
            e.preventDefault();

            if($("#formChangePassword").parsley().isValid()) {
                var data = {
                    action: 'Change Password', employee_id: $("#employee_id").val(),
                    current_password: $("#current_password").val(), new_password: $("#new_password").val()
                };
                
                $.ajax({
                    type: 'POST', url: url, data: data, cache: false, dataType: 'json',
                    success:function(data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $("#formChangePassword")[0].reset();

                        if(data.success == true) {
                            setTimeout(function(){
                                location.href = "../login.php";
                            }, 5000);
                        }
                    }
                });
            }
        });
    });
}

function forgot_password() {
    $('document').ready(function(){
        $("#formForgotPassword").parsley();
        $("#formForgotPassword").on('submit', function(e){
            e.preventDefault();

            if($("#formForgotPassword").parsley().isValid()) {
                var data = {
                    action: 'Forgot Password', 
                    forgot_password_email : $("#forgot_password_email").val()
                };

                $.ajax({
                    type: 'POST', url: '../class/functions.php', data: data, cache: false, dataType: 'json',
                    success:function(data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $("#formForgotPassword")[0].reset();
                    }
                });
            };
        });
    });
}

function security_code() {
    $('document').ready(function(){
        $("#formSecurityCode").parsley();
        $("#formSecurityCode").on('submit', function(e){
            e.preventDefault();

            if($("#formSecurityCode").parsley().isValid()) {
                var data = {
                    action: 'Security Code', 
                    security_code : $("#security_code").val(), 
                    correct_security_code : $("#correct_security_code").val() 
                };

                $.ajax({
                    type: 'POST', url: '../class/functions.php', data: data, cache: false, dataType: 'json',
                    success:function(data) {
                        if(data.validate == true) {
                            setTimeout(function(){
                                location.href = "resetpassword.php";
                            }, 3000);   
                        } else {
                            successful(data.success,data.bgcolor,data.color,data.message);
                        }
                    }
                });
            };
        });
    });
}

function reset_password() {
    $('document').ready(function(){
        $("#formRecoverPassword").parsley();
        $("#formRecoverPassword").on('submit', function(e){
            e.preventDefault();
        
            if($("#formRecoverPassword").parsley().isValid()) {
                var data = {
                    action: 'Reset Password', 
                    security_code : $("#security_code").val(), 
                    correct_security_code : $("#correct_security_code").val(),
                    new_password : $("#new_password").val()
                };

                $.ajax({
                    type: 'POST', url: '../class/functions.php', data: data, cache: false, dataType: 'json',
                    success:function(data) {
                        successful(data.success,data.bgcolor,data.color,data.message);

                        if(data.success == true) {
                            setTimeout(function(){
                                location.href = "login.php";
                            }, 5000);
                        }
                    }
                });
            };
        });
    });
}

function add_employee() {
    $('document').ready(function(){
        $("#formAddEmployee").parsley();
        $("#formAddEmployee").on('submit', function(e){
            e.preventDefault();
            if($("#formAddEmployee").parsley().isValid()) {
                var data = {
                    action: 'Employee', employee_id: $("#employee_id").val(),
                    employee_surname: $("#employee_surname").val(), employee_firstname: $("#employee_firstname").val(), employee_middlename: $("#employee_middlename").val(),
                    employee_number: $("#employee_number").val(), employee_email: $("#employee_email").val(), employee_password: $("#employee_password").val(), employee_contact: $("#employee_contact").val(),
                    employee_address: $("#employee_address").val(), employee_birthdate: $("#employee_birthdate").val(), employee_gender: $("#employee_gender").val(), employee_role: $("#employee_role").val(),
                    employee_set_status: $("#employee_set_status").val()      
                };

                $.ajax({
                    type: 'POST', url: url, data: data, cache: false, dataType: 'json',
                    success:function(data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $('#modal_employee').modal('hide');
                        show_employee();
                    }
                });
            }
        });
    });
}

function modal_add_employee() {
    var data = { action : 'Generate Employee Id' };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_employee').modal('show');
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; ADD EMPLOYEE DETAILS');
            $('#data-submit--employee').html('Add Employee');
            $('#modal_employee').find($('#employee_id')).val('');
            $('#modal_employee').find($('#employee_surname')).val('');
            $('#modal_employee').find($('#employee_firstname')).val('');
            $('#modal_employee').find($('#employee_middlename')).val('');
            $('#modal_employee').find($('#employee_email')).val('');
            $('#modal_employee').find($('#employee_number')).val(data.employee_number);
            $('#modal_employee').find($('#employee_contact')).val('');
            $('#modal_employee').find($('#employee_address')).val('');
            $('#modal_employee').find($('#employee_birthdate')).val('');
            $('#modal_employee').find($('#employee_gender')).val('');
            $('#modal_employee').find($('#employee_role')).val('');
            $('#data-submit--employee').html('Save');
        }
    });
}

function edit_employee_by_id(id) {
    var data = { action : 'Get Employee By Id', employee_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_employee').modal('show');
            $('#modal-title').html('<i class="icon-people mr-2"></i>&nbsp; UPDATE EMPLOYEE DETAILS');
            $('#modal_employee').find($('#employee_id')).val(id);
            $('#modal_employee').find($('#employee_surname')).val(data.employee_surname);
            $('#modal_employee').find($('#employee_firstname')).val(data.employee_firstname);
            $('#modal_employee').find($('#employee_middlename')).val(data.employee_middlename);
            $('#modal_employee').find($('#employee_email')).val(data.employee_email);
            $('#modal_employee').find($('#employee_number')).val(data.employee_number);
            $('#modal_employee').find($('#employee_contact')).val(data.employee_contact);
            $('#modal_employee').find($('#employee_address')).val(data.employee_address);
            $('#modal_employee').find($('#employee_birthdate')).val(data.employee_birthdate);
            $('#modal_employee').find($('#employee_gender')).val(data.employee_gender);
            $('#modal_employee').find($('#employee_role')).val(data.role_id);
            $('#data-submit--employee').html('Save Changes');
        }
    });
}

function modal_edit_status(id) {
    var data = { action : 'Get Employee By Id', employee_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $("#modal_employee_status").modal('show');
            $('#modal_employee_status').find($('#employee_status_id')).val(id);
            $('#modal_employee_status').find($('#employee_status')).val(data.employee_status);
        }
    });
}

function edit_status_by_id() {
    $('document').ready(function(){
        $("#formEditEmployeeStatus").parsley();
        $("#formEditEmployeeStatus").on('submit', function(e){
            e.preventDefault();
            var data = { 
                action: 'Edit Status By Id', employee_status_id : $("#employee_status_id").val(), 
                employee_status: $("#employee_status").val() 
            };

            $.ajax({
                type: 'POST', url: url, data: data, dataType: 'json',
                success: function (data) {
                    successful(data.success,data.bgcolor,data.color,data.message);
                    $('#modal_employee_status').modal('hide');
                    show_employee();
                }
            });
        });
    });
}

function modal_delete_employee(id) {
    $("#modal_delete_employee").modal('show');
    $("#data-delete--employee").html("Confirm");
    $("#modal_delete_employee").find($("#data-delete--employee")).val(id);
}

function delete_employee_by_id(id) {
    var data = { action : 'Delete Employee By Id', employee_delete_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        beforeSend:function() {
            $("#data-delete--employee").html("Please Wait...");
        },
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_employee();
            $("#modal_delete_employee").modal('hide');
        }
    });
}

function show_employee() {
    var data = { action : 'Show Employee Table' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-employee-table')){
                $('#show-employee-table').DataTable().destroy();
            };
            $('#show_employee_table').html(data);
            
            $('#show-employee-table').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    width: '30px',
                    targets: [5]
                }, {
                    orderable: false,
                    width: '30px',
                    targets: [6]
                }, {
                    orderable: false,
                    width: '30px',
                    targets: [7]
                }],
                buttons: {            
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            className: 'btn bg-green-700',
                            exportOptions: {
                                columns: [ 0, ':visible' ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            className: 'btn bg-green-600',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            className: 'btn bg-green-700',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                    ]
                }
            });
        }
    });
}

// #endregion


/* -- Expense Category */
function modal_expense_category() {
    $("#modal_expense_category").modal('show');
    $("#modal_expense_category").find($('#expense_category_id')).val('');
    $("#modal_expense_category").find($("#expense_category_name")).val('');
    $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; ADD CATEGORY');
    $('#data-expense--category').html('Save');
}

function add_expense_category() {
    $('document').ready(function(){
        $("#formExpenseCategory").parsley();
        $("#formExpenseCategory").on('submit', function(e){
            e.preventDefault();
            if($("#formExpenseCategory").parsley().isValid()) {
                var data = { 
                    action: 'Expense Category',
                    expense_category_id: $("#expense_category_id").val(),
                    expense_category_name: $("#expense_category_name").val()
                };

                $.ajax({
                    type: 'POST', url: url, data: data, dataType: 'json',
                    success: function (data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $('#modal_expense_category').modal('hide');
                        show_expense_category();
                    }
                })
            }
        });
    });
}

function edit_category_by_id(id) {
    var data = { action : 'Get Expense Category By Id', expense_category_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_expense_category').modal('show');
            $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; UPDATE CATEGORY');
            $("#modal_expense_category").find($('#expense_category_id')).val(id);
            $("#modal_expense_category").find($("#expense_category_name")).val(data.category_name);
            $('#data-expense--category').html('Save Changes');
        }
    });
}

function modal_delete_expense_category(id) {
    $("#modal_expense_delete_category").modal('show');
    $("#data-delete-expense--category").html("Confirm");
    $("#modal_expense_delete_category").find($("#data-delete-expense--category")).val(id);
}

function delete_expense_category_by_id(id) {
    var data = { action : 'Delete Expense Category By Id', expense_category_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        beforeSend:function() {
            $("#data-delete-expense--category").html("Please Wait...");
        },
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_expense_category();
            $("#modal_expense_delete_category").modal('hide');
        }
    });
}

function show_expense_category() {
    var data = { action : 'Show Expense Category Table' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-expense-category-table')){
                $('#show-expense-category-table').DataTable().destroy();
            };
            $('#show_expense_category_table').html(data);
            
            $('#show-expense-category-table').DataTable({
                columnDefs: [{
                    width: '10%',
                    targets: [0]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [2]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [3]
                }],
                buttons: [
                    
                ]
            });
        }
    });
}
/* -- End Expense Category */

/* -- Expense Payee */
function modal_expense_payee() {
    $("#modal_expense_payee").modal('show');
    $("#modal_expense_payee").find($('#expense_payee_id')).val('');
    $("#modal_expense_payee").find($("#expense_payee_name")).val('');
    $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; ADD PAYEE');
    $('#data-expense--payee').html('Save');
}

function add_expense_payee() {
    $('document').ready(function(){
        $("#formExpensePayee").parsley();
        $("#formExpensePayee").on('submit', function(e){
            e.preventDefault();
            if($("#formExpensePayee").parsley().isValid()) {
                var data = { 
                    action: 'Expense Payee',
                    expense_payee_id: $("#expense_payee_id").val(),
                    expense_payee_name: $("#expense_payee_name").val()
                };

                $.ajax({
                    type: 'POST', url: url, data: data, dataType: 'json',
                    success: function (data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $('#modal_expense_payee').modal('hide');
                        show_expense_payee();
                    }
                })
            }
        });
    });
}

function edit_payee_by_id(id) {
    var data = { action : 'Get Expense Payee By Id', expense_payee_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_expense_payee').modal('show');
            $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; UPDATE PAYEE');
            $("#modal_expense_payee").find($('#expense_payee_id')).val(id);
            $("#modal_expense_payee").find($("#expense_payee_name")).val(data.payee_name);
            $('#data-expense--payee').html('Save Changes');
        }
    });
}

function modal_delete_expense_payee(id) {
    $("#modal_expense_delete_payee").modal('show');
    $("#data-delete-expense--payee").html("Confirm");
    $("#modal_expense_delete_payee").find($("#data-delete-expense--payee")).val(id);
}

function delete_expense_payee_by_id(id) {
    var data = { action : 'Delete Expense Payee By Id', expense_payee_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        beforeSend:function() {
            $("#data-delete-expense--payee").html("Please Wait...");
        },
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_expense_payee();
            $("#modal_expense_delete_payee").modal('hide');
        }
    });
}

function show_expense_payee() {
    var data = { action : 'Show Expense Payee Table' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-expense-payee-table')){
                $('#show-expense-payee-table').DataTable().destroy();
            };
            $('#show_expense_payee_table').html(data);
            
            $('#show-expense-payee-table').DataTable({
                columnDefs: [{
                    width: '10%',
                    targets: [0]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [2]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [3]
                }],
                buttons: [
                    
                ]
            });
        }
    });
}
/* -- End Expense Payee */

/* -- Expense Banks */
function modal_banks() {
    $("#modal_banks").modal('show');
    $("#modal_banks").find($('#bank_id')).val('');
    $("#modal_banks").find($("#bank_name")).val('');
    $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; ADD BANK');
    $('#data--bank').html('Save');
}

function add_banks() {
    $('document').ready(function(){
        $("#formBanks").parsley();
        $("#formBanks").on('submit', function(e){
            e.preventDefault();
            if($("#formBanks").parsley().isValid()) {
                var data = { 
                    action: 'Banks',
                    bank_id: $("#bank_id").val(),
                    bank_name: $("#bank_name").val()
                };

                $.ajax({
                    type: 'POST', url: url, data: data, dataType: 'json',
                    success: function (data) {
                        successful(data.success,data.bgcolor,data.color,data.message);
                        $('#modal_banks').modal('hide');
                        show_banks();
                    }
                })
            }
        });
    });
}

function edit_banks_by_id(id) {
    var data = { action : 'Get Bank By Id', bank_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_banks').modal('show');
            $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; UPDATE BANK');
            $("#modal_banks").find($('#bank_id')).val(id);
            $("#modal_banks").find($("#bank_name")).val(data.bank_name);
            $('#data--bank').html('Save Changes');
        }
    });
}

function modal_delete_bank(id) {
    $("#modal_delete_bank").modal('show');
    $("#data-delete--bank").html("Confirm");
    $("#modal_delete_bank").find($("#data-delete--bank")).val(id);
}

function delete_bank_by_id(id) {
    var data = { action : 'Delete Bank By Id', bank_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        beforeSend:function() {
            $("#data-delete--bank").html("Please Wait...");
        },
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_banks();
            $("#modal_delete_bank").modal('hide');
        }
    });
}

function show_banks() {
    var data = { action : 'Show Banks' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-banks-table')){
                $('#show-banks-table').DataTable().destroy();
            };
            $('#show_banks_table').html(data);
            
            $('#show-banks-table').DataTable({
                columnDefs: [{
                    width: '10%',
                    targets: [0]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [2]
                }, {
                    orderable: false,
                    width: '7%',
                    targets: [3]
                }],
                buttons: [
                    
                ]
            });
        }
    });
}

/* -- End Expense Banks */

/* -- Expense Transactions */
function modal_expense_transaction() {
    $('#modal_expense_transaction').modal('show');
    $('#modal-title').html('<i class="icon-file-text mr-2"></i>&nbsp; ADD EXPENSE DETAILS');
    $("#modal_expense_transaction").find($('#expense_id')).val('');
    $('#modal_expense_transaction').find($('#expense_vendor')).val('');
    $('#modal_expense_transaction').find($('#expense_category')).val('');
    $('#modal_expense_transaction').find($('#expense_si')).val('');
    $('#modal_expense_transaction').find($('#expense_or')).val('');
    $('#modal_expense_transaction').find($('#expense_tin')).val('');
    $('#modal_expense_transaction').find($('#expense_particular')).val('');
    $('#modal_expense_transaction').find($('#expense_unit')).val('');
    $('#modal_expense_transaction').find($('#expense_payee')).val('');
    $('#modal_expense_transaction').find($('#expense_bank')).val('');
    $('#modal_expense_transaction').find($('#expense_cvno')).val('');
    $('#modal_expense_transaction').find($('#expense_cn')).val('');
    $('#modal_expense_transaction').find($('#expense_check_date')).val('');
    $('#modal_expense_transaction').find($('#expense_qty')).val(0);
    $('#modal_expense_transaction').find($('#expense_price_unit')).val(0);
    $('#modal_expense_transaction').find($('#expense_discount')).val(0);
    $('#modal_expense_transaction').find($('#expense_vat')).val(0);
    $('#modal_expense_transaction').find($('#expense_total_price')).val('');
}


function add_expense_transactions() {
    $("#formExpenseTransaction").parsley();
    $("#formExpenseTransaction").on('submit', function(e){
        e.preventDefault();
        if($("#formExpenseTransaction").parsley().isValid()) {
            var data = { action: 'Expense Transactions', expense_id: $("#expense_id").val(), expense_vendor: $("#expense_vendor").val(),
                expense_category: $("#expense_category").val(), expense_si: $("#expense_si").val(), expense_or: $("#expense_or").val(), expense_tin: $("#expense_tin").val(), 
                expense_particular: $("#expense_particular").val(), expense_unit: $("#expense_unit").val(), expense_payee: $("#expense_payee").val(), expense_bank: $("#expense_bank").val(),
                expense_cvno: $("#expense_cvno").val(), expense_cn: $("#expense_cn").val(), expense_check_date: $("#expense_check_date").val(), expense_qty: $("#expense_qty").val(),
                expense_price_unit: $("#expense_price_unit").val(), expense_discount: $("#expense_discount").val(), expense_vat: $("#expense_vat").val(), 
                expense_total_price: $("#expense_total_price").val()
            };

            $.ajax({
                type: 'POST', url: url, data: data, dataType: 'json',
                success: function (data) {
                    successful(data.success,data.bgcolor,data.color,data.message);
                    show_expense_transactions();
                    $('#modal_expense_transaction').modal('hide');
                }
            });
        }
    });
}

function edit_expense_by_id(id) {
    var data = { action : 'Get Expense By Id', expense_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $('#modal_expense_transaction').modal('show');
            $('#modal-title').html('<i class="icon-file-text mr-2"></i>&nbsp; UPDATE EXPENSE DETAILS');
            $("#modal_expense_transaction").find($('#expense_id')).val(id);
            $('#modal_expense_transaction').find($('#expense_vendor')).val(data.expense_vendor);
            $('#modal_expense_transaction').find($('#expense_category')).val(data.expense_category);
            $('#modal_expense_transaction').find($('#expense_si')).val(data.expense_si);
            $('#modal_expense_transaction').find($('#expense_or')).val(data.expense_or);
            $('#modal_expense_transaction').find($('#expense_tin')).val(data.expense_tin);
            $('#modal_expense_transaction').find($('#expense_particular')).val(data.expense_particular);
            $('#modal_expense_transaction').find($('#expense_unit')).val(data.expense_unit);
            $('#modal_expense_transaction').find($('#expense_payee')).val(data.expense_payee);
            $('#modal_expense_transaction').find($('#expense_bank')).val(data.expense_bank);
            $('#modal_expense_transaction').find($('#expense_cvno')).val(data.expense_cvno);
            $('#modal_expense_transaction').find($('#expense_cn')).val(data.expense_cn);
            $('#modal_expense_transaction').find($('#expense_check_date')).val(data.expense_check_date);
            $('#modal_expense_transaction').find($('#expense_qty')).val(data.expense_qty);
            $('#modal_expense_transaction').find($('#expense_price_unit')).val(data.expense_price_unit);
            $('#modal_expense_transaction').find($('#expense_discount')).val(data.expense_discount);
            $('#modal_expense_transaction').find($('#expense_vat')).val(data.expense_vat);
            $('#modal_expense_transaction').find($('#expense_total_price')).val(data.expense_total);
        }
    });
}

function modal_edit_remarks(id) {
    var data = { action : 'Get Expense By Id', expense_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, dataType: 'json',
        success: function (data) {
            $("#modal_expense_remarks").modal('show');
            $('#modal_expense_remarks').find($('#expense_details_id')).val(id);
            $('#modal_expense_remarks').find($('#expense_remarks')).val(data.expense_remarks);
        }
    });
}

function edit_remarks_by_id() {
    $("#formExpenseRemarks").parsley();
    $("#formExpenseRemarks").on('submit', function(e){
        e.preventDefault();
        var data = { 
            action: 'Edit Remarks By Id', 
            expense_details_id : $("#expense_details_id").val(), 
            expense_remarks: $("#expense_remarks").val() 
        };

        $.ajax({
            type: 'POST', url: url, data: data, dataType: 'json',
            success: function (data) {
                successful(data.success,data.bgcolor,data.color,data.message);
                show_expense_transactions();
                $("#modal_expense_remarks").modal('hide');
            }
        });
    });
}

function modal_delete_expense_transaction(id) {
    $("#modal_delete_transaction").modal('show');
    $("#data-delete--transaction").html("Confirm");
    $("#modal_delete_transaction").find($("#data-delete--transaction")).val(id);
}

function delete_expense_transaction_by_id(id) {
    var data = { action : 'Delete Expense By Id', expense_delete_id : id };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false, dataType: 'json',
        beforeSend:function() {
            $("#data-delete--transaction").html("Please Wait...");
        },
        success:function(data) {
            successful(data.success,data.bgcolor,data.color,data.message);
            show_expense_transactions();
            $("#modal_delete_transaction").modal('hide');
        }
    });
}

function show_expense_transactions() {
    var data = { action : 'Show Expense Transactions' };
    $.ajax({
        type: 'POST', url: url, data: data, cache: false,
        success:function(data) {
            if ($.fn.DataTable.isDataTable('#show-expense-transactions-table')){
                $('#show-expense-transactions-table').DataTable().destroy();
            };
            
            $('#show_expense_transactions_table').html(data);
            
            $('#show-expense-transactions-table').DataTable({
                autoWidth: false,
                columnDefs: [
                    {
                        orderable: false,
                        targets: [22, 23, 24]
                    },
                    { 
                        width: "100px",
                        targets: [0, 2, 5]
                    },
                    { 
                        width: "50px",
                        targets: [1]
                    },
                    { 
                        width: "200px",
                        targets: [6]
                    },
                    { 
                        width: "100px",
                        targets: [4]
                    }
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                fixedColumns: {
                    leftColumns: 3,
                    rightColumns: 3
                }
            });
        }
    });
}

/* -- End  Expense Transactions */


/* -- Sales */
function modal_add_sales() {
    $('#modal_sales').modal('show');
    $('#modal-title').html('<i class="icon-pencil7 mr-2"></i>&nbsp; ADD SALES DETAILS');
}

/* -- End Sales */

//Custom method if the request was success. 
function successful(data,bgcolor,color,message) {
    data == true ? notify(bgcolor,color,message) : notify(bgcolor,color,message);
}

//Amaran Notification 
function notify(bgcolor,color,message) {
    $.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: bgcolor,color: color,message: message },
        'position'  : 'top right', 'outEffect' : 'slideBottom'
    });
}