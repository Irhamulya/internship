<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn mb-2" style=" color:white;  background-color:#4169E1;" data-toggle="modal"
			   data-target="#SubMenuModal">Add item</a>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Title</th>
						<th>Menu</th>
						<th>Url</th>
						<th>Icon</th>
						<th>Active</th>
						<th>Config</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($submenu as $sm) : ?>
						<tr>

							<td><?php echo $sm["title"]; ?></td>
							<td><?php echo $sm["menu"]; ?></td>
							<td><?php echo $sm["url"]; ?></td>
							<td><?php echo $sm["icon"]; ?></td>
							<td><?php echo $sm["is_active"]; ?></td>
							<td>
								<a href="" class="badge" style=" color:white;  background-color:#FF8C00;"><i
											class="far fa-fw fa-edit"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="SubMenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="SubMenuModalLabel">Add new Submenu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('menu/submenu') ?>" method="post">

				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">Select Menu</option>
							<?php foreach ($menu as $m): ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active"
								   checked>
							<label class="form-check-label" for="">Active?</label>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
