<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class account extends Model {

        public function __construct() {
            parent::__construct();
        }

        public function total_employees($role) {
            $query = $this->db->query("SELECT * FROM tbl_accounts WHERE employee_role_id = $role");
            return $query->num_rows;
        }

        public function get_units() {
            $query = $this->db->query("SELECT * FROM tbl_units");
            return $query;
        }

        public function get_roles() {
            $query = $this->db->query("SELECT * FROM tbl_roles");
            return $query;
        }

        public function get_logs($id) {
            $query = $this->db->query("SELECT * FROM tbl_accounts AS a INNER JOIN tbl_logs AS l ON a.employee_id = l.employee_id WHERE l.employee_id != $id");
            return $query;
        }
		
        public function get_user_information($employee_id) {
            $query = $this->db->query("SELECT * FROM tbl_accounts AS ta INNER JOIN tbl_roles AS tr ON ta.employee_role_id = tr.role_id WHERE employee_id = $employee_id");
            return $query->fetch_object();
        }
		
        public function user_login($data) {
            $account_number = $data['account_number'];
            $account_password = $data['account_password'];
            $check = $this->db->query("SELECT * FROM tbl_accounts AS ta INNER JOIN tbl_roles AS tr ON ta.employee_role_id = tr.role_id WHERE ta.employee_number = '$account_number'");
            
            if($check->num_rows > 0) {
                $row = $check->fetch_object();
                $employee_role_id = $row->employee_role_id;
                $employee_status = $row->employee_status;
                $employee_hash_password = $row->employee_password;
                
                if(verify($account_password, $employee_hash_password) && $employee_role_id == 1 && $employee_status == 'Active') {
                    $_SESSION['account_id'] = $row->employee_id;
                    echo json_encode(['url' => URL.'admin/dashboard','success' => true]);
                } elseif(verify($account_password, $employee_hash_password) && $employee_role_id == 2 && $employee_status == 'Active') {
                    $_SESSION['account_id'] = $row->employee_id;
                    echo json_encode(['url' => URL.'employee/index','success' => true]);
                } elseif(verify($account_password, $employee_hash_password) && $employee_status == 'Not Active') {
                    $message = 'Your account is not active yet. Contact the admin to activate your account.';
                    notify('error', $message, false);
                } else {
                    $message = 'Your employee number or password was entered incorrectly.';
                    notify('error', $message, false);
                }
            } else {
                $message = 'Your employee number or password was entered incorrectly.';
                notify('error', $message, false);
            }
        }
        
        public function update_password($data) {
            $account_id         = $data['account_id'];
            $current_password   = $data['current_password'];
            $new_password       = $data['new_password'];

            $query = $this->db->query("SELECT * FROM tbl_accounts WHERE employee_id = $account_id");
            $check = $query->num_rows;

            if($check > 0) {
                $row = $query->fetch_object();
                $employee_hash_password = $row->employee_password;

                if(verify($current_password, $employee_hash_password)) {
                    $query = $this->db->query("UPDATE tbl_accounts SET employee_password = '$new_password' WHERE employee_id = $account_id");
                    $message = 'Your password has been changed successfully!';
                    if($query) {
                        $content = 'update his / her password';
                        $this->db->query("INSERT INTO tbl_logs (logs_content, employee_id) VALUES ('$content', $account_id)");
                    } 
                    notify('info','Password has been changed.', true);
                } else {
                    $message = 'Error! Password does not match.';
                    notify('error', $message, false);
                }
            }
        }

        public function user_forgot_password($forgot_password_email) {
            $check = $this->db->query("SELECT * FROM tbl_accounts WHERE employee_email = '$forgot_password_email'");
            if($check->num_rows > 0) {
                $row = $check->fetch_object();
                $employee_id   = $row->employee_id;
                $employee_name = $row->employee_firstname . ' ' . $row->employee_surname;
                $security_code 	= $row->employee_security_code;
                if($forgot_password_email != $row->employee_email) {
                    $message = 'Email not found!';
                    notify('error', $message, false);
                } else {
                    $SMTP_query = $this->db->query("SELECT * FROM tbl_smtp_server WHERE smtp_status = 0");
                    $SMTP_check = $SMTP_query->num_rows;

                    if($SMTP_check > 0) {
                        $SMTP_row       = $SMTP_query->fetch_object();
                        $SMTP_socket	= $SMTP_row->smtp_socket;
                        $SMTP_security	= $SMTP_row->smtp_security;
                        $SMTP_port	    = $SMTP_row->smtp_port;
                        $SMTP_email	    = $SMTP_row->smtp_email;
                        $SMTP_password	= $SMTP_row->smtp_password;
                        $SMTP_from		= $SMTP_row->smtp_from;
                        $_SESSION['security_code'] = $security_code;

                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = $SMTP_socket;
                        $mail->SMTPAuth = true;
                        $mail->Username = $SMTP_email;
                        $mail->Password = $SMTP_password;
                        $mail->Port = $SMTP_port;
                        $mail->SMTPSecure = $SMTP_security;

                        //Email Settings
                        $mail->isHTML(true);
                        $mail->setFrom("no-reply@aczadmin.com", $SMTP_from);
                        $mail->addAddress($forgot_password_email);
                        $mail->Subject = "Recover Your Account";
                        $mail->Body = '
                        <div style="width:500px;background:#fff;margin:auto;padding:10px">

                        <h3 style="font-weight:700;font-size:24px;color:#111;">Reset your password</h3>
                        <div style="clear:both"></div>

                        <h4 style="color:#333; font-weight:300;">If this was a mistake, just ignore this email and nothing will happen.</h4>
                        <div style="clear:both"></div>

                        <h4 style="color:#222;">To reset your password, click the button below and copy paste this:</h4>
                        <div style="clear:both"></div>

                        <h4 style="text-align:justify;font-weight:500;">Security Code : '.$_SESSION['security_code'].'</h4>
                        <div style="clear:both"></div>

                        <a href="http://localhost/acz-thesis/login/validate" style="display:inline-block;margin-top:10px;color:#fff;text-decoration:none;cursor:pointer;padding:10px 15px;background-color:#7CB342;font-weight:600;border-radius:5px;">
                            Reset your password
                        </a>';

                        if($mail->send()) {
                            $message = "Email has been sent!";
                            notify('success', $message, true);
                        } else {
                            $message = "Email could not be sent. Please check your internet connection.";
                            notify('error', $message, false);
                        }
                    } else {
                        $message = 'Please confifure SMTP server.';
                        notify('error', $message, false);
                    }
                }
            } else {
                $message = 'Email not found!';
                notify('error', $message, false);
            }
        }

        public function security_code($data) {
            $security_code 		   = $data['security_code'];
            $correct_security_code = $data['correct_security_code'];

            if($security_code == $correct_security_code) {
                unset($_SESSION['security_code']);
                $_SESSION['correct_security_code'] = $security_code;
                echo json_encode(['url' => URL.'login/reset','success' => true]);
            } else {
                $message = 'Invalid Security Code!';
                notify('error', $message, false);
            }
        }

        public function reset_old_password($data) {
            $password_hash			= $data['new_password'];
            $security_code 		   	= $data['security_code'];
            $correct_security_code 	= $data['correct_security_code'];

            $query 	= $this->db->query("SELECT * FROM tbl_accounts WHERE employee_security_code = '$correct_security_code'");
            $row = $query->fetch_object();
            $employee_id = $row->employee_id;

            $query = $this->db->query("UPDATE tbl_accounts SET employee_password = '$password_hash', employee_security_code = '$security_code' WHERE employee_id = $employee_id");

            unset($_SESSION['correct_security_code']);

            if($query) {
                $content = 'reset his / her password';
                $this->db->query("INSERT INTO tbl_logs (logs_content, employee_id) VALUES ('$content', $employee_id)");
            }

            $_SESSION['message'] = 'Your account is now recovered!';
            echo json_encode(['url' => URL.'login','success' => true]);
        }
        
        public function generate_employee_number() {
            $query = $this->db->query("SELECT MAX(CAST(SUBSTR(employee_number, 5) AS SIGNED)) + 1 AS num_rows FROM tbl_accounts WHERE employee_number LIKE 'ACZ20%'");
            $row = $query->fetch_object();
            $number = $row->num_rows;
            
            $employee_number = 'ACZ'. date("y") . $number;

            echo json_encode(['employee_number' => $employee_number]);
        }

        public function employees($data) {
            $employee_id			= $data['employee_id'];
            $employee_surname		= $data['employee_surname'];
            $employee_firstname		= $data['employee_firstname'];
            $employee_middlename	= $data['employee_middlename'];
            $employee_number		= $data['employee_number'];
            $employee_password    	= $data['employee_password'];
            $employee_email       	= $data['employee_email'];
            $employee_contact    	= $data['employee_contact'];
            $employee_address     	= $data['employee_address'];
            $employee_birthdate		= $data['employee_birthdate'];
            $employee_gender      	= $data['employee_gender'];
            $employee_role        	= $data['employee_role'];
            $employee_status      	= $data['employee_status'];
            $employee_security_code	= $data['employee_security_code'];

            if(empty($employee_id)) {
                $check = $this->db->query("SELECT * FROM tbl_accounts WHERE employee_surname = '$employee_surname' AND employee_firstname = '$employee_firstname' AND employee_middlename = '$employee_middlename'");
                if($check->num_rows > 0) {
                    $message = 'User is already exist.';
                    notify('error', $message, false);
                } else {
                    $query = $this->db->query("INSERT INTO tbl_accounts (employee_surname, employee_firstname, employee_middlename, employee_number, employee_password, employee_email, employee_contact, employee_address, employee_birthdate, employee_gender, employee_status, employee_role_id, employee_security_code) 
                    VALUES('$employee_surname', '$employee_firstname', '$employee_middlename', '$employee_number', '$employee_password', '$employee_email', '$employee_contact', '$employee_address', '$employee_birthdate', '$employee_gender', '$employee_status', $employee_role, $employee_security_code)");
                    $message = $employee_firstname.' '.$employee_surname .' has been added.';
                    notify('success', $message, true);
                }
            } else {
                $message = 'User has been updated.';
                $query = $this->db->query("UPDATE tbl_accounts SET employee_surname = '$employee_surname', employee_firstname = '$employee_firstname', employee_middlename ='$employee_middlename',
                employee_email = '$employee_email', employee_contact = '$employee_contact', employee_address = '$employee_address', employee_birthdate = '$employee_birthdate', employee_gender = '$employee_gender', employee_role_id = $employee_role
                WHERE employee_id = $employee_id");
                notify('success', $message, true);
            }
        }

        public function employee_status($data) {
            $employee_status_id = $data['employee_status_id'];
            $employee_status    = $data['employee_status'];

            $query = $this->db->query("UPDATE tbl_accounts SET employee_status = '$employee_status' WHERE employee_id = $employee_status_id");
            $message = "Status has been updated!";
            $query ? notify('success', $message, true) : null;
        }

        public function delete_employees_by_id($employee_delete_id) {
            $query = $this->db->query("DELETE FROM tbl_accounts WHERE employee_id = $employee_delete_id");
            $message = "Employee has been deleted.";
            $query ? notify('info', $message, true) : null;
        }

        public function get_all_employees($employee_role_id) {
            $query = $this->db->query("SELECT * FROM tbl_accounts WHERE employee_role_id = $employee_role_id");
            return $query;
        }

        public function get_employee_information_by_id($employee_id) {
            $query = $this->db->query("SELECT * FROM tbl_accounts AS ta INNER JOIN tbl_roles AS tr ON ta.employee_role_id = tr.role_id WHERE ta.employee_id = $employee_id");
            echo json_encode($query->fetch_object());
        }

        //Banks
        public function banks($data) {
            $bank_id    = $data['bank_id'];
            $bank_name  = $data['bank_name'];

            if(empty($bank_id)) {
                $check = $this->db->query("SELECT * FROM tbl_banks WHERE bank_name = '$bank_name'");
                if($check->num_rows > 0) {
                    $message = 'Bank is already exist.';
                    notify('error', $message, false);
                } else {
                    $message = $bank_name.' has been added!';
                    $query = $this->db->query("INSERT INTO tbl_banks (bank_name) VALUES('$bank_name')");
                    $query ? notify('success', $message, true) : null;
                }
            } else {
                $message = 'Bank has been updated.';
                $query = $this->db->query("UPDATE tbl_banks SET bank_name = '$bank_name' WHERE bank_id = $bank_id");
                $query ? notify('success', $message, true) : null;
            }
        }

        public function get_all_banks() {
            $query = $this->db->query("SELECT * FROM tbl_banks");
            return $query;
        }

        public function get_banks_by_id($bank_id) {
            $query = $this->db->query("SELECT * FROM tbl_banks WHERE bank_id = $bank_id");
            echo json_encode($query->fetch_object());
        }

        public function delete_banks_by_id($bank_delete_id) {
            $query = $this->db->query("DELETE FROM tbl_banks WHERE bank_id = $bank_delete_id");
            $message = "Bank has been deleted.";
            $query ? notify('info', $message, true) : null;
        }
        
        //Expense Category
        public function expense_category($data) {
            $category_id    = $data['expense_category_id'];
            $category_name  = $data['expense_category_name'];

            if(empty($category_id)) {
                $check = $this->db->query("SELECT * FROM tbl_expense_category WHERE category_name = '$category_name'");
                if($check->num_rows > 0) {
                    $message = 'Category is already exist.';
                    notify('error', $message, false);
                } else {
                    $message = $category_name.' has been added!';
                    $query = $this->db->query("INSERT INTO tbl_expense_category (category_name) VALUES('$category_name')");
                    $query ? notify('success', $message, true) : null;
                }
            } else {
                $message = 'Category has been updated.';
                $query = $this->db->query("UPDATE tbl_expense_category SET category_name = '$category_name' WHERE category_id = $category_id");
                $query ? notify('success', $message, true) : null;
            }
        }

        public function get_all_expense_category() {
            $query = $this->db->query("SELECT * FROM tbl_expense_category");
            return $query;
        }

        public function get_expense_category_by_id($expense_category_id) {
            $query = $this->db->query("SELECT * FROM tbl_expense_category WHERE category_id = $expense_category_id");
            echo json_encode($query->fetch_object());
        }

        public function delete_expense_category_by_id($expense_category_delete_id) {
            $query = $this->db->query("DELETE FROM tbl_expense_category WHERE category_id = $expense_category_delete_id");
            $message = "Category has been deleted.";
            $query ? notify('info', $message, true) : null;
        }

        //Expense Category
        public function expense_payee($data) {
            $expense_payee_id   = $data['expense_payee_id'];
            $expense_payee_name = $data['expense_payee_name'];

            if(empty($expense_payee_id)) {
                $check = $this->db->query("SELECT * FROM tbl_expense_payee WHERE payee_name = '$expense_payee_name'");
                if($check->num_rows > 0) {
                    $message = 'Payee is already exist.';
                    notify('error', $message, false);
                } else {
                    $message = $expense_payee_name.' has been added!';
                    $query = $this->db->query("INSERT INTO tbl_expense_payee (payee_name) VALUES('$expense_payee_name')");
                    $query ? notify('success', $message, true) : null;
                }
            } else {
                $message = 'Payee has been updated.';
                $query = $this->db->query("UPDATE tbl_expense_payee SET payee_name = '$expense_payee_name' WHERE payee_id = $expense_payee_id");
                $query ? notify('success', $message, true) : null;
            }
        }

        public function get_all_payee() {
            $query = $this->db->query("SELECT * FROM tbl_expense_payee");
            return $query;
        }

        public function get_payee_by_id($expense_payee_id) {
            $query = $this->db->query("SELECT * FROM tbl_expense_payee WHERE payee_id = $expense_payee_id");
            echo json_encode($query->fetch_object());
        }

        public function delete_payee_by_id($payee_delete_id) {
            $query = $this->db->query("DELETE FROM tbl_expense_payee WHERE payee_id = $payee_delete_id");
            $message = "Payee has been deleted.";
            $query ? notify('info', $message, true) : null;
        }

        //Expense Transaction
        public function expense_transactions($data) {
            $expense_id             = $data['expense_id']; 
            $expense_category       = $data['expense_category'];
            $expense_vendor         = $data['expense_vendor'];
            $expense_tin            = $data['expense_tin'];
            $expense_si             = $data['expense_si'];
            $expense_or             = $data['expense_or'];
            $expense_particular     = $data['expense_particular'];
            $expense_unit           = $data['expense_unit'];
            $expense_payee          = $data['expense_payee'];
            $expense_bank           = $data['expense_bank'];
            $expense_cvno           = $data['expense_cvno'];
            $expense_cn             = $data['expense_cn'];
            $expense_check_date     = $data['expense_check_date'];
            $expense_qty            = $data['expense_qty'];
            $expense_price_unit     = $data['expense_price_unit'];
            $expense_discount       = $data['expense_discount'];
            $expense_total_price    = $data['expense_total_price'];
            $expense_vat            = $data['expense_vat'];
            $expense_remarks        = $data['expense_remarks'];

            if(empty($expense_id)) {
                $query = $this->db->query("INSERT INTO tbl_expense_details(expense_category, expense_vendor, expense_tin, expense_si, expense_or, expense_particular, expense_unit, expense_payee, expense_bank, expense_cvno, expense_cn, expense_check_date) 
                VALUES('$expense_category', '$expense_vendor', '$expense_tin', '$expense_si', '$expense_or', '$expense_particular', '$expense_unit', '$expense_payee', '$expense_bank', $expense_cvno, $expense_cn, '$expense_check_date')");
                $last_insert_id = $this->db->insert_id;

                if($query) {
                    $query_transactions = $this->db->query("INSERT INTO tbl_expense_transactions(expense_qty, expense_price_unit, expense_discount, expense_vat, expense_total, expense_remarks, expense_details_id) 
                    VALUES($expense_qty, $expense_price_unit, $expense_discount, $expense_vat, $expense_total_price, '$expense_remarks', $last_insert_id)");
                    $message = 'Expense has been added!';
                    $query_transactions ? notify('success', $message, true) : null;
                } else {
                    $message = 'Expense details has been updated.';
                    $query = $this->db->query("UPDATE tbl_expense_details ted INNER JOIN tbl_expense_transactions tet ON (ted.expense_id = tet.expense_details_id)
                    SET ted.expense_category = '$expense_category', ted.expense_vendor = '$expense_vendor', ted.expense_tin = '$expense_tin', ted.expense_si = '$expense_si',
                    ted.expense_or = '$expense_or', ted.expense_particular = '$expense_particular', ted.expense_unit = '$expense_unit', ted.expense_payee = '$expense_payee', 
                    ted.expense_bank = '$expense_bank', ted.expense_cvno = '$expense_cvno', ted.expense_cn = '$expense_cn', ted.expense_check_date = '$expense_check_date',
                    tet.expense_qty = $expense_qty, tet.expense_price_unit = $expense_price_unit, tet.expense_discount = $expense_discount, tet.expense_vat = $expense_vat, 
                    tet.expense_total = $expense_total_price WHERE ted.expense_id = $expense_id");
                    $query ? notify('success', $message, true) : null;    
                }
            } 
        }

        public function post($data) {
            $query = $this->db->real_escape_string(htmlentities($_POST[$data]));
            return $query;
        }
		
        public function get($data) {
            $query = $this->db->real_escape_string(htmlentities($_GET[$data]));
            return $query;
        }
    }