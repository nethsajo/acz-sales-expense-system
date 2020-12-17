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
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Accounts';
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
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
		
		public function logout() {
			session_destroy();
			redirect('login');
		}
	}