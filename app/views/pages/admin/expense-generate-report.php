<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Monthly and Yearly Report</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Reports</span>
					<span class="breadcrumb-item">Expense</span>
					<span class="breadcrumb-item active">Monthly and Yearly Expense Report</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-body">
				<form name="formMonthlyExpenseReport" method="POST" action="<?=URL?>admin/expense_generate_report" novalidate> 
					<div class="row">
						<div class="col-xl-5 col-md-4">
							<div class="form-group">
								<label>Month:</label>
								<select id="from_month" name="from_month" class="form-control" required>
                                    <option value="" disabled selected>Select month</option>
                                    <?php $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); ?>
                                    <?php foreach ($months as $key => $value) : ?>
                                        <?php $numeric_month = $key + 1; ?>
                                        <option value="<?=$numeric_month;?>"><?=$value;?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
						</div>
                        <div class="col-xl-5 col-md-4">
							<div class="form-group">
								<label>Year:</label>
								<select id="from_year" name="from_year" class="form-control" required>
                                    <option value="" disabled selected>Select year</option>
                                    <?php $start_year = 2020; ?>
                                    <?php for($start_year; $start_year <= date("Y"); $start_year++) : ?>
                                        <option value="<?=$start_year;?>"><?=$start_year;?></option>
                                    <?php endfor; ?>
                                </select>
							</div>
						</div>
						<div class="col-xl-2 col-md-4">
							<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" class="btn bg-green btn-block">Print <i class="icon-printer position-right ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<table id="show-emr-table" class="table datatable-fixed-both">
				<thead>
					<tr>
						<th>Check Voucher Number</th>
						<th>Check Number</th>
						<th>Check Date</th>
						<th>Date</th>
                        <th>Vendor</th>
						<th>TIN</th>
						<th>SI</th>
						<th>OR</th>
                        <th>Sum of Total</th>
					</tr>
				</thead>
				<tbody id="show_emr_table">
					<?php foreach($data['report'] as $row) : ?>
						<?php $date = $row['expense_date'];?>
						<tr>
                        	<td><?=$row['expense_cvno'];?></td>
                        	<td><?=$row['expense_cn'];?></td>
                        	<td><?=$row['expense_check_date'];?></td>
                        	<td><?=$date = date( "m/d/Y", strtotime($date));?></td>
                        	<td><?=$row['expense_vendor'];?></td>
                        	<td><?=$row['expense_tin'];?></td>
                        	<td><?=$row['expense_si'];?></td>
                        	<td><?=$row['expense_or'];?></td>
                        	<td><?=$row['sum_total'];?></td>
                    	</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>