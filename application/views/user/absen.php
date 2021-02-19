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

             <form action="/absen" method="">
                            <table class="table table-responsive">
                               <?php foreach ($peserta as $p) : ?>
                               <?php foreach ($jamkerja as $j) : ?>
                                <?php if ($p['email'] ==$user['email'] ): ?>
                                <tr>
                                    <th><label for="Keterangan">NOTE</label></th>
                                    <th class="text-center"><label for="Absen_Masuk">Absen masuk</label></th>
                                    <th class="text-center"><label for="Absen_Keluar">Absen keluar</labels></th>
                                    <th><label for="jamkerja">Jam Masuk kerja</label></th>
                                    <th><label for="mulai pkl">Tanggal mulai pkl</label></th>
                                </tr>
                                <tr>

                                    <td>
                                        <input type="text" class="form-control" id="note" name="note" placeholder="Keterangan.." value="">
                                    </td>
                                    
                                <?php if (date("Y-m-d")<$p['tanggal_mulai']){?>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnIn" id="btnIn" disabled="" value="btnIn">Absen Masuk
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-flat" style="background: #00CFE8; color: white;" name="btnOut" id="btnOut" disabled=""  value="btnOut">Absen Keluar
                                        </button>
                                    </td>
                                <?php }elseif (date("Y-m-d")>=$p['tanggal_mulai']){?>
                                    <td>
                                        <a href="<?= base_url(); ?>user/absenmasuk"
                                           class="btn btn-flat" style="background: #00CFE8; color: white;">Absen Masuk
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url(); ?>user/absenkeluar"
                                           class="btn btn-flat" style="background: #00CFE8; color: white;">Absen Keluar
                                        </a>
                                    </td>
                                <?php } ?>
                                    <td>
                                        <input type="text" name="jamkerja" id="jamkerja"  value="<?= $j['work_in']; ?>" readonly class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="tanggal_mulai2" id="tanggal_mulai2"  value="<?= $p['tanggal_mulai']; ?>" readonly class="form-control">
                                    </td>
                                </tr>
                            <?php endif ; ?>
                            <?php endforeach ; ?>
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
                        <?php if ($ab["user_email"] == $user["email"]): ?>

                            <tr>
                                <td><?php echo $ab["date"]; ?></td>
                                <td><?php echo $ab["time_in"]; ?></td>
                                <td><?php echo $ab["time_out"]; ?></td>
                            <?php if ($ab["overdue"] == 2): ?>
                                <td><?php echo("Telat"); ?></td>
                            <?php elseif ($ab["overdue"] == 1): ?>
                                <td><?php echo("Tepat waktu"); ?></td>
                            <?php else: ?>
                                <td><?php echo("-"); ?></td>
                            <?php endif ?>
                                <td><?php echo $ab["note"];?></td>
                            </tr>
                            
                        <?php endif ?>
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

