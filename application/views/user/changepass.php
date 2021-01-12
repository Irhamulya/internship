<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('user/changepass'); ?>" class="" method="post">
				<div class="form-group">
					<label for="current_pass">Current Password</label>
					<input type="password" class="form-control" id="current_pass" name="current_pass">
					<?= form_error('current_pass', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_pass">New Password</label>
					<input type="password" class="form-control" id="new_pass" name="new_pass">
					<?= form_error('new_pass', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_pass2">Confirm New Password</label>
					<input type="password" class="form-control" id="new_pass2" name="new_pass2">
					<?= form_error('new_pass2', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Change Password</button>
				</div>
			</form>


		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

