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
            if(data.success === true) {
                location.href = data.url;
                successful(data.success,data.bgcolor,data.color,data.message);
            }
             
            $('#btn-reset--password').html('RECOVER MY ACCOUNT <i class="icon-circle-right2 ml-2"></i>').attr('disabled',false);
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
            setTimeout(function() {
                location.reload();
            }, 2000);
        }
    });
}

function view_employee(employee_id) {
    var modal = $('#employee-modal');
    $.ajax({
        type: 'POST', 
        url: url + 'get_information_by_id', 
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
        url: url + 'get_information_by_id', 
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
            }, 2000);
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
            }, 2000);
        }
    });
}

function notify(type,message) {
    Command: toastr[type](message)
}

function toastr_option() {
    toastr.options = {
        "newestOnTop": true, "progressBar": false, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": 300, "hideDuration": 1000, "timeOut": 5000, "extendedTimeOut": 1000, "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"
    }
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}