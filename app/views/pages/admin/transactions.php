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
		<button id="button_expense_transaction" class="btn bg-green mb-3" onclick="modal_expense_transaction()"><i class="icon-file-text mr-2"></i><b> ADD NEW EXPENSE</b></button>
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
				<tbody id="show_expense_transactions_table" ><!--content will go here--></tbody>
			</table>
		</div>
	</div>

	<div id="modal_expense_transaction" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-eye mr-2"></i> &nbsp; ADD EXPENSE DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseTransaction" id="formExpenseTransaction" autocomplete="off" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<input type="hidden" id="expense_id" name="expense_id" class="form-control" />
								<div class="col-md-4">
									<label for="">SI No. <small>*</small></label>
									<input type="text" id="expense_si" name="expense_si" placeholder="Sales Invoice Number" class="form-control" data-parsley-required="true"/>
								</div>
								<div class="col-md-4">
									<label for="">OR No. <small>*</small></label>
									<input type="text" id="expense_or" name="expense_or" placeholder="Official Receipt Number" class="form-control" data-parsley-required="true"/>
								</div>
								<div class="col-md-4">
									<label for="">TIN <small>*</small></label>
									<input type="text" id="expense_tin" name="expense_tin" placeholder="TIN" class="form-control" data-parsley-required="true"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="">Category <small>*</small></label>
									<select id="expense_category" name="expense_category" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data->get_expense_category() as $row_category):?>
											<option value="<?=$row_category['category_name']?>"><?=$row_category['category_name']?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-md-4">
									<label for="">Particular <small>*</small></label>
									<input type="text" id="expense_particular" name="expense_particular" placeholder="Particular" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-2">
									<label for="">Quantity <small>*</small></label>
									<input type="text" id="expense_qty" name="expense_qty" placeholder="Quantity" class="form-control" data-parsley-type="number" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-2">
									<label for="">Unit <small>*</small></label>
									<select id="expense_unit" name="expense_unit" class="form-control" data-parsley-required="true">
										<?php foreach ($data->get_units() as $row_units):?>
											<option value="<?=$row_units['units_name']?>"><?=$row_units['units_name']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Price / Unit <small>*</small></label>
									<input type="text" id="expense_price_unit" name="expense_price_unit" placeholder="Price / Unit" class="form-control" data-parsley-type="number" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Discount </label>
									<input type="text" id="expense_discount" name="expense_discount" placeholder="Discount (optional)" data-parsley-type="digits" class="form-control"/>
								</div>
								<div class="col-md-2">
									<label for="">VAT </label>
									<input type="text" id="expense_vat" name="expense_vat" placeholder="VAT" data-parsley-type="number" class="form-control" data-parsley-type="number"/>
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
									<input type="text" id="expense_cvno" name="expense_cvno" placeholder="Check Voucher Number" class="form-control" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-4">
									<label for="">Check Number <small>*</small></label>
									<input type="text" id="expense_cn" name="expense_cn" placeholder="Check Number" class="form-control" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-4">
									<label for="">Bank <small>*</small></label>
									<select id="expense_bank" name="expense_bank" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data->get_banks() as $row_banks):?>
											<option value="<?=$row_banks['bank_name']?>"><?=$row_banks['bank_name']?></option>
										<?php endforeach;?>
									</select>
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
									<select id="expense_payee" name="expense_payee" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($data->get_expense_payee() as $row_payee):?>
											<option value="<?=$row_payee['payee_name']?>"><?=$row_payee['payee_name']?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-md-4">
									<label for="">Check Date <small>*</small></label>
									<input type="date" id="expense_check_date" name="expense_check_date" value="<?php echo date("Y-m-d");?>" class="form-control" data-parsley-required="true">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-expense--transaction" class="btn bg-green">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal_expense_remarks" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-eye mr-2"></i> &nbsp; UPDATE REMARKS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseRemarks" id="formExpenseRemarks" autocomplete="off" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="">Remarks <small>*</small></label>
									<input type="hidden" id="expense_details_id" name="expense_details_id" class="form-control"/>
									<select id="expense_remarks" name="expense_remarks" class="form-control" data-parsley-required="true">
										<option value="" disabled selected>Select your option</option>
										<option value="RELEASED">RELEASED</option>
										<option value="CANCELLED">CANCELLED</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-remarks--expense" class="btn bg-green">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="modal_delete_transaction" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE TRANSACTION?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="expense_delete_id" name="expense_delete_id" class="form-control"/>
					<p class="text-center">Are you sure do you want to delete this transaction?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" id="data-delete--transaction" class="btn bg-green" onclick="delete_expense_transaction_by_id(this.value)">Confirm</button>
				</div>
			</div>
		</div>
	</div>