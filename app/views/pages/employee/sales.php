<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - Transactions</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Sales</span>
					<span class="breadcrumb-item active">Transactions</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button id="button_sales" onclick="sales_modal()" class="btn bg-green mb-3"><i class="icon-cash mr-2"></i><b> ADD SALES</b></button>
		<div class="card">
			<table class="table datatable-fixed-both" id="show-employee-sales-table">
				<thead>
					<tr>
						<th colspan="4"></th>
						<th colspan="16">SALES DETAILS</th>
						<th colspan="2" class="text-center">ACTIONS</th>
					</tr>
					<tr>
						<th>PO #</th>
						<th>SO #</th>
						<th>DR #</th>
						<th>SI #</th>
						<th>Date</th>
						<th>Particulars</th>
						<th>Media</th>
						<th>Width</th>
						<th>Height</th>
						<th>Unit</th>
						<th>Total Area</th>
						<th>Price / Unit</th>
						<th>Sub Total</th>
						<th>Quantity</th>
						<th>Total</th>
						<th>VAT</th>
						<th>Amount Due</th>
						<th>Discount</th>
						<th>Net Amount Due</th>
						<th>Balance</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['sales'] as $row) : ?>
						<?php 
							$timestamp = $row['sales_date'];
							$sub_total = $row['sales_total_area'] * $row['sales_price_unit'];
							$amount_due = $row['sales_total'] + $row['sales_vat'];
						?>
						<tr>
							<td><?=$row['sales_po'];?></td>
							<td><?=$row['sales_so'];?></td>
							<td><?=$row['sales_dr'];?></td>
							<td><?=$row['sales_si'];?></td>
							<td><?=$timestamp = date( "m/d/Y", strtotime($timestamp));?></td>
							<td><?=$row['sales_particulars'];?></td>
							<td><?=$row['sales_media'];?></td>
							<td><?=$row['sales_width'];?></td>
							<td><?=$row['sales_height'];?></td>
							<td><?=$row['sales_unit'];?></td>
							<td><?=number_format($row['sales_total_area'], 2);?></td>
							<td><?=$row['sales_price_unit'];?></td>
							<td><?=number_format($sub_total, 2);?></td>
							<td><?=$row['sales_qty'];?></td>
							<td><?=number_format($row['sales_total'], 2);?></td>
							<td><?=number_format($row['sales_vat'], 2);?></td>
							<td><?=number_format($amount_due, 2);?></td>
							<td><?=number_format($row['sales_discount'], 2);?></td>
							<td><?=number_format($row['sales_net_amount'], 2);?></td>
							<td><?=number_format($row['sales_balance'], 2);?></td>
							<td style="text-align:center"><a onclick="view_sales('<?=$row['sales_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="view_payment('<?=$row['sales_id']?>')" style="cursor:pointer" alt="Payment"><i class="icon-cash text-teal-800"></i></a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="sales-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-add-to-list mr-2"></i> &nbsp;ADD SALES DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formSales" id="formSales" autocomplete="off">
					<input type="hidden" id="token" name="token" class="form-control" value="<?=$data['token']?>'">
					<input type="hidden" id="sales_id" name="sales_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label for="">PO Number <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="PO Number" class="form-control" ng-model="sales_po" require>
									<span ng-messages="formSales.sales_po.$error" ng-if="formSales.sales_po.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-3">
									<label for="">SO Number <small>*</small></label>
									<input type="text" id="sales_so" name="sales_so" placeholder="SO Number" class="form-control" ng-model="sales_so" required>
									<span ng-messages="formSales.sales_so.$error" ng-if="formSales.sales_so.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-3">
									<label for="">DR Number <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="DR Number" class="form-control" ng-model="sales_dr" required>
									<span ng-messages="formSales.sales_dr.$error" ng-if="formSales.sales_dr.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-3">
									<label for="">SI Number <small>*</small></label>
									<input type="text" id="sales_si" name="sales_si" placeholder="SI Number" class="form-control" ng-model="sales_si" required>
									<span ng-messages="formSales.sales_si.$error" ng-if="formSales.sales_si.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">Company</label>
									<input type="text" id="sales_company" name="sales_company" placeholder="Company (optional)" class="form-control">
								</div>
								<div class="col-sm-6">
									<label for="">Contact Person</label>
									<input type="text" id="sales_cp" name="sales_cp" placeholder="Contact Person (optional)" class="form-control" ng-model="sales_cp" ng-pattern="/^[0-9]*$/">
									<span ng-messages="formSales.sales_cp.$error" ng-if="formSales.sales_cp.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type valid number.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="">Particulars <small>*</small></label>
									<input type="text" id="sales_particulars" name="sales_particulars" placeholder="Particulars" class="form-control" ng-model="sales_particulars" required>
									<span ng-messages="formSales.sales_particulars.$error" ng-if="formSales.sales_particulars.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-4">
									<label for="">Media <small>*</small></label>
									<input type="text" id="sales_media" name="sales_media" placeholder="Media" class="form-control" ng-model="sales_media" required>
									<span ng-messages="formSales.sales_media.$error" ng-if="formSales.sales_media.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-2">
									<label for="">Width <small>*</small></label>
									<input type="text" id="sales_width" name="sales_width" placeholder="Width" class="form-control" ng-model="sales_width" ng-pattern="/^[0-9]+\.?[0-9]*$/" required>
									<span ng-messages="formSales.sales_width.$error" ng-if="formSales.sales_width.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-sm-2">
									<label for="">Height <small>*</small></label>
									<input type="text" id="sales_height" name="sales_height" placeholder="Height" class="form-control" ng-model="sales_height" ng-pattern="/^[0-9]+\.?[0-9]*$/" required>
									<span ng-messages="formSales.sales_height.$error" ng-if="formSales.sales_height.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-2">
									<label for="">Unit <small>*</small></label>
									<input type="text" id="sales_unit" name="sales_unit" placeholder="Unit" class="form-control" required>
								</div>
								<div class="col-sm-4">
									<label for="">Total Area <small>*</small></label>
									<input type="text" readonly id="sales_total_area" name="sales_total_area" class="form-control">
								</div>
								<div class="col-sm-4">
									<label for="">Price / Unit <small>*</small></label>
									<input type="text" id="sales_price_unit" name="sales_price_unit" placeholder="Price / Unit" class="form-control">
								</div>
								<div class="col-sm-2">
									<label for="">Quantity <small>*</small></label>
									<input type="text" id="sales_qty" name="sales_qty" placeholder="Qty" class="form-control" ng-model="sales_qty" ng-pattern="/^[0-9]+\.?[0-9]*$/" required>
									<span ng-messages="formSales.sales_qty.$error" ng-if="formSales.sales_qty.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">Sub Total<small>*</small></label>
									<input type="text" readonly id="sales_sub_total" name="sales_sub_total" placeholder="Sub Total" class="form-control">
								</div>
								<div class="col-sm-6">
									<label for="">Total<small>*</small></label>
									<input type="text" readonly id="sales_total" name="sales_total" placeholder="Total" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">VAT</label>
									<input type="text" readonly id="sales_vat" name="sales_vat" placeholder="VAT" class="form-control" ng-model="sales_vat" ng-pattern="/^[0-9]+\.?[0-9]*$/">
									<span ng-messages="formSales.sales_vat.$error" ng-if="formSales.sales_vat.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
									</span>
								</div>
								<div class="col-sm-6">
									<label for="">Amount Due <small>*</small></label>
									<input type="text" readonly id="sales_amount_due" name="sales_amount_due" placeholder="Amount Due" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">Discount</label>
									<input type="text" id="sales_discount" name="sales_discount" placeholder="Discount" class="form-control" ng-model="sales_discount" ng-pattern="/^[0-9]+\.?[0-9]*$/">
									<span ng-messages="formSales.sales_discount.$error" ng-if="formSales.sales_discount.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
									</span>
								</div>
								<div class="col-sm-6">
									<label for="">Net Amount Due <small>*</small></label>
									<input type="text" readonly id="sales_net_amount" name="sales_net_amount" placeholder="Net Amount" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="InsertOrUpdateSales()" ng-disabled="formSales.$invalid" id="btn-sales" class="btn bg-green">Save <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="payment-sales-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-cash3 mr-2"></i> &nbsp;PAYMENT DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formPayment" id="formPayment" autocomplete="off" novalidate>
					<input type="hidden" id="token" name="token" class="form-control" value="<?=$data['token']?>'">
					<input type="hidden" id="payment_sales_id" name="payment_sales_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Net Amount Due <small>*</small></label>
							<input type="text" id="payment_net_amount" name="payment_net_amount" placeholder="Net Amount Due" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label for="">Balance <small>*</small></label>
							<input type="text" id="payment_balance" name="payment_balance" placeholder="Balance" class="form-control" ng-model="payment_balance" readonly>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">Amount <small>*</small></label>
									<input type="text" id="payment_amount" name="payment_amount" placeholder="Amount" class="form-control" ng-model="payment_amount" ng-pattern="/^[0-9]+\.?[0-9]*$/" ng-max="payment_balance">
									<span ng-messages="formPayment.payment_amount.$error" ng-if="formPayment.payment_amount.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="max" class="text-danger">This field should not be larger than the balance</strong>
									</span>
								</div>
								<div class="col-sm-6">
									<label for="">Date <small>*</small></label>
									<input type="date" class="form-control" name="payment_date" id="payment_date" ng-model="payment_date" required>
									<span ng-messages="formPayment.payment_date.$error" ng-if="formPayment.payment_date.$dirty">
										<strong ng-message="required" class="text-danger">Date is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Remark <small>*</small></label>
							<select id="payment_remark" name="payment_remark" class="form-control" ng-model="payment_remark" required>
								<option value="" disabled selected>Select your option</option>
								<option value="DOWN PAYMENT">Down Payment</option>
								<option value="PAID">Paid</option>
							</select>
							<span ng-messages="formPayment.payment_remark.$error" ng-if="formPayment.payment_remark.$dirty">
								<strong ng-message="required" class="text-danger">This field is required.</strong>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="InsertPaymentSales()" ng-disabled="formPayment.$invalid" id="btn-payment" class="btn bg-green">Save <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
