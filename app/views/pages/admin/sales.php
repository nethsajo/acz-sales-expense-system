<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Summary of Sales</span></h4>
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
		<button id="button_sales" class="btn bg-green mb-3" onclick="modal_add_sales()"><i class="icon-cash mr-2"></i><b> ADD SALES</b></button>
		<div class="card">
			<table id="show-sales-table" class="table datatable-button-print-basic">
				<thead>
					<tr>
						<th>Try</th>
						<th>Try</th>
						<th>Try</th>
						<th>Try</th>
						<th>Try</th>
						<th>Try</th>
					</tr>
				</thead>
				<tbody id="show_sales_table" ><!--content will go here--></tbody>
			</table>
		</div>
	</div>
	<div id="modal_sales" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title"><i class="icon-people mr-2"></i> &nbsp;ADD SALES DETAILS</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formAddSales" id="formAddSales" autocomplete="off" class="nobottommargin" data-parsley-validate="true">
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">PO Number <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">SO Number <small>*</small></label>
									<input type="text" id="sales_so" name="sales_so" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">DR Number <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">SI Number <small>*</small></label>
									<input type="text" id="sales_si" name="sales_si" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Company <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Contact Person <small>*</small></label>
									<input type="text" id="sales_so" name="sales_so" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Particulars <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Media <small>*</small></label>
									<input type="text" id="sales_si" name="sales_si" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Width <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Height <small>*</small></label>
									<input type="text" id="sales_so" name="sales_so" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Unit <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Total Area <small>*</small></label>
									<input type="text" readonly id="sales_si" name="sales_si" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Price / Unit <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Sub Total<small>*</small></label>
									<input type="text" readonly id="sales_so" name="sales_so" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Quantity <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Total<small>*</small></label>
									<input type="text" readonly id="sales_si" name="sales_si" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">VAT <small>*</small></label>
									<input type="text" id="sales_po" name="sales_po" placeholder="Surname" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Amount Due <small>*</small></label>
									<input type="text" readonly id="sales_so" name="sales_so" placeholder="First Name" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-required="true" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Discount <small>*</small></label>
									<input type="text" id="sales_dr" name="sales_dr" placeholder="Middle Name (optional)" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
								<div class="col-md-3">
									<label for="">Net Amount Due <small>*</small></label>
									<input type="text" readonly id="sales_si" name="sales_si" class="form-control" data-parsley-pattern="^(?:[A-Za-z]+[ -])*[A-Za-z]+$" data-parsley-trigger="keyup"/>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="data-submit--sales" class="btn bg-green">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>  