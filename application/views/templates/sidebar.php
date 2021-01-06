<style>

	.active {
		color: #4CAF50;
	}
</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-white accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-building"></i>
			<!-- <img src="<?= base_url('asset/img/BD_logo.png'); ?>"width="90%"> -->
		</div>
		<div style="color: white;" class="sidebar-brand-text mx-1">Pt. Pacifa Raya Technology</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider " style="background-color:#fff	">


	<!-- Query Menu -->
	<?php
	$role_id = $this->session->userdata('role_id');
	$queryMenu = "SELECT user_menu.id ,menu 
                          FROM user_menu JOIN user_access 
                          ON user_menu.id = user_access.menu_id 
                          WHERE user_access.role_id = $role_id
                          ORDER BY user_access.menu_id ASC ";

	$menu = $this->db->query($queryMenu)->result_array();
	?>

	<!-- Looping -->
	<?php foreach ($menu as $m): ?>
		<div class="sidebar-heading" style="color:#fff;">
			<?= $m['menu']; ?>      </div>


		<!-- sub menu as menu -->
		<?php
		$menuid = $m['id'];
		$querySm = "SELECT * 
                          FROM user_sub_menu JOIN user_menu 
                          ON user_sub_menu.menu_id = user_menu.id 
                          WHERE user_sub_menu.menu_id = $menuid
                          AND user_sub_menu.is_active = 1";

		$submenu = $this->db->query($querySm)->result_array();
		?>
		<?php foreach ($submenu as $sm): ?>
			<?php if ($title == $sm['title']): ?>
				<li class="nav-item active">
			<?php else : ?>
				<li class="nav-item">
			<?php endif; ?>
			<a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
				<i class="<?= $sm['icon'] ?> " style="color:#fff;"></i>
				<span style="color:#fff;"><?= $sm['title'] ?></span></a>
			</li>
		<?php endforeach; ?>

		<hr class="sidebar-divider mt-3" style="background-color:#fff;">

	<?php endforeach; ?>


	<!-- Nav Item - logout -->

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout'); ?>">
			<i class="fas fa-fw fa-sign-out-alt" style="color:#fff;"></i>
			<span style="color:#fff;">logout </span></a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block" style="background-color:#fff;">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle" style="background-color:#fff;"></button>
	</div>

</ul>
<!-- End of Sidebar -->
