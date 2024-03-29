<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - Statement of Accounts</h4>
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
					<span class="breadcrumb-item active">Statement of Accounts</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
        <div class="card">
			<div class="card-body">
				<form name="formSOA" method="POST" action="<?=URL?>admin/soa_report" autocomplete="off" novalidate> 
					<div class="row">
                        <div class="col-md-4">
							<div class="form-group">
								<label>Company: </label>
								<input type="text" class="form-control" name="company_soa" id="company_soa" ng-model="company_soa" placeholder="Company" required>
                                <span ng-messages="formSOA.company_soa.$error" ng-if="formSOA.company_soa.$dirty">
                                    <strong ng-message="required" class="text-danger">This field is required.</strong>
                                </span>
                            </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
                            	<input type="hidden" id="from_soa" name="from_soa">
                            	<input type="hidden" id="to_soa" name="to_soa">
                                <label class="d-block">Select date: </label>
                                <button type="button" class="btn btn-light daterange-predefined" id="soa_daterange">
                                    <i class="icon-calendar22 mr-2"></i>
                                    <span></span>
                                </button>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" ng-disabled="formSOA.$invalid" class="btn bg-green btn-block">Print <i class="icon-printer position-right ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<table id="show-soa-table" class="table datatable-basic">
				<thead>
					<tr>
						<th>SO #</th>
						<th>DR # </th>
						<th>SI #</th>
						<th>PO #</th>
                        <th>Date</th>
                        <th>Company</th>
                        <th>Particular</th>
                        <th>Net Amount</th>
                        <th>Amount Paid</th>
                        <th>Date Paid</th>
                        <th>Balance</th>
					</tr>
				</thead>
				<tbody id="show_soa_table">
					<?php foreach($data['soa'] as $row) : ?>
                        <?php $timestamp = $row['sales_date']; ?> 
						<tr>
							<td><?=$row['sales_so'];?></td>
							<td><?=$row['sales_dr'];?></td>
							<td><?=$row['sales_si'];?></td>
							<td><?=$row['sales_po'];?></td>
                            <td><?=$timestamp = date( "Y-m-d", strtotime($timestamp));?></td>
                            <td><?=$row['sales_company'];?></td>
                            <td><?=$row['sales_particulars'];?></td>
							<td><?=number_format($row['sales_net_amount'], 2);?></td>
							<td><?=number_format($row['amount_paid'], 2);?></td>
							<td><?=$row['payment_date'];?></td>
                            <td><?=number_format($row['sales_balance'], 2);?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
    </div>