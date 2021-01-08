<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Monthly Report</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Expense</span>
					<span class="breadcrumb-item">Reports</span>
					<span class="breadcrumb-item active">Monthly Expense Report</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-body">
				<form name="formMonthlyExpenseReport" method="POST" action="" autocomplete="off" novalidate> 
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Month:</label>
								<select id="from_month" name="from_month" class="form-control" ng-model="from_month" required>
                                    <option value="" disabled selected>Select month</option>
                                    <?php $months = array("January", "February", "March", "Apil", "May", "June", "July", "August", "September", "October", "November", "December"); ?>
                                    <?php foreach ($months as $key => $value) : ?>
                                        <?php $numeric_month = $key + 1; ?>
                                        <option value="<?=$numeric_month;?>"><?=$value;?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
						</div>
                        <div class="col-md-5">
							<div class="form-group">
								<label>Year:</label>
								<select id="from_year" name="from_year" class="form-control" ng-model="from_year" required>
                                    <option value="" disabled selected>Select year</option>
                                    <?php $start_year = 2020; ?>
                                    <?php for($start_year; $start_year <= date("Y"); $start_year++) : ?>
                                        <option value="<?=$start_year;?>"><?=$start_year;?></option>
                                    <?php endfor; ?>
                                </select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" class="btn bg-green btn-block">Print <i class="icon-printer position-right ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<table id="show-emr-table" class="table datatable-basic">
				<thead>
					<tr>
						<th>Check Voucher No.</th>
						<th>Check Number</th>
						<th>Check Date</th>
						<th>Date</th>
                        <th>Vendor</th>
						<th>TIN</th>
						<th>SI No.</th>
						<th>OR No.</th>
                        <th>Sum of Total</th>
					</tr>
				</thead>
				<tbody id="show_emr_table">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
				</tbody>
			</table>
		</div>
	</div>