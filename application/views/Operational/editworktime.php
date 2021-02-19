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
						<label for="work_in">Jam masuk</label>
						<input type="time" class="form-control" id="work_in" name="work_in" placeholder="Jam masuk"value="<?= $tampil['work_in']; ?>">
					</div>
					<div class="form-group">
						<label for="work_out">Jam Keluar</label>
						<input type="time" class="form-control" id="work_out" name="work_out" placeholder="Jam Keluar" value="<?= $tampil['work_out']; ?>">
						<br>
					</div>
					<div class="form-group">
						<label for="description">Keterangan</label>
						<input type="text" class="form-control" id="description" name="description" placeholder="Keterangan" value="<?= $tampil['description'];?>">
					</div>

					<div class="form-group row justify-content-end">
						<div class="col-sm-1">
							<br/>
							<button type="submit" class="btn" style="background: #00CFE8; color: white;">Save</button>
						</div>
						<div class="col-sm-2">
							<br/>
							<button type="button" onClick="location.href='<?php echo base_url();?>operational/worktime'" class="btn btn-secondary">Cancel</button>
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
