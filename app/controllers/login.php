<?php
	class login extends Controller {

		public function __construct() {
			$_SESSION['token'] = TOKEN;
			$this->input = $this->model('account');
		}

		public function index() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Login';
			$this->view('pages/login', $data);
		}

		public function auth() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'account_number' => $this->input->post('account_number'),
					'account_password' => $this->input->post('account_password')
				);
				$this->model('account')->user_login($data);
			}
		}

		public function forgot_password() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Forgot Password';
			$this->view('pages/forgot-password', $data);
		}

		public function send_email() {
			$forgot_password_email = $this->input->post('forgot_password_email');
			$this->model('account')->user_forgot_password($forgot_password_email);
		}

		public function validate() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Security Code';
			$this->view('pages/validate', $data);
		}

		public function validate_security_code() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'security_code'        	=> $this->input->post('security_code'),
					'correct_security_code'	=> $this->input->post('correct_security_code')
				);
				$this->model('account')->security_code($data);
			}
		}

		public function reset() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Reset Password';
			$this->view('pages/reset-password', $data);
		}

		public function update_password() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'security_code'        	=> $this->input->post('security_code'),
					'correct_security_code'	=> $this->input->post('correct_security_code'),
					'new_password'			=> hashing($this->input->post('new_password'))
				);
				$this->model('account')->reset_old_password($data);
			}
		}
	}