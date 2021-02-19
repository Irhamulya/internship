<!-- <BASEFONT></BASEFONT>gin Page Content -->
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
						<label for="title">Sub Menu</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu"
							   value="<?= $tampil['title']; ?>">
					</div>

					<div class="form-group">
						<label for="menu">Divisi</label>
						<select name="menu" id="menu" class="form-control">
							<?php foreach ($menu as $m): ?>
								<option value="<?= $tampil['menu_id']==$m['id']?$m['id']:null; ?>" <?=$tampil['menu_id']==$m['id']?"selected":null; ?>><?=$m['menu'];?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="url">Sub menu url</label>
						<input type="text" class="form-control" id="url" name="url" value="<?= $tampil['url']; ?>" placeholder="Submenu Url">
					</div>

					<div class="form-group">
						<label for="icon">Sub menu icon</label>

						<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $tampil['icon']; ?>">
					</div>

					<div class="form-group">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" value="<?= $tampil['is_active']; ?>" name="is_active2" id="is_active2">
							<label class="form-check-label" for="">Active?</label>
						</div>
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
