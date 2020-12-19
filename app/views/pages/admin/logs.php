<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Employee</span> - Logs</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
					<a href="<?=URL.$controller?>/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<span class="breadcrumb-item">Manage Account</span>
					<span class="breadcrumb-item active">Logs</span>
				</div>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="card">
			<table id="show-logs-table" class="table datatable-responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Content</th>
						<th>Date and Time</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['logs'] as $row) { ?>
						<tr>
							<td><?=$row['employee_surname'];?>, <?=$row['employee_firstname'];?></td>
							<td><?=$row['logs_content'];?></td>
							<td><?=date('M d, Y g:i A',strtotime($row['created_at']))?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>