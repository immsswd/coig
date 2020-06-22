
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
            <div class="col-lg">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#iModal">
        Add new submenu
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
                    <th scope="col">Title</th>
                    <th scope="col">URL</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Aktif?</th>
                    <th scope="col">?</th>
                  </tr>
                </thead>
                <tbody>
              <?php 
                $count = 1;
                foreach ($submenu as $sm):
              ?>
                  <tr>
                    <th scope="row"><?= $count++ ?></th>
                    <td><?= $sm->menu ?></td>
                    <td><?= $sm->menu_title ?></td>
                    <td><?= $sm->url ?></td>
                    <td><?= $sm->icon ?></td>
                    <td>
                      <?php if($sm->is_active == 1) {
                        echo "Active";
                      }else{
                        echo "Nonactive";
                      }
                      ?>
                        
                      </td>
                    <td>
                      <a data-toggle="modal" data-target="#iModal2" href="<?= base_url('menu/submenu/').$sm->id ?>" class="btn btn-info">Edit</a>
                      <a href="<?=base_url('menu/submenu/').$sm->id?>" onclick="return confirm('Yakin menu dihapus?')" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>

              <!-- Modal launch -->
         <div class="modal fade" id="iModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
              <form method="post" action="<?= base_url('menu/submenu') ?>">
              <div class="form-group">
                <label for="menu_title">Submenu name</label>
                <input type="text" autocomplete="off" name="menu_title" class="form-control" placeholder="Submenu title" id="menu_title">
              </div> 
              <div class="form-group">
                <label for="user_menu_id">Menu name</label>
                <select class="form-control" id="user_menu_id" name="user_menu_id">
                  <option value="">Select menu</option>
                  <?php foreach ($menu as $m): ?>
                  <option value="<?=$m->id?>"><?=$m->menu?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="url">URL</label>
                <input type="text" autocomplete="off" name="url" class="form-control" placeholder="URL" id="url">
              </div> 
              <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" autocomplete="off" name="icon" class="form-control" placeholder="Icon" id="icon">
              </div> 
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" checked>
                <label class="form-check-label" for="is_active">Active?</label>
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

      <!-- modal edit Submenu -->
      <div class="modal fade" id="iModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit new submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              
              <form method="post" action="<?= base_url('menu/editsubmenu/').$sm->id ?>">
              <div class="form-group">
                <label for="menu_title">Submenu name</label>
                <input type="text" autocomplete="off" name="menu_title" class="form-control" placeholder="Submenu title" id="menu_title">
              </div> 
              <div class="form-group">
                <label for="user_menu_id">Menu name</label>
                <select class="form-control" id="user_menu_id" name="user_menu_id">
                  <option value="">Select menu</option>
                  <?php foreach ($menu as $m): ?>
                  <option value="<?=$m->id?>"><?=$m->menu?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="url">URL</label>
                <input type="text" autocomplete="off" name="url" class="form-control" placeholder="URL" id="url">
              </div> 
              <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" autocomplete="off" name="icon" class="form-control" placeholder="Icon" id="icon">
              </div> 
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" checked>
                <label class="form-check-label" for="is_active">Active?</label>
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

      <!-- end modal edit submenu -->
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
