<!-- Page content -->
<div class="page-content">
	<!-- Main sidebar -->
	<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
		<!-- Sidebar Mobile Toggler -->
		<div class="sidebar-mobile-toggler text-center">
			<a href="#" class="sidebar-mobile-main-toggle">
				<i class="icon-arrow-left8"></i>
			</a>
			<span class="font-weight-semibold">Navigation</span>
			<a href="#" class="sidebar-mobile-expand">
				<i class="icon-screen-full"></i>
				<i class="icon-screen-normal"></i>
			</a>
		</div>
		<!-- /Sidebar Mobile Toggler -->

		<!-- Sidebar content -->
		<div class="sidebar-content">
			<!-- User menu -->
			<div class="sidebar-user">
				<div class="card-body">
					<div class="media">
						<div class="mr-3">
							<i class="icon-user text-slate-300 border-slate-300 border-3 rounded-round p-2"></i>
						</div>

						<div class="media-body">
							<div class="media-title font-weight-semibold"><?=$data['user']->employee_firstname .' '.  $data['user']->employee_surname;?></div>
							<div class="font-size-sm">
								<?= $data['user']->role_id == 1 ? '<label class="badge bg-green">Administrator</label>' : ($data['user']->role_id == 2 ? '<label class="badge bg-green">Employee</label>': null);?>
							</div>
						</div>

						<div class="ml-3 align-self-center">
							<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
							<a href="<?=URL.$controller?>/profile" class="text-green"><i class="icon-cog"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /user menu -->
			<div class="card card-sidebar-mobile">
				<ul class="nav nav-sidebar" data-nav-type="accordion">
					<!-- Main -->
					<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main Navigation</div> <i class="icon-menu" title="Main"></i></li>
					<?php if($data['user']->role_id == 1) { ?> 
						<li class="nav-item">
							<a href="<?=URL?>admin/dashboard" class="nav-link <?=$data['title'] == 'Dashboard' ? 'active' : '';?>">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cash"></i> <span>Sales</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Sales">
								<li class="nav-item"><a href="<?=URL?>admin/sales" class="nav-link <?=$data['title'] == 'Sales' ? 'active': '';?>">Transactions</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/payments" class="nav-link <?=$data['title'] == 'Payments' ? 'active': '';?>">Payments</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-chart"></i> <span>Expenses</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Expenses">
								<li class="nav-item"><a href="<?=URL?>admin/expenses" class="nav-link <?= $data['title'] == 'Expenses' ? 'active' : '';?>">Transactions</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-printer"></i> <span>Reports</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Reports">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Sales</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="<?=URL?>admin/soa" class="nav-link <?= $data['title'] == 'Statement of Accounts' ? 'active' : '';?>">Statement of Accounts</a></li>
										<li class="nav-item"><a href="<?=URL?>admin/filter_sales_report" class="nav-link <?= $data['title'] == 'Sales Summary Report' ? 'active' : '';?>">Daily, Weekly, Monthly and Yearly</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Expenses</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="<?=URL?>admin/monitoring" class="nav-link <?= $data['title'] == 'Check Monitoring' ? 'active' : '';?>">Check Monitoring</a></li>
										<li class="nav-item"><a href="<?=URL?>admin/filter_expense_report" class="nav-link <?= $data['title'] == 'Expense Summary Report' ? 'active' : '';?>">Daily, Weekly, Monthly and Yearly</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Manage Accounts</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Manage Accounts">
								<li class="nav-item"><a href="<?=URL?>admin/accounts" class="nav-link <?= $data['title'] == 'Accounts' ? 'active' : '';?>">Employees</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/logs" class="nav-link <?= $data['title'] == 'Logs' ? 'active' : '';?>">Logs</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cog"></i> <span>Add / Remove</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Add / Remove">
								<li class="nav-item"><a href="<?=URL?>admin/banks" class="nav-link <?= $data['title'] == 'Banks' ? 'active' : '';?>">Banks</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/category" class="nav-link <?= $data['title'] == 'Category' ? 'active' : '';?>">Category</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/media" class="nav-link <?= $data['title'] == 'Media' ? 'active' : '';?>">Media</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/payee" class="nav-link <?= $data['title'] == 'Payee' ? 'active' : '';?>">Payee</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a href="<?=URL?>employee/dashboard" class="nav-link <?=$data['title'] == 'Dashboard' ? 'active' : '';?>">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cash"></i> <span>Sales</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Sales">
								<li class="nav-item"><a href="<?=URL?>employee/sales" class="nav-link <?=$data['title'] == 'Sales' ? 'active': '';?>">Transactions</a></li>
								<li class="nav-item"><a href="<?=URL?>admin/payments" class="nav-link <?=$data['title'] == 'Payments' ? 'active': '';?>">Payments</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?=URL?>employee/profile" class="nav-link <?=$data['title'] == 'Profile' ? 'active': '';?>">
								<i class="icon-home4"></i>
								<span>My Profile</span></span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>