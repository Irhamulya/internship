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
			   data-target="#MagangModal">Add data</a>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th style="vertical-align: middle;">Nama</th>
						<th style="vertical-align: middle;">Email</th>
					</tr>
					</thead>
					<tbody>

					<?php foreach ($divisi as $d) : ?>

						<tr>
							<td><?php echo $d["divisi"]; ?></td>
							<td><?php echo $d["qta"]; ?></td>
							<td>
								<a href="<?= base_url(); ?>user/editpeserta/<?= $d["id"]; ?>" class="badge"
								   style=" color:white;  background-color:#FF8C00;"><i
											class="far fa-fw fa-edit"></i></a>
								<a href="<?= base_url(); ?>user/hapuspeserta/<?= $d["id"]; ?>"
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
