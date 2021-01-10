<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense </span> - Transactions</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Expense</span>
					<span class="breadcrumb-item active">Transactions</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button onclick="expense_modal()" id="btn-expense" class="btn bg-green mb-3"><i class="icon-plus3 mr-2"></i><b> ADD NEW EXPENSE</b></button>
		<div class="card">
			<table class="table datatable-fixed-both" id="show-expense-transactions-table">
				<thead>
					<tr>
						<th colspan="13"></th>
						<th colspan="6">ACCOUNTS PAYABLE</th>
						<th colspan="3"></th>
						<th colspan="3" class="text-center">ACTIONS</th>
					</tr>
					<tr>
						<th>Date</th>
						<th>Category</th>
						<th>Vendor</th>
						<th>TIN</th>
						<th>SI Number</th>
						<th>OR Number</th>
						<th>Particular</th>
						<th>Qty</th>
						<th>Unit</th>
						<th>Price/Unit</th>
						<th>Total Price</th>
						<th>Discount</th>
						<th>Total</th>
						<th>Cash</th>
						<th>Check Voucher Number</th>
						<th>Payee</th>
						<th>Bank</th>
						<th>Check Number</th>
						<th>Check Date</th>
						<th>VAT</th>
						<th>Vatable Amount</th>
						<th>Remarks</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['transactions'] as $row) : ?>
						<?php 
							$timestamp = $row['expense_date']; 
							$vatableAmount = $row['expense_total'] - $row['expense_vat'];    
						?>
						<tr>
							<td><?=$timestamp = date( "m/d/Y", strtotime($timestamp));?></td> 
							<td><?=$row['expense_category'];?></td>
							<td><?=$row['expense_vendor'];?></td>
							<td><?=$row['expense_tin'];?></td> 
							<td><?=$row['expense_si'];?></td>
							<td><?=$row['expense_or'];?></td> 
							<td><?=$row['expense_particular'];?></td>
							<td><?=$row['expense_qty'];?></td> 
							<td><?=$row['expense_unit'];?></td> 
							<td><?=$row['expense_price_unit'];?></td> 
							<td><?=$row['expense_total'];?></td> 
							<td><?=$row['expense_discount'];?></td>
							<td><?=$row['expense_total'];?></td>
							<td><?=$row['expense_total'];?></td> 
							<td><?=$row['expense_cvno'];?></td>   
							<td><?=$row['expense_payee'];?></td>
							<td><?=$row['expense_bank'];?></td>
							<td><?=$row['expense_cn'];?></td>
							<td><?=$row['expense_check_date'];?></td>
							<td><?=$row['expense_vat'];?></td>
							<td><?= number_format((float)$vatableAmount, 2, '.', '');?></td>
							<td><?=$row['expense_remarks'];?></td>
							<td style="text-align:center"><a onclick="view_expense_transaction('<?=$row['expense_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="view_remarks('<?=$row['expense_id']?>')"" style="cursor:pointer" alt="Remarks"><i class="icon-eye text-teal-800"></i></a></td>
							<td style="text-align:center"><a onclick="delete_expense_transaction('<?=$row['expense_id']?>')" style="cursor:pointer" alt="Remove"><i class="icon-trash text-warning-800"></i></a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="expense-transaction-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-file-spreadsheet mr-2"></i> &nbsp; ADD EXPENSE DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseTransaction" id="formExpenseTransaction">
					<input type="hidden" id="token" name="token" class="form-control" value="<?=$data['token']?>'">
					<input type="hidden" id="expense_id" name="expense_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">TIN <small>*</small></label>
									<input type="text" id="expense_tin" name="expense_tin" placeholder="TIN" class="form-control" ng-model="expense_tin" required>
									<span ng-messages="formExpenseTransaction.expense_tin.$error" ng-if="formExpenseTransaction.expense_tin.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">SI No. <small>*</small></label>
									<input type="text" id="expense_si" name="expense_si" placeholder="Sales Invoice Number" class="form-control" ng-model="expense_si" required>
									<span ng-messages="formExpenseTransaction.expense_si.$error" ng-if="formExpenseTransaction.expense_si.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">OR No. <small>*</small></label>
									<input type="text" id="expense_or" name="expense_or" placeholder="Official Receipt Number" class="form-control" ng-model="expense_or" required>
									<span ng-messages="formExpenseTransaction.expense_or.$error" ng-if="formExpenseTransaction.expense_or.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Category <small>*</small></label>
									<select id="expense_category" name="expense_category" class="form-control" ng-model="expense_category" required>
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data['category'] as $row_category):?>
											<option value="<?=$row_category['category_name']?>"><?=$row_category['category_name']?></option>
										<?php endforeach;?>
									</select>
									<span ng-messages="formExpenseTransaction.expense_category.$error" ng-if="formExpenseTransaction.expense_category.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Particular <small>*</small></label>
									<input type="text" id="expense_particular" name="expense_particular" placeholder="Particular" class="form-control" ng-model="expense_particular" required>
									<span ng-messages="formExpenseTransaction.expense_particular.$error" ng-if="formExpenseTransaction.expense_particular.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-2">
									<label for="">Quantity <small>*</small></label>
									<input type="text" id="expense_qty" name="expense_qty" placeholder="Quantity" class="form-control" ng-pattern="/^[0-9]+\.?[0-9]*$/" ng-model="expense_qty" required>
									<span ng-messages="formExpenseTransaction.expense_qty.$error" ng-if="formExpenseTransaction.expense_qty.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-2">
									<label for="">Unit <small>*</small></label>
									<select id="expense_unit" name="expense_unit" class="form-control" ng-model="expense_unit" required>
										<?php foreach ($data['units'] as $row_units):?>
											<option value="<?=$row_units['units_name']?>"><?=$row_units['units_name']?></option>
										<?php endforeach;?>
									</select>
									<span ng-messages="formExpenseTransaction.expense_unit.$error" ng-if="formExpenseTransaction.expense_unit.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Price / Unit <small>*</small></label>
									<input type="text" id="expense_price_unit" name="expense_price_unit" placeholder="Price / Unit" class="form-control" ng-pattern="/^[0-9]+\.?[0-9]*$/" ng-model="expense_price_unit" required>
									<span ng-messages="formExpenseTransaction.expense_price_unit.$error" ng-if="formExpenseTransaction.expense_price_unit.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-3">
									<label for="">Discount </label>
									<input type="text" id="expense_discount" name="expense_discount" class="form-control" placeholder="Discount (optional)" ng-pattern="/^[0-9]+\.?[0-9]*$/" ng-model="expense_discount">
									<span ng-messages="formExpenseTransaction.expense_discount.$error" ng-if="formExpenseTransaction.expense_discount.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
									</span>
								</div>
								<div class="col-md-2">
									<label for="">VAT </label>
									<input type="text" id="expense_vat" name="expense_vat" placeholder="VAT" class="form-control" ng-pattern="/^[0-9]+\.?[0-9]*$/" ng-model="expense_vat">
									<span ng-messages="formExpenseTransaction.expense_vat.$error" ng-if="formExpenseTransaction.expense_vat.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Total Price <small>*</small></label>
									<input type="text" readonly id="expense_total_price" name="expense_total_price" placeholder="Total Price" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Check Voucher Number <small>*</small></label>
									<input type="text" id="expense_cvno" name="expense_cvno" placeholder="Check Voucher Number" class="form-control" ng-pattern="/^[0-9]*$/" ng-model="expense_cvno" required>
									<span ng-messages="formExpenseTransaction.expense_cvno.$error" ng-if="formExpenseTransaction.expense_cvno.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Check Number <small>*</small></label>
									<input type="text" id="expense_cn" name="expense_cn" placeholder="Check Number" class="form-control" ng-pattern="/^[0-9]*$/" ng-model="expense_cn" required>
									<span ng-messages="formExpenseTransaction.expense_cn.$error" ng-if="formExpenseTransaction.expense_cn.$dirty">
										<strong ng-message="pattern" class="text-danger">Please type numbers only.</strong>
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Bank <small>*</small></label>
									<select id="expense_bank" name="expense_bank" class="form-control" ng-model="expense_bank" required>
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data['banks'] as $row_banks):?>
											<option value="<?=$row_banks['bank_name']?>"><?=$row_banks['bank_name']?></option>
										<?php endforeach;?>
									</select>
									<span ng-messages="formExpenseTransaction.expense_bank.$error" ng-if="formExpenseTransaction.expense_bank.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Vendor <small>*</small></label>
									<input type="text" id="expense_vendor" name="expense_vendor" placeholder="Vendor (optional)" class="form-control"/>
								</div>
								<div class="col-md-4">
									<label for="">Payee <small>*</small></label>
									<select id="expense_payee" name="expense_payee" class="form-control" ng-model="expense_payee" required>
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data['payee'] as $row_payee):?>
											<option value="<?=$row_payee['payee_name']?>"><?=$row_payee['payee_name']?></option>
										<?php endforeach;?>
									</select>
									<span ng-messages="formExpenseTransaction.expense_payee.$error" ng-if="formExpenseTransaction.expense_payee.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
								<div class="col-md-4">
									<label for="">Check Date <small>*</small></label>
									<input type="date" id="expense_check_date" name="expense_check_date" class="form-control" ng-model="expense_check_date" value="<?php echo date("Y-m-d");?>" required>
									<span ng-messages="formExpenseTransaction.expense_check_date.$error" ng-if="formExpenseTransaction.expense_check_date.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="InsertOrUpdateExpense()" ng-disabled="formExpenseTransaction.$invalid" id="btn-expense--transaction" class="btn bg-green">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="expense-remarks-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-eye mr-2"></i> &nbsp; UPDATE REMARKS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseRemarks" id="formExpenseRemarks" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="">Remarks <small>*</small></label>
									<input type="hidden" id="expense_details_id" name="expense_details_id" class="form-control"/>
									<select id="expense_remarks" name="expense_remarks" class="form-control" ng-model="expense_remarks" required>
										<option value="" disabled selected>Select your option</option>
										<option value="RELEASED">RELEASED</option>
										<option value="CANCELLED">CANCELLED</option>
									</select>
									<span ng-messages="formExpenseRemarks.expense_remarks.$error" ng-if="formExpenseRemarks.expense_remarks.$dirty">
										<strong ng-message="required" class="text-danger">This field is required.</strong>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" ng-disabled="formExpenseRemarks.$invalid" onclick="UpdateExpenseRemarks()" id="btn-expense--remarks" class="btn bg-green">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="expense-delete-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE TRANSACTION?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="formDeleteExpense" id="formDeleteExpense" method="POST" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
					<div class="modal-body">
						<input type="hidden" id="expense_delete_id" name="expense_delete_id" class="form-control"/>
						<p class="text-center">Are you sure do you want to delete this transaction?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="btn-delete--expense" class="btn bg-green" onclick="DeleteExpensesById(this.value)">Confirm <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	

	