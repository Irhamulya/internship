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

			 <form action="/absen" method="post">
                            <table class="table table-responsive">
                               <?php foreach ($peserta as $p) : ?>
                               	<?php if ($p['email'] ==$user['email'] ): ?>
                                <tr>
                                    <td>
                                        <input type="text" placeholder="Keterangan..." name="note" class="form-control" >
                                    </td>
                                	<td>
                                		<input type="text" name="tanggal_mulai2" id="tanggal_mulai2"  value="<?= $p['tanggal_mulai']; ?>" readonly class="form-control">
                                	</td>
                                	<?php if (date("Y-m-d")<$p['tanggal_mulai']){?>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnIn" id="btnIn" disabled="" value="btnIn">Absen Masuk
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnOut" id="btnOut" disabled=""	 value="btnOut">Absen Keluar
                                        </button>
                                    </td>
                                    <?php }else{?>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnIn" id="btnIn"  value="btnIn">Absen Masuk
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnOut" id="btnOut" value="btnOut">Absen Keluar
                                        </button>
                                    </td>
                                	<?php } ?>
                                </tr>
                            <?php endif ; ?>
                            <?php endforeach ; ?>
                            </table>
                        </form>

		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Terlambat</th>        
                        <th>Keterangan</th>
						
					</tr>
					</thead>
					<tbody>

					<?php foreach ($absensi as $ab) : ?>

						<tr>
							<td><?php echo $ab["date"]; ?></td>
                            <td><?php echo $ab["time_in"]; ?></td>
                            <td><?php echo $ab["time_out"]; ?></td>
                            <td><?php echo $ab["overdue"]; ?></td>
                            <td><?php echo $ab["note"]; ?></td>
			
						</tr>

					<?php endforeach; ?>

					</tbody>

				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

