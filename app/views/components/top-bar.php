<div class="navbar navbar-expand-md navbar-dark bg-green navbar-static">
	<div class="navbar-brand">
		<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
		<a href="<?=URL.$controller?>/dashboard" class="d-inline-block">
			<img src="<?=ASSETS?>images/acz_default.png" alt="ACZ Digital and Printing Services">
		</a>
	</div>
	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="navbar-nav-link d-none d-md-block">
					<i class="icon-search4"></i>
				</a>
			</li>
		</ul>
		<?php $controller = $data['user']->role_id == 1 ? 'admin' : ($data['user']->role_id == 2 ? 'employee' : null);?>
		<ul class="navbar-nav ml-md-auto">
			<li class="nav-item">
				<a href="<?=URL.$controller?>/logout" class="navbar-nav-link">
					<i class="icon-switch2"></i>
					<span class="d-md-none ml-2">Logout</span>
				</a>
			</li>
		</ul>
	</div>
</div>