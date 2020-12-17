<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Manage Banks</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Expense</span>
					<span class="breadcrumb-item active">Banks</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button id="button_banks" class="btn bg-green mb-3" onclick="modal_banks()"><i class="icon-cash mr-2"></i><b> ADD NEW BANK</b></button>
		<div class="card">
			<table id="show-banks-table" class="table datatable-basic">
				<thead>
					<tr>
						<th>#</th>
						<th>Bank Name</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody id="show_banks_table" ><!--content will go here--></tbody>
			</table>
		</div>
	</div>

	<div id="modal_banks" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-pencil7 mr-2"></i> &nbsp; ADD BANK</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formBanks" id="formBanks" autocomplete="off" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Bank Name <small>*</small></label>
							<input type="hidden" id="bank_id" name="bank_id" class="form-control" />
							<input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data--bank" class="btn bg-green">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="modal_delete_bank" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE BANK?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="employee_delete_id" name="employee_delete_id" class="form-control"/>
					<p class="text-center">Are you sure do you want to delete this bank?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" id="data-delete--bank" class="btn bg-green" onclick="delete_bank_by_id(this.value)">Confirm</button>
				</div>
			</div>
		</div>
	</div>