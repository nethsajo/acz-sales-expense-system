<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dashboard</span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item active">Dashboard</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-xl-4">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-people icon-3x text-success-400"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0"><?=number_format($data['total_employees'], 0);?></h3>
							<span class="text-uppercase font-size-sm text-muted">Total Employees</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-xl-4">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-cash icon-3x text-indigo-400"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0">&#x20b1; <?=number_format($data['total_sales']->total_sales, 2);?></h3>
							<span class="text-uppercase font-size-sm text-muted">Total Sales</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-xl-4">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-chart icon-3x text-blue-400"></i>
						</div>
						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0">&#x20b1; <?=number_format($data['total_expenses']->total_expenses, 2);?></h3>
							<span class="text-uppercase font-size-sm text-muted">Total Expenses</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"></h6>
			</div>

			<div class="card-body py-0">
				<div id="chart-sales-expenses" class="chart position-relative"></div>
			</div>
		</div>

		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"></h6>
			</div>

			<div class="card-body py-0">
				<div id="chart-container" class="chart position-relative"></div>
			</div>
		</div>

		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"></h6>
			</div>
			<div class="card-body py-0">
				<div id="chart-sales-media" class="chart position-relative"></div>
			</div>
		</div>
			
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title"></h6>
			</div>
			<div class="card-body py-0">
				<div id="chart-collected-uncollected" class="chart position-relative"></div>
			</div>
		</div>
	</div>