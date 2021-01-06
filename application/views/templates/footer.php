<style>
	.ftr {
		position: fixed;
		left: 90px;
		bottom: 30px;
		width: 100%;

	}

	#don {
		background-color: #4169E1;
		color: #ffffff;
	}
</style>
<!-- Footer -->
<footer class="sticky-footer bg-light">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Irham Ulya <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn" id="don" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset'); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('asset'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('asset'); ?>/js/demo/datatables-demo.js"></script>


<script src="<?= base_url('asset/'); ?>js/bootstrap-datepicker.js"></script>


<script>


	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);

	});

	var dt = new Date();
	dt.setDate(dt.getDate() + 8);
	var dayaf = dt.toISOString().split('T')[0];

	document.getElementsByName("date_in")[0].setAttribute('min', dayaf);


	var de = $('#tanggal_mulai').val();
	de.setDate(de.getDate() + 8);
	var dayen = de.toISOString().split('T')[0];

	document.getElementsByName("date_out")[0].setAttribute('min', dayen);


	$('.form-check-input').on('click', function () {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function () {
				document.location.href = "<?=base_url('admin/roleaccess/'); ?>" + roleId;
			}
		});

	});

</script>

</body>

</html>
