<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h2 mb-4 text-lightdark "><?= $title; ?></h1>
	<hr>
	<div class="row">

		<!-- Card user/akun -->
		<div class="col-xl-3 col-md-2 mt-4 mb-2">
			<div class="card border-left-success bg-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-light text-uppercase mb-1">Users</div>
							<div class="col-auto">
								<div class="h5 mb-0 font-weight-bold text-light"><?= $huser; ?></div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-light"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Card jumlah peserta -->
		<div class="col-xl-3 col-md-2 mt-4 mb-2">
			<div class="card border-left-primary bg-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-light text-uppercase mb-1">Participants
							</div>
							<div class="col-auto">
								<div class="h5 mb-0 font-weight-bold text-light"><?= $jpeserta; ?></div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-handshake fa-2x text-light"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Card quota -->
		<div class="col-xl-3 col-md-2 mt-4 mb-2">
			<div class="card border-left-warning bg-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-light text-uppercase mb-1">Qouta Left
							</div>
							<div class="col-auto">
								<div class="h5 mb-0 font-weight-bold text-light"><?= $qouta; ?></div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-minus fa-2x text-light"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

