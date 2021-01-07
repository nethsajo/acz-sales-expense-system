<?php 
	class admin extends Controller {
		
		public function __construct() {
			if(!isset($_SESSION['account_id'])) {
				redirect('login');
			}
			$_SESSION['token'] = TOKEN;
			$this->input = $this->model('account');
		}

		public function chart() {
			$this->model('account')->expense_chart();
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
			$data['token']	= $_SESSION['token'];
			$data['title']	= 'Profile';
			$data['user'] 	= $this->model('account')->get_user_information($_SESSION['account_id']);
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
			$data['token']	= $_SESSION['token'];
			$data['title']	= 'Banks';
			$data['banks']	= $this->model('account')->get_all_banks();
			$data['user']	= $this->model('account')->get_user_information($_SESSION['account_id']);
			$this->view('components/header',$data);
			$this->view('components/top-bar',$data);
			$this->view('components/sidebar',$data);
			$this->view('pages/admin/banks',$data);
			$this->view('components/footer',$data);
			$this->view('components/scripts',$data);
		}
		
		public function category() {
			$data['token'] 		= $_SESSION['token'];
			$data['title']		= 'Category';
			$data['category']	= $this->model('account')->get_all_expense_category();
			$data['user']		= $this->model('account')->get_user_information($_SESSION['account_id']);
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
			$data['payee'] = $this->model('account')->get_all_payee();
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
			$data['banks'] = $this->model('account')->get_all_banks();
			$data['payee'] = $this->model('account')->get_all_payee();
			$data['units'] = $this->model('account')->get_units();
			$data['category'] = $this->model('account')->get_all_expense_category();
			$data['transactions'] = $this->model('account')->get_all_expense_transactions();
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
			$data['title'] = 'Check Monitoring';
			$data['monitoring'] = $this->model('account')->get_check_monitoring();
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
			$data['token'] 	= $_SESSION['token'];
			$data['title'] 	= 'Logs';
			$data['logs']	= $this->model('account')->get_logs(1);
			$data['user']	= $this->model('account')->get_user_information($_SESSION['account_id']);
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

		public function reports() {
			$from 	= $_POST['from'];
			$to		= $_POST['to'];

			$monitoring = array('from' => $from, 'to' => $to);
			$check_monitoring = $this->model('account')->get_monitoring($monitoring);
			
			$from_date = date('F d, Y',strtotime($from));
        	$to_date  = date('F d, Y',strtotime($to));
        
        	$pdf = new TCPDF('P','mm','Legal');
			$pdf->AddPage();
			$pdf->SetFont('helvetica','B',10);
			$pdf->Image('http://localhost/acz-thesis/assets/images/acz.png', 20, 12, 20, 20, '', '', '', true, 1000);
			$pdf->SetFont('helvetica','B',13);
			$pdf->cell(190,5,'ACZ Digital and Printing Services',0,1,'C');
			$pdf->SetFont('helvetica','B',10);
			$pdf->cell(190,5,'Block 9 Lot 20 Juana Complex 3A Brgy. San Francisco City of Binãn, Laguna',0,1,'C');
			$pdf->SetFont('helvetica','B',10);
			$pdf->cell(190,5,'Mobile No. (+63) 933-8566-850',0,1,'C');
			$pdf->cell(190,5,'',0,1,'C');
			$pdf->cell(190,5,'',0,1,'C');
			$pdf->SetFont('helvetica','B',15);
			$pdf->cell(190,5,'CHECK MONITORING',0,1,'C');
			$pdf->SetFont('helvetica','B',10);
			$pdf->cell(190,5,'Date : From '.$from_date.' to '.$to_date.'',0,1,'C');
			$pdf->cell(190,5,'',0,1,'C');
			$pdf->SetFont('helvetica','B',10);
			
			$tbl = <<<EOD
			<table style="border:1px solid #000">
				<tr>
					<th style="border:1px solid #000">CHECK DATE</th>
					<th style="border:1px solid #000">CHECK NUMBER</th>
					<th style="border:1px solid #000">VENDOR</th>
					<th style="border:1px solid #000">SUM OF TOTAL</th>
				</tr>
				<tr>
					<td style="border:1px solid #000">Try</td>
					<td style="border:1px solid #000">Try</td>
					<td style="border:1px solid #000">Try</td>
					<td style="border:1px solid #000">Try</td>
				</tr>
			</table> 
			EOD;
			
			$pdf->writeHTML($tbl, true, false, false, false, '');
			$pdf->Output(); 
		}

		public function GenerateEmployeeNumber() {
			$this->model('account')->generate_employee_number();
		}

		public function GetInformationById() {
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

		//Banks
		public function InsertOrUpdateBanks() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'bank_id'	=> $this->input->post('bank_id'),
					'bank_name'	=> $this->input->post('bank_name')
				);
				$this->model('account')->banks($data);
			}
		}

		public function GetBanksById() {
			$bank_id = $this->input->post('bank_id');
			$this->model('account')->get_banks_by_id($bank_id);
		}

		public function DeleteBankById() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$bank_delete_id = $this->input->post('bank_delete_id');
				$this->model('account')->delete_banks_by_id($bank_delete_id);
			}
		}

		//Expense Category
		public function InsertOrUpdateExpenseCategory() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'expense_category_id'	=> $this->input->post('expense_category_id'),
					'expense_category_name'	=> $this->input->post('expense_category_name')
				);
				$this->model('account')->expense_category($data);
			}
		}

		public function GetExpenseCategoryById() {
			$expense_category_id = $this->input->post('expense_category_id');
			$this->model('account')->get_expense_category_by_id($expense_category_id);
		}

		public function DeleteExpenseCategoryById() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$expense_category_delete_id = $this->input->post('expense_category_delete_id');
				$this->model('account')->delete_expense_category_by_id($expense_category_delete_id);
			}
		}

		//Expense Payee
		public function InsertOrUpdatePayee() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'expense_payee_id'		=> $this->input->post('expense_payee_id'),
					'expense_payee_name'	=> $this->input->post('expense_payee_name')
				);
				$this->model('account')->expense_payee($data);
			}
		}

		public function GetPayeeById() {
			$expense_payee_id = $this->input->post('expense_payee_id');
			$this->model('account')->get_payee_by_id($expense_payee_id);
		}

		public function DeletePayeeById() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$payee_delete_id = $this->input->post('payee_delete_id');
				$this->model('account')->delete_payee_by_id($payee_delete_id);
			}
		}

		public function InsertOrUpdateExpenseTransaction() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'expense_id'             => $this->input->post('expense_id'), 
					'expense_category'       => $this->input->post('expense_category'),
					'expense_vendor'         => $this->input->post('expense_vendor'),
					'expense_tin'            => $this->input->post('expense_tin'),
					'expense_si'             => $this->input->post('expense_si'),
					'expense_or'             => $this->input->post('expense_or'),
					'expense_particular'     => $this->input->post('expense_particular'),
					'expense_unit'           => $this->input->post('expense_unit'),
					'expense_payee'          => $this->input->post('expense_payee'),
					'expense_bank'           => $this->input->post('expense_bank'),
					'expense_cvno'           => $this->input->post('expense_cvno'),
					'expense_cn'             => $this->input->post('expense_cn'),
					'expense_check_date'     => $this->input->post('expense_check_date'),
					'expense_qty'            => $this->input->post('expense_qty'),
					'expense_price_unit'     => $this->input->post('expense_price_unit'),
					'expense_discount'       => $this->input->post('expense_discount'),
					'expense_total_price'    => $this->input->post('expense_total_price'),
					'expense_vat'            => $this->input->post('expense_vat'),
					'expense_remarks'        => ""
				);
				$this->model('account')->expense_transactions($data);
			}
		}

		public function EditExpenseRemarks() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$data = array(
					'expense_details_id'	=> $this->input->post('expense_details_id'),
					'expense_remarks'		=> $this->input->post('expense_remarks')
				);
				$this->model('account')->expense_remarks($data);
			}
		}

		public function GetExpenseTransactionById() {
			$expense_id = $this->input->post('expense_id');
			$this->model('account')->get_expense_transaction_by_id($expense_id);
		}

		public function DeleteExpensesById() {
			if(isset($_SESSION['token']) == $this->input->post('token')) {
				$expense_delete_id = $this->input->post('expense_delete_id');
				$this->model('account')->delete_expenses_by_id($expense_delete_id);
			}
		}
		
		public function logout() {
			$_SESSION = array();
			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}
			session_destroy();
			redirect('login');
		}
	}