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
					<span class="breadcrumb-item active">Sales</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button id="button_sales" onclick="sales_modal()" class="btn bg-green mb-3"><i class="icon-cash mr-2"></i><b> ADD SALES</b></button>
		<div class="card">
			<table class="table table-md datatable-fixed-both" id="show-sales-table">
				<thead>
					<tr>
						<th colspan="6"></th>
						<th colspan="13">SALES DETAILS</th>
						<th colspan="3" class="text-center">ACTIONS</th>
					</tr>
					<tr>
						<th>Date</th>
						<th>PO #</th>
						<th>SO #</th>
						<th>DR #</th>
						<th>SI #</th>
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
						<th></th>
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
							<td><?=$timestamp = date( "m/d/Y", strtotime($timestamp));?></td>
							<td><?=$row['sales_po'];?></td>
							<td><?=$row['sales_so'];?></td>
							<td><?=$row['sales_dr'];?></td>
							<td><?=$row['sales_si'];?></td>
							<td><?=$row['sales_particulars'];?></td>
							<td><?=$row['sales_media'];?></td>
							<td><?=$row['sales_width'];?></td>
							<td><?=$row['sales_height'];?></td>
							<td><?=$row['sales_unit'];?></td>
							<td><?=$row['sales_total_area'];?></td>
							<td><?=$row['sales_price_unit'];?></td>
							<td><?=number_format($sub_total, 2);?></td>
							<td><?=$row['sales_qty'];?></td>
							<td><?=number_format($row['sales_total'], 2);?></td>
							<td><?=$row['sales_vat'];?></td>
							<td><?=number_format($amount_due, 2);?></td>
							<td><?=$row['sales_vat'];?></td>
							<td><?=$row['sales_net_amount'];?></td>
							<td style="text-align:center"><a onclick="view_sales('<?=$row['sales_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="view_payment('<?=$row['sales_id']?>')" style="cursor:pointer" alt="Remarks"><i class="icon-eye text-teal-800"></i></a></td>
							<td style="text-align:center"><a onclick="delete_sales('<?=$row['sales_id']?>')" style="cursor:pointer" alt="Remove"><i class="icon-trash text-warning-800"></i></a></td>
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
						<button type="submit" onclick="InsertOrUpdateSales()" ng-disabled="formSales.$invalid" id="btn-sales" class="btn bg-green">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="payment-sales-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-cash3 mr-2"></i> &nbsp;PAYMENT DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formPayment" id="Payment" autocomplete="off">
					<input type="hidden" id="token" name="token" class="form-control" value="<?=$data['token']?>'">
					<input type="hidden" id="sales_payment_id" name="sales_payment_id" class="form-control">
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="PaymentSales()" ng-disabled="formSales.$invalid" id="btn-sales" class="btn bg-green">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
