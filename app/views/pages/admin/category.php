<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expense</span> - Manage Category</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Expense</span>
					<span class="breadcrumb-item active">Category</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button id="button_expense_category" class="btn bg-green mb-3" onclick="modal_expense_category()"><i class="icon-cash mr-2"></i><b> ADD NEW CATEGORY</b></button>
		<div class="card">
			<table id="show-expense-category-table" class="table datatable-basic">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody id="show_expense_category_table" ><!--content will go here--></tbody>
			</table>
		</div>
	</div>

	<div id="modal_expense_category" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-pencil7 mr-2"></i> &nbsp; ADD CATEGORY</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseCategory" id="formExpenseCategory" autocomplete="off" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Category Name <small>*</small></label>
							<input type="hidden" id="expense_category_id" name="expense_category_id" class="form-control" />
							<input type="text" id="expense_category_name" name="expense_category_name" placeholder="Category Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-expense--category" class="btn bg-green">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="modal_expense_delete_category" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE CATEGORY?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="employee_delete_id" name="employee_delete_id" class="form-control"/>
					<p class="text-center">Are you sure do you want to delete this category?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" id="data-delete-expense--category" class="btn bg-green" onclick="delete_expense_category_by_id(this.value)">Confirm</button>
				</div>
			</div>
		</div>
	</div>