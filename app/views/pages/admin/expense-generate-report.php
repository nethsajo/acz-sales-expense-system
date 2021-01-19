<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Daily, Weekly, Monthly and Yearly Report</h4>
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
					<span class="breadcrumb-item active">Daily, Weekly, Monthly and Yearly</span>
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
						<div class="col-xl-6 col-md-8">
							<div class="form-group">
                            	<input type="hidden" id="expense_start_date" name="expense_start_date">
                            	<input type="hidden" id="expense_end_date" name="expense_end_date">
                                <label class="d-block">Select date: </label>
                                <button type="button" class="btn btn-light daterange-predefined" id="expense_daterange">
                                    <i class="icon-calendar22 mr-2"></i>
                                    <span></span>
                                </button>
							</div>
						</div>
						<div class="col-xl-2 ml-auto col-auto">
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