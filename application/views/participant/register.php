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

			<a href="" class="btn mb-2" style="background: #00CFE8; color: white;" data-toggle="modal"
			   data-target="#MagangModal">Add data</a>

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
								<?php if ($ps["status"] == 0): ?>
									<td>
										<a href="<?= base_url(); ?>participant/pindahpeserta/<?= $ps["id"]; ?>"
										   class="badge badge-success">Accept</a>
										<a href="<?= base_url(); ?>Participant/tolakpeserta/<?= $ps["id"]; ?>"
										   class="badge badge-danger">Decline</a>
									</td>
								<?php else: ?>
									<td>
										<?php echo("Ditolak"); ?>
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
									<?php if ($ps["status"] == 0): ?>
										<td><?php echo("Menunggu persetujuan"); ?></td>
									<?php elseif ($ps["status"] == 2): ?>
										<td>
											<?php echo("Ditolak"); ?>
										</td>
									<?php else: ?>
										<td>
											<?php echo("Diterima"); ?>
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

<!-- Modal -->

<div class="modal fade" id="MagangModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MagangModalLabel">Add Participant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php echo form_open_multipart('participant/register'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" required class="form-control" id="nama" name="nama" placeholder="Nama lengkap"
						   value="<?= $user['nama'] ?>">
				</div>
				<div class="form-group">
					<label for="nama">Email</label>
					<input type="text" readonly="" class="form-control" id="email" name="email"
						   placeholder="Nama lengkap" value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" id="alamat" required class="form-control" placeholder="Alamat" rows="4"
							  cols="50"></textarea>
				</div>
				<div class="form-group">
					<label for="sekolah">Sekolah</label>
					<input type="text" class="form-control" required id="sekolah" name="sekolah" placeholder="Sekolah">
				</div>
				<div class="form-group">
					<label for="surat_pkl">Surat permohonan PKL</label>
					<div class="custom-file">
						<input type="file" required class="custom-file-input" id="srt_pkl" name="srt_pkl">
						<label class="custom-file-label" for="srt_pkl">Choose file</label>
					</div>
				</div>
				<div class="form-group">
					<label for="divisi">Divisi</label>
					<select name="divisi" id="divisi" class="form-control" required>
						<option value="">Select Divisi</option>
						<?php foreach ($divisi as $d): ?>
							<option value="<?= $d['id']; ?>"><?= $d['divisi']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="tanggal_mulai">Tanggal Mulai</label>
					<input class="form-control" type="date" id="tanggal_mulai" name="tanggal_mulai" required>
				</div>	
				<div class="form-group">
					<label for="tanggal_akhir">Tanggal Berakhir</label>
					<input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
				</div>

			</div>

			<div class="modal-footer">
				<button type="submit" class="btn" style="background: #00CFE8; color: white;">Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>
