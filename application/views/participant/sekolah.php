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
						<th>Sekolah</th>
						<th>Alamat</th>
						<!-- <th>Config</th> -->
					</tr>
					</thead>
					<tbody>

					<?php foreach ($sekolah as $sk) : ?>

						<tr>
							<td><?php echo $sk["sekolah"]; ?></td>
							<td><?php echo $sk["alamat"]; ?></td>
							<!-- <td>
								<a href="<?= base_url(); ?>operational/editdivisi/<?= $sk["id"]; ?>" class="badge"
								   style=" color:white;  background-color:#FF8C00;"><i
											class="far fa-fw fa-edit"></i></a>
								<a href="<?= base_url(); ?>operational/hapusdivisi/<?= $sk["id"]; ?>"
								   class="badge badge-danger" onclick="return confirm('Yakin?');"><i
											class="fas fa-fw fa-trash-alt"></i>
								</a>
							</td> -->
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
				<h5 class="modal-title" id="MagangModalLabel">Add Sekolah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php echo form_open_multipart('participant/sekolah'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="sekolah">Sekolah</label>
					<input type="text" required class="form-control" id="sekolah" name="sekolah" placeholder="Sekolah">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="textarea" class="form-control" required id="alamat" name="alamat" placeholder="Alamat">
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
