</head>
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-10 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-1">
					<!-- Nested Row within Card Body -->

					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login">
							<img src="<?= base_url('asset/img/login') ?>/722.jpg" style="width: 105%; " alt="">
						</div>
						<div class="col-lg-6 ">
							<div class="col">
								<div class="text-right ml-2 mt-2 ">
									<a href="" data-toggle="modal"data-target="#modalkun">
										<h5><i class="fas fa-info-circle"></i></h5>
									</a>
								</div>
							</div>
							<div class="p-5">
								<div class="text-center mb-5">
									<img src="<?= base_url('asset/img') ?>/BD_logo.jpg" style="width: 220px; position: relative;top: 20px;" alt="">
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user " method="post" action="<?= base_url('auth') ?>">
									<div class="form-group pt-1 mb-2">
										<input type="text" class="form-control form-control-user" id="email"
											   name="email" placeholder="Enter Email Address..."
											   value="<?= set_value('email'); ?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group pt-1 mb-6">
										<input type="password" class="form-control form-control-user" id="password"
											   name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group pt-1">
										<button type="submit" class="btn btn btn-user btn-block"
												style="background-color:#4169E1; color: white;">
											Login
										</button>
									</div>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth/regist') ?>"><h6>Create an Account !
											!</h6></a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
	<!-- Button trigger modal -->

	<!-- Modal untuk kouta -->
	<div class="modal fade mt-5" id="modalkun" tabindex="-1" role="dialog" aria-labelledby="modalkun"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: royalblue; color: white;">
					<h5 class="modal-title" id="modalkun">Info</h5>
					<button type="button" class="close" data-dismiss="modal" style="color: white;" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h2 style="text-align: center;"><b>Bandung Design</b></h2>
					<h5><b>Introduction</b></h5>
					<p>This website was create to simplify the interns for their internship programs on Pacifa Raya
						Technology</p>
					<h5><b>Quota</b></h5>
					<table>
						<tr>
							<?php foreach ($divisi as $ps) : ?>
								<td>
									<div class="col-xl-12 col-md-3 mb-4">
										<div class="card border-left-info shadow h-100 py-2"
											 style="background:<?= $ps["warna"]; ?> ;">
											<div class="card-body">
												<div class="row no-gutters align-items-center">
													<div class="col mr-2">
														<div class="text-xs font-weight-bold text-light text-uppercase mb-1"><?= $ps["divisi"]; ?></div>
														<div class="col-auto">
															<div class="h5 mb-0 font-weight-bold text-light"><?= $ps["qta"]; ?>
																LEFT !
															</div>
														</div>
													</div>
													<div class="col-auto">
														<i class="fas fa-user fa-2x text-gray-300"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</td>
							<?php endforeach; ?>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>Asset/jquery.js"></script>
	<script>

		$(document).ready(function () {
			$(window).on('load', function () {
				$('#modalkun').modal('show');
			});
		});
	</script>
