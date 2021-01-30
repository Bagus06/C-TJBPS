<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<li class="nav-item">
	<a href="<?php echo base_url('dashboard/main_page'); ?>" class="nav-link active">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>
			Dashboard
		</p>
	</a>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-user"></i>
		<p>
			User
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('user/main_page'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>main page</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('user/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Add</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('user/role'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>Role</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-clipboard-list"></i>
		<p>
			Account mutation
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('account_mutation/main_page'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>mutation records</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('account_mutation/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>added mutations</p>
			</a>
		</li>
	</ul>
</li>
<li class="nav-item has-treeview">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-tools"></i>
		<p>
			Contet setting
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="<?php echo base_url('web_page/edit'); ?>" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>web page</p>
			</a>
		</li>
	</ul>
</li>