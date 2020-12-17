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
            data.success === true ? location.href = data.url : successful(data.success,data.bgcolor,data.color,data.message);
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
            data.success === true ? successful(data.success,data.bgcolor,data.color,data.message) : successful(data.success,data.bgcolor,data.color,data.message);
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
            data.success === true ? location.href = data.url : successful(data.success,data.bgcolor,data.color,data.message);
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


//Custom method if the request was success. 
function successful(data,bgcolor,color,message) {
    data === true ? notify(bgcolor,color,message) : notify(bgcolor,color,message);
}

//Amaran Notification 
function notify(bgcolor,color,message) {
    $.amaran({
        'theme'     : 'colorful', 'content'   : { bgcolor: bgcolor,color: color,message: message },
        'position'  : 'top right', 'outEffect' : 'slideBottom'
    });
}

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}