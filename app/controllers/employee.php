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

		public function sales() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Sales';
			$data['sales'] = $this->model('account')->get_all_sales_transactions();
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/employee/sales',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}

		public function payments() {
			$data['token'] = $_SESSION['token'];
			$data['title'] = 'Payments';
			$data['payments'] = $this->model('account')->get_all_payment_details();
			$data['user'] = $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/employee/payments',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}

		public function InsertOrUpdateSales() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'sales_id' 			=> $this->input->post('sales_id'),
					'sales_po'			=> $this->input->post('sales_po'),
					'sales_so'			=> $this->input->post('sales_so'),
					'sales_dr'			=> $this->input->post('sales_dr'),
					'sales_si'			=> $this->input->post('sales_si'),
					'sales_company'		=> $this->input->post('sales_company'),
					'sales_cp'			=> $this->input->post('sales_cp'),
					'sales_particulars'	=> $this->input->post('sales_particulars'),
					'sales_media'		=> $this->input->post('sales_media'),
					'sales_width'		=> $this->input->post('sales_width'),
					'sales_height'		=> $this->input->post('sales_height'),
					'sales_unit'		=> $this->input->post('sales_unit'),
					'sales_total_area'	=> $this->input->post('sales_total_area'),
					'sales_price_unit'	=> $this->input->post('sales_price_unit'),
					'sales_qty'			=> $this->input->post('sales_qty'),
					'sales_total'		=> $this->input->post('sales_total'),
					'sales_vat'			=> $this->input->post('sales_vat'),
					'sales_discount'	=> $this->input->post('sales_discount'),
					'sales_net_amount'	=> $this->input->post('sales_net_amount')
				);
				$this->model('account')->sales_transactions($data);
			}
		}

		public function GetSalesById() {
			$sales_id = $this->input->post('sales_id');
			$this->model('account')->get_sales_by_id($sales_id);
		}

		public function GetPaymentDetailsById() {
			$payment_sales_id = $this->input->post('payment_sales_id');
			$this->model('account')->get_payment_details_by_id($payment_sales_id);
		}

		public function GetPaymentInfoById() {
			$payment_info_id = $this->input->post('payment_info_id');
			$this->model('account')->get_payment_info_by_id($payment_info_id);
		}

		public function InsertPaymentSales() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'payment_amount' 	=> $this->input->post('payment_amount'),
					'payment_date'		=> $this->input->post('payment_date'),
					'payment_remark'	=> $this->input->post('payment_remark'),
					'payment_balance'	=> $this->input->post('payment_balance'),
					'payment_sales_id'	=> $this->input->post('payment_sales_id')
				);
				$this->model('account')->sales_payment($data);
			}
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