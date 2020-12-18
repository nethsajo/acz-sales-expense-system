<?php 
	class admin extends Controller {
		
		public function __construct() {
			if(!isset($_SESSION['account_id'])) {
				redirect('login');
			}
			$_SESSION['token'] = TOKEN;
			$this->input = $this->model('account');
		}
		
		public function index() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Dashboard';
			$data['total_employees'] = $this->model('account')->total_employees(2);
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/dashboard',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function profile() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Profile';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/profile',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function sales() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Sales';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/sales',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function banks() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Banks';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/banks',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function category() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Category';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/category',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function payee() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Payee';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/payee',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function transactions() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Transactions';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/transactions',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function monitoring() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Transactions';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/monitoring',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function accounts() {
			$data['token'] 		= $_SESSION['token'];
			$data['title'] 		= 'Accounts';
			$data['employees']	= $this->model('account')->get_all_employees(2);
			$data['user'] 		= $this->model('account')->get_user_information($_SESSION['account_id']);
			$data['roles']		= $this->model('account')->get_roles();
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/accounts',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function logs() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Logs';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/logs',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function exportdb() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Export Database';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/export-database',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}

		public function GenerateEmployeeNumber() {
			$this->model('account')->generate_employee_number();
		}

		public function get_information_by_id() {
			$employee_id = $this->input->post('employee_id');
			$this->model('account')->get_employee_information_by_id($employee_id);
		}

		public function InsertOrUpdateEmployee() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'employee_id' 				=> $this->input->post('employee_id'),
					'employee_surname'			=> $this->input->post('employee_surname'),
					'employee_firstname'		=> $this->input->post('employee_firstname'),
					'employee_middlename' 		=> $this->input->post('employee_middlename'),
					'employee_number'			=> $this->input->post('employee_number'),
					'employee_password'    		=> hashing('!ACZ'.date('Y')),
					'employee_email'       		=> $this->input->post('employee_email'),
					'employee_contact'     		=> $this->input->post('employee_contact'),
					'employee_address'     		=> $this->input->post('employee_address'),
					'employee_birthdate'		=> $this->input->post('employee_birthdate'),
					'employee_gender'      		=> $this->input->post('employee_gender'),
					'employee_role'        		=> $this->input->post('employee_role'),
					'employee_status'      		=> 'Not Active',
					'employee_security_code'	=> rand(111111, 999999)
				);
				$this->model('account')->employees($data);
			}
		}

		public function EditEmployeeStatus() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'employee_status_id'	=> $this->input->post('employee_status_id'),
					'employee_status'		=> $this->input->post('employee_status')
				);
				$this->model('account')->employee_status($data);
			}
		}

		public function DeleteEmployeeById() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$employee_delete_id = $this->input->post('employee_delete_id');
				$this->model('account')->delete_employees_by_id($employee_delete_id);
			}
		}
		
		public function logout() {
			session_destroy();
			redirect('login');
		}
	}