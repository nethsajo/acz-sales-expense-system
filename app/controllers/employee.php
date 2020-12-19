<?php 
	class employee extends Controller {
		
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
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/employee/dashboard',$data);
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
			$this->view('pages/employee/profile',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}

		public function UpdatePassword() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'account_id'		=> $_SESSION['account_id'],
					'current_password'	=> $this->input->post('current_password'),
					'new_password'     	=> hashing($this->input->post('new_password'))
				);
				$this->model('account')->update_password($data);
			}
		}
		
		public function logout() {
			session_destroy();
			redirect('login');
		}
	}