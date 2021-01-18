<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?= form_error('menu', '<div class="alert alert-danger" 
				      role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn mb-2" style="background: #00CFE8; color: white;" data-toggle="modal"
			   data-target="#RoleModal">Add Role</a>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Role</th>
						<th>Config</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($role as $r) : ?>
						<tr>

							<td><?php echo $r["role"]; ?></td>
							<td>
								<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
								   class="badge badge-warning"><i class="fas fa-fw fa-key"></i></a>
								<a href="" class="badge" data-toggle="modal" data-target="#EditRoleModal"
								   style="color:white; background-color:#5CE624;">
									<i class="far fa-fw fa-edit"></i>
								</a>
								<a href="" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
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
<!-- Button trigger modal -->

<!-- Add Modal -->
<div class="modal fade" id="RoleModal" tabindex="-1" role="dialog" aria-labelledby="RoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="RoleModalLabel">Add new Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/role') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Role Name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn"style="background: #00CFE8;">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="EditRoleModal" tabindex="-1" role="dialog" aria-labelledby="EditRoleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EditRoleModalLabel">Edit Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn"style="background: #00CFE8;">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
