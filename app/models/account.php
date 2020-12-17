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
				$employee_hash_password = $row->employee_password;
				if(verify($account_password, $employee_hash_password) && $employee_role_id == 1) {
					$_SESSION['account_id'] = $row->employee_id;
					echo json_encode(['url' => URL.'admin/dashboard','success' => true]);
				} elseif(verify($account_password, $employee_hash_password) && $employee_role_id == 2) {
					$_SESSION['account_id'] = $row->employee_id;
					echo json_encode(['url' => URL.'employee/index','success' => true]);
				} else {
					$message = 'Your employee number or password was entered incorrectly.';
                    notify([false, '#d32f2f', '#ffffff', $message]);
				}
			} else {
				$message = 'Your employee number or password was entered incorrectly.';
                notify([false, '#d32f2f', '#ffffff', $message]);
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
                    notify([false,'#d32f2f','#fff',$message]);
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
                        $mail->Body = 
                        '
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
                            notify([true, '#4caf50', '#ffffff', $message]);
                        } else {
                            $message = "Email could not be sent. Please check your internet connection.";
                            notify([false, '#d32f2f', '#ffffff', $message]);
                        }
                    } else {
                        $message = 'Please confifure SMTP server.';
                        notify([false,'#d32f2f','#fff',$message]);
                    }
                }
            } else {
                $message = 'Email not found!';
                notify([false,'#d32f2f','#fff',$message]);
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
                notify([false,'#d32f2f','#fff',$message]);
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
		
		public function post($data) {
			$query = $this->db->real_escape_string(htmlentities($_POST[$data]));
			return $query;
		}
		
		public function get($data) {
            $query = $this->db->real_escape_string(htmlentities($_GET[$data]));
			return $query;
        }
	}