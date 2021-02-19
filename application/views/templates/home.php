<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h2 mb-4 text-lightdark "><?= $title; ?></h1>
	<hr>
			<?= $this->session->flashdata('message'); ?>
	
	<div class="row">

	<div class="container-fluid">

          <div class="row">

            <!-- Card user/akun -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    	<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
						<div class="col-auto">
							<div class="h5 mb-0 font-weight-bold text-info"><?= $huser; ?></div>
						</div>
                    </div>
                    <div class="col-auto">
							<i class="fas fa-users fa-2x text-info"></i>
					</div>
                  </div>
                </div>
              </div>
            </div>

			<!-- Card jumlah peserta -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2" style="color:#46D56E ;">
					<div class="text-xs font-weight-bold text-uppercase mb-1">Participants
					</div>
						<div class="col-auto" style="color:#46D56E ;">
							<div class="h5 mb-0 font-weight-bold"><?= $jpeserta; ?></div>
						</div>
					</div>
					<div class="col-auto" style="color:#46D56E ;">
						<i class="fas fa-handshake fa-2x "></i>
					</div>
                  </div>
                </div>
              </div>
            </div>

			<!-- Card quota -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2" style="color: #F6C23E">
						<div class="text-xs font-weight-bold  text-uppercase mb-1">Qouta Left
						</div>
						<div class="col-auto" style="color: #F6C23E">
							<div class="h5 mb-0 font-weight-bold "><?= $qouta; ?></div>
						</div>
					</div>
					<div class="col-auto" style="color: #F6C23E">
						<i class="fas fa-user-minus fa-2x "></i>
					</div>
                  </div>
                </div>
              </div>
            </div>
           </div>
          		

       	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        	<h1 class="h3 mb-0 text-gray-800">Divisi</h1>
      	</div>	
          <div class="row">

				<?php foreach ($divisi as $div) : ?>
					<!-- Card quota -->
		            <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-primary shadow h-100 py-2" style="background:<?= $div["warna"]; ?>" >
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2" style="color: #FFF">
								<div class="text-xs font-weight-bold text-uppercase mb-1"><?= $div["divisi"]; ?>
								</div>
								<div class="col-auto" style="color: #FFF">
									<div class="h5 mb-0 font-weight-bold "><?= $div["qta"]; ?></div>
								</div>
							</div>
							<div class="col-auto" style="color: #FFF">
								<i class="fas fa-user-minus fa-2x "></i>
							</div>
		                  </div>
		                </div>
		              </div>
		            </div>
				<?php endforeach; ?>
			
			</div>
  		</div>
  	</div>
	<!-- /.container-fluid -->

<!-- End of Main Content -->

