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

				<div class="modal-body modal-md ">

					<div class="form-group">
						<label for="menu">Menu</label>
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu"
							   value="<?= $tampil['menu']; ?>">
						<br>
					</div>

					<div class="form-group row justify-content-end">
						<div class="col-sm-1">
							<br/>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						<div class="col-sm-2">
							<br/>
							<button type="button" class="btn btn-secondary">Cancel</button>
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
