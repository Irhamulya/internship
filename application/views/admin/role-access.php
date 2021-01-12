<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<?= $this->session->flashdata('message'); ?>
			<h5>Role : <?= $role['role']; ?></h5>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Menu</th>
						<th>Access</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($menu as $m) : ?>
						<tr>
							<td><?php echo $m["menu"]; ?></td>
							<td>
								<div class="form-check">
									<input class="form-check-input"
										   type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?=
									$role['id']; ?>" data-menu="<?= $m['id']; ?>">
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>


				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
