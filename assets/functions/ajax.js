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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            $('#category-expense-modal').modal('hide');
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            $('#payee-modal').modal('hide');
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            modal.modal('hide');
            notify(data.type,data.message);
            setTimeout(function() {
                location.reload();
            }, 3000);
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
            setTimeout(function() {
                location.reload();
            }, 3000);
        }
    });
}

function notify(type,message) {
    Command: toastr[type](message)
}

function toastr_option() {
    toastr.options = {
        "newestOnTop": true, "progressBar": false, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": 300, "hideDuration": 1000, "timeOut": 5000, "extendedTimeOut": 1000, "showEasing": "swing", "hideEasing": "linear", "showMethod": "slideDown", "hideMethod": "slideUp"
    }
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}