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
		<button onclick="category_expense_modal()" id="btn-expense-category" class="btn bg-green mb-3"><i class="icon-plus3 mr-2"></i><b> ADD NEW CATEGORY</b></button>
		<div class="card">
			<table id="show-expense-category-table" class="table datatable-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['category'] as $row) { ?> 
						<tr>
							<td><?=$row['category_id'];?></td> 
							<td><?=$row['category_name'];?></td>
							<td style="text-align:center"><a onclick="view_expense_category('<?=$row['category_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="delete_expense_category('<?=$row['category_id']?>')" style="cursor:pointer" alt="Remove"><i class="icon-trash text-warning-800"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="category-expense-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-pencil7 mr-2"></i> &nbsp; ADD CATEGORY</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formExpenseCategory" id="formExpenseCategory" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
					<input type="hidden" id="expense_category_id" name="expense_category_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Category Name <small>*</small></label>
							<input type="text" id="expense_category_name" name="expense_category_name" placeholder="Category Name" class="form-control" ng-pattern ="/^[a-zA-Z\s]*$/" ng-model="expense_category_name" required>
							<span ng-messages="formExpenseCategory.expense_category_name.$error" ng-if="formExpenseCategory.expense_category_name.$dirty">
								<strong ng-message="pattern" class="text-danger">Please type alphabet only.</strong>
								<strong ng-message="required" class="text-danger">This field is required.</strong>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="InsertOrUpdateExpenseCategory()" ng-disabled="formExpenseCategory.$invalid" id="btn-expense--category" class="btn bg-green">Add Category <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="expense-delete-category-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE CATEGORY?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="formDeleteExpenseCategory" id="formDeleteExpenseCategory" method="POST" novalidate>
					<div class="modal-body">
						<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
						<input type="hidden" id="expense_category_delete_id" name="expense_category_delete_id" class="form-control"/>
						<p class="text-center">Are you sure do you want to delete this category?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="btn-delete-expense--category" class="btn bg-green" onclick="DeleteExpenseCategoryById(this.value)">Confirm <i class="icon-check2 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>