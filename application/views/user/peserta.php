<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4>Internship Table</h4>

			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= $this->session->flashdata('message'); ?>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th style="vertical-align: middle;">Nama</th>
						<th style="vertical-align: middle;">Email</th>
						<th style="vertical-align: middle;">Alamat</th>
						<th style="vertical-align: middle;">Sekolah</th>
						<th style="vertical-align: middle;">Divisi</th>
						<th style="vertical-align: middle;">Tanggal mulai</th>
						<th style="vertical-align: middle;">Tanggal akhir</th>
						<th style="vertical-align: middle;">Config</th>
						<th style="vertical-align: middle;">Status</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($peserta as $ps) : ?>
						<?php if ($user['role_id'] == 1): ?>
							<tr>

								<td><?php echo $ps["nama"]; ?></td>
								<td><?php echo $ps["email"]; ?></td>
								<td><?php echo $ps["alamat"]; ?></td>
								<td><?php echo $ps["sekolah"]; ?></td>
								<td><?php echo $ps["divisi"]; ?></td>
								<td><?php echo $ps["tanggal_mulai"]; ?></td>
								<td><?php echo $ps["tanggal_akhir"]; ?></td>
								<td>
									<a href="<?= base_url(); ?>user/editpeserta/<?= $ps["id"]; ?>" class="badge"
									   style=" color:white;  background-color:#FF8C00;"><i class="far fa-fw fa-edit"></i></a>
									<a href="<?= base_url(); ?>user/hapuspeserta/<?= $ps["id"]; ?>"
									   class="badge badge-danger" onclick="return confirm('Yakin?');"><i
												class="fas fa-fw fa-trash-alt"></i>
									</a>
								</td>
								<?php if ($ps["status"] == 0): ?>
									<td><?php echo("Magang akan segera berakhir"); ?></td>
								<?php elseif ($ps["status"] == 2): ?>
									<td>
										<?php echo("Peserta Active"); ?>
									</td>
								<?php else: ?>
									<td>
										<?php echo(""); ?>
									</td>
								<?php endif ?>
							</tr>
						<?php else: ?>
							<?php if ($ps["email"] == $user["email"]): ?>
								<tr>
									<td><?php echo $ps["nama"]; ?></td>
									<td><?php echo $ps["email"]; ?></td>
									<td><?php echo $ps["alamat"]; ?></td>
									<td><?php echo $ps["sekolah"]; ?></td>
									<td><?php echo $ps["divisi"]; ?></td>
									<td><?php echo $ps["tanggal_mulai"]; ?></td>
									<td><?php echo $ps["tanggal_akhir"]; ?></td>
									<td>
										<a href="<?= base_url(); ?>user/editpeserta/<?= $ps["id"]; ?>" class="badge"
										   style=" color:white;  background-color:#FF8C00;">Perbarui</a>
									</td>
								<?php if ($ps["status"] == 0): ?>
									<td><?php echo("Magang akan segera berakhir"); ?></td>
								<?php elseif ($ps["status"] == 2): ?>
									<td>
										<?php echo("Peserta Active"); ?>
									</td>
								<?php else: ?>
									<td>
										<?php echo(""); ?>
									</td>
								<?php endif ?>
								</tr>
							<?php endif ?>
						<?php endif ?>

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
