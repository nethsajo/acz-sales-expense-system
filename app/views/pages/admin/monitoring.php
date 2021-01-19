<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Check Monitoring</h4>
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
					<span class="breadcrumb-item active">Check Monitoring</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<div class="card-body">
				<form name="formCheckMonitoring" method="POST" action="<?=URL?>admin/monitoring_report" autocomplete="off" novalidate> 
					<div class="row">
						<div class="col-xl-6 col-md-8">
							<div class="form-group">
                            	<input type="hidden" id="from" name="from">
                            	<input type="hidden" id="to" name="to">
                                <label class="d-block">Select date: </label>
                                <button type="button" class="btn btn-light daterange-predefined" id="monitoring_daterange">
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
			<table id="show-cm-table" class="table datatable-basic">
				<thead>
					<tr>
						<th>Check Date</th>
						<th>Check Number</th>
						<th>Vendor</th>
						<th>Sum of Total</th>
					</tr>
				</thead>
				<tbody id="show_cm_table">
					<?php foreach($data['monitoring'] as $row) { ?>
						<tr>
							<td><?=$row['expense_check_date'];?></td>
							<td><?=$row['expense_cn'];?></td>
							<td><?=$row['expense_vendor'];?></td>
							<td><?=$row['sum_total'];?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>