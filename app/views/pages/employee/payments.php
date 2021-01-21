<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - Payments</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Sales</span>
                    <span class="breadcrumb-item active">Payments</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
        <div class="card">
            <table class="table datatable-basic" id="show-payment-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Particulars</th>
                        <th>Media</th>
                        <th>Net Amount</th>
                        <th>Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['payments'] as $row) : ?>
                        <?php $timestamp = $row['sales_date'];?>
                        <tr>
                            <td><?=$timestamp = date( "m/d/Y", strtotime($timestamp));?></td>
                            <td><?=$row['sales_particulars'];?></td>
                            <td><?=$row['sales_media'];?></td>
                            <td><?=number_format($row['sales_net_amount'], 2);?></td>
                            <td><?=number_format($row['sales_balance'], 2);?></td>
                            <td><a onclick="view_payment_detail('<?=$row['sales_id']?>')" style="cursor:pointer" data-toggle="modal" data-target="#payment-details-modal"><span class="badge badge-info"> <i class="icon-eye mr-2"></i> View</span></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="payment-details-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-green-600">
                        <h5 class="modal-title" id="modal-title"><i class="icon-cash3 mr-2"></i> &nbsp;PAYMENT DETAILS</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <input type="hidden" id="payment_info_id" name="payment_info_id" class="form-control">
                        <h6 class="font-weight-semibold">Sales Invoice</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="3">Date</th>
                                    <td id="sales_date"></td>
                                </tr>
                                <tr>
                                    <th>PO Number</th>
                                    <td id="sales_po"></td>
                                    <th>SO Number</th>
                                    <td id="sales_so"></td>
                                </tr>
                                <tr>
                                    <th>DR Number</th>
                                    <td id="sales_dr"></td>
                                    <th>SI Number</th>
                                    <td id="sales_si"></td>
                                </tr>
                            </table>
                            
                            <h6 class="font-weight-semibold mt-3">Sales Details</h6>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Particulars</th>
                                    <td id="sales_particulars"></td>
                                    <th>Media</th>
                                    <td id="sales_media"></td>
                                </tr>
                            </table>
                        </div>
                        <h6 class="font-weight-semibold mt-3">Payment Details</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tbbody">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount Paid</th>
                                        <th>Remarks</th>
                                    </tr>
                                    <tbody>
                                        <tr style="display:none">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Total Fees: </th>
                                    <td id="sales_net_amount"></td>
                                </tr>
                                <tr>
                                    <th>Total Paid: </th>
                                    <td id="total_paid"></td>
                                </tr>
                                <tr>
                                    <th>Balance: </th>
                                    <td id="total_balance"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
						<button type="button" class="btn bg-green-600" data-dismiss="modal">Close</button>
					</div>
                </div>
            </div>
        </div>
    </div>