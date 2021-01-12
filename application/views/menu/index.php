
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
                      <a href="<?= base_url(); ?>menu/edit/<?= $m["id"]; ?>" class="badge" style=" color:white;  background-color:#FF8C00;"><i class="far fa-fw fa-edit"></i></a>
                      <a href="<?= base_url(); ?>menu/hapus/<?= $m["id"]; ?>"
                   class="badge badge-danger" onclick="return confirm('Yakin?');"><i
                      class="fas fa-fw fa-trash-alt"></i>
                </a>
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
