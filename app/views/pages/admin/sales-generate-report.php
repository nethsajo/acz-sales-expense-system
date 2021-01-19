<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - Daily, Weekly, Monthly and Yearly Report</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Reports</span>
					<span class="breadcrumb-item">Sales</span>
					<span class="breadcrumb-item active">Daily, Weekly, Monthly and Yearly</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
        <div class="card">
			<div class="card-body">
				<form name="formGenerateSalesReport" method="POST" action="<?=URL?>admin/sales_generate_report" novalidate> 
                	<div class="row">
						<div class="col-xl-6 col-md-8">
							<div class="form-group">
                            	<input type="hidden" id="start_date" name="start_date">
                            	<input type="hidden" id="end_date" name="end_date">
                                <label class="d-block">Select date: </label>
                                <button type="button" class="btn btn-light daterange-predefined" id="sales_daterange">
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
            <table id="show-sales_report-table" class="table datatable-basic">
				<thead>
					<tr>
                        <th>Date</th>
						<th>SO #</th>
						<th>DR # </th>
						<th>SI #</th>
                        <th>Company</th>
                        <th>Remarks</th>
                        <th>Net Amount</th>
                        <th>Amount Paid</th>
                        <th>Balance</th>
					</tr>
				</thead>
				<tbody id="show_sales-report_table">
					<?php foreach($data['report'] as $row) : ?>
                        <?php $timestamp = $row['sales_date']; ?> 
						<tr>
                            <td><?=$timestamp = date( "Y-m-d", strtotime($timestamp));?></td>
							<td><?=$row['sales_so'];?></td>
							<td><?=$row['sales_dr'];?></td>
							<td><?=$row['sales_si'];?></td>
                            <td><?=$row['sales_company'];?></td>
                            <td><?=$row['payment_remarks'];?></td>
							<td><?=number_format($row['sales_net_amount'], 2);?></td>
							<td><?=number_format($row['amount_paid'], 2);?></td>		
                            <td><?=number_format($row['sales_balance'], 2);?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>