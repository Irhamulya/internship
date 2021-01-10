
          <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
   
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<?= form_error('menu','<div class="alert alert-danger" 
				      role="alert">','</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
            
            <a href="" class="btn mb-2"style=" color:white;  background-color:#4169E1;"data-toggle="modal" data-target="#MenuModal">Add item</a>

            </div>
            <div class="card-body">
			
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                	<tr>
        						<th>Menu</th>
        						<th>Config</th>
        					</tr>
        				  </thead>
        				  <tbody>
        					<?php foreach ($menu as $m) :?>
        					<tr>
        						
        						<td><?php echo $m["menu"]; ?></td>
        						<td>
                      <a  
                          href="javascript:;"
                          data-id="<?php echo $m['id'] ?>"
                          data-nama="<?php echo $m['menu'] ?>"
                          data-toggle="modal" data-target="#edit-data" class="badge badge-warning">
                         <i class="fas fa-fw fa-edit"></i>
                      </a>
                      <a href="" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a >
                    </td>
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
<!-- Button trigger modal -->

<!-- Modal -->
      <?php echo form_open_multipart('menu'); ?>
<div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModalLabel">Add new Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      <div class="modal-body">
	         <div class="form-group">
			    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
			 </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	     	</div>
	      
     </div>
  </div>  
</div>
        <?php echo form_close(); ?>

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('menu/edit')?>" method="post" enctype="multipart/form-data" role="form">
             <div class="modal-body">
                     <div class="form-group">
                         <label class="col-lg-2 col-sm-2 control-label">Menu</label>
                         <div class="col-lg-10">
                          <input type="hidden" id="id" name="id">
                             <input type="text" class="form-control" id="menu" name="menu" placeholder="Tuliskan menu">
                         </div>
                     </div>
                                   
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                     <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->