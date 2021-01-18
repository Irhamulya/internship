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

			<a href="" class="btn mb-2" style=" color:white;  background: #00CFE8;" data-toggle="modal"
			   data-target="#MagangModal">Add data</a>

		</div>
		<div class="card-body">

			<div class="table-responsive" >
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
					<thead>
					<tr>
						<th>Division</th>
						<th>Kuota</th>
						<th>Config</th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($divisi as $d) : ?>

						<tr>
							<td><?php echo $d["divisi"]; ?></td>
							<td><?php echo $d["qta"]; ?></td>
							<td>
								<a href="<?= base_url(); ?>admin/editdivisi/<?= $d["id"]; ?>" class="badge"
								   style=" color:white;  background-color:#FF8C00;"><i
											class="far fa-fw fa-edit"></i></a>
								<a href="<?= base_url(); ?>admin/hapusdivisi/<?= $d["id"]; ?>"
								   class="badge badge-danger" onclick="return confirm('Yakin?');"><i
											class="fas fa-fw fa-trash-alt"></i>
								</a>
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

<div class="modal fade" id="MagangModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MagangModalLabel">Add Division</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php echo form_open_multipart('admin/divisi'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="divisi">Division</label>
					<input type="text" required class="form-control" id="divisi" name="divisi" placeholder="Division">
				</div>
				<div class="form-group">
					<label for="kouta">Kouta</label>
					<input type="number" class="form-control" required id="kouta" name="kouta" placeholder="Kouta">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-info">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>
