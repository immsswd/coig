
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
				<button type="button" class="btn btn-primary btn-block mb-2" data-toggle="modal" data-target="#iModal">
				Add new menu
				</button>
				<?php if(validation_errors()): ?>
					<div class="alert alert-info alert-dismissible"><?= validation_errors() ?></div>
				<?php else: ?>
					<?= $this->session->flashdata('flash') ?>
				<?php endif ?>
          		<table class="table table-hover">
          			<thead>
          				<tr>
          					<th scope="col">#</th>
          					<th scope="col">Menu</th>
          					<th scope="col">Action</th>
          				</tr>
          			</thead>
          			<tbody>
    
          				<tr>
          					<th scope="row">#</th>
          					<td></td>
          					<td>
          						<a href="" class="btn btn-info">Edit</a>
          						<a href="" onclick="return confirm('Yakin menu dihapus?')" class="btn btn-danger">Delete</a>
          					</td>
          				</tr>
          			</tbody>
          		</table>

          		<!-- Modal launch -->
				 <div class="modal fade" id="iModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Add new menu</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      <form method="post" action="<?= base_url('menu') ?>">
				      <div class="form-group">
				      	<label for="menu">Menu name</label>
				      	<input type="text" autocomplete="off" name="menu" class="form-control" placeholder="Lorem" id="menu">
				      </div> 
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-success">Add</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
          		<!-- End Modal Launch -->
          	</div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
