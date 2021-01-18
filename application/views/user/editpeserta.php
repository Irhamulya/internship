<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<!-- DataTables Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= $this->session->flashdata('message'); ?>
		</div>

		<div class="card-body">

			<form action="" method="post">

				<div class="modal-body">

					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap"
							   value="<?= $data['nama']; ?>">
					</div>

					<div class="form-group">
						<label for="divisi">Divisi</label>
						<select name="divisi" id="divisi" class="form-control">
							<option disabled="disabled" value="<?= $data['id_div']; ?>"><?= $data['divisi']; ?></option>
							<?php foreach ($divisi as $d): ?>
								<option value="<?= $data['id_div']; ?>">
									<?= $d['divisi']; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" rows="4" cols="50"
								  value=""><?= $data['alamat']; ?></textarea>
					</div>

					<div class="form-group">
						<label for="sekolah">Sekolah</label>
						<input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Sekolah"
							   value="<?= $data['sekolah']; ?>">
						<br>
						<a href="" class="btn btn-sm" style="background: #00CFE8; color: white;" target="_blank">Tambah Sekolah</a>
					</div>

					<div class="form-group">
						<label for="tanggal_mulai">Tanggal Mulai</label>
						<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
							   value="<?= $data['tanggal_mulai']; ?>">
					</div>

					<div class="form-group">
						<label for="tanggal_akhir">Tanggal Berakhir</label>
						<input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
							   value="<?= $data['tanggal_akhir']; ?>">
						<br/>
					</div>

					<div class="form-group row justify-content-end">
						<div class="col-sm-1">
							<br/>
							<button type="submit" class="btn"style="background: #00CFE8; color: white;" >Save</button>
						</div>
						<div class="col-sm-2">
							<br/>
							<button type="button" onClick="location.href='<?php echo base_url();?>user/peserta'" class="btn btn-secondary">Cancel</button>
						</div>
					</div>

				</div>

			</form>

		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Button trigger modal -->
