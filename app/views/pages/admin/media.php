<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Media</span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Control Panel</span>
					<span class="breadcrumb-item active">Media</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<button onclick="media_modal()" class="btn bg-green mb-3"><i class="icon-plus3 mr-2"></i><b> ADD NEW MEDIA</b></button>
		<div class="card">
			<table id="show-media-table" class="table datatable-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Media</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['media'] as $row) { ?> 
						<tr>
							<td><?=$row['media_id'];?></td> 
							<td><?=$row['media_name'];?></td>
							<td style="text-align:center"><a onclick="view_media('<?=$row['media_id']?>')" style="cursor:pointer" alt="Edit"><i class="icon-pencil text-info-800"></i></a></td>
							<td style="text-align:center"><a onclick="delete_media('<?=$row['media_id']?>')" style="cursor:pointer" alt="Remove"><i class="icon-trash text-warning-800"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="media-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-pencil7 mr-2"></i> &nbsp; ADD MEDIA</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" name="formMedia" id="formMedia" novalidate>
					<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
					<input type="hidden" id="media_id" name="media_id" class="form-control">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Media <small>*</small></label>
							<input type="text" id="media_name" name="media_name" placeholder="Media" class="form-control" ng-model="media_name" required>
							<span ng-messages="formMedia.media_name.$error" ng-if="formMedia.media_name.$dirty">
								<strong ng-message="required" class="text-danger">This field is required.</strong>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" onclick="InsertOrUpdateMedia()" ng-disabled="formMedia.$invalid" id="btn-media" class="btn bg-green">Add Media <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="media-delete-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-green-600">
					<h5 class="modal-title" id="modal-title"><i class="icon-trash mr-2"></i> &nbsp; DELETE MEDIA?</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="formDeleteMedia" id="formDeleteMedia" method="POST" novalidate>
					<div class="modal-body">
						<input type="hidden" id="token" name="token" value="<?=$data['token']?>'" class="form-control">
						<input type="hidden" id="media_delete_id" name="bank_delete_id" class="form-control"/>
						<p class="text-center">Are you sure do you want to delete this media?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="btn-delete--media" class="btn bg-green" onclick="DeleteMediaById(this.value)">Confirm <i class="icon-check2 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>