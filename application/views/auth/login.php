<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-lg-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <?php if(!empty($this->session->flashdata('flash'))): ?>
                     <?=$this->session->flashdata('flash')?>
                <?php endif ?>
              </div>
              <div class="card">
                <div class="card-header">
                  <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                </div>
                <div class="card-body">
                  <form class="user" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email"  placeholder="Enter Email Address..." value="<?=set_value('email')?>" name="email">
                  <small class="form-text text-danger"><?=form_error('email')?></small>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                  <small class="form-text text-danger"><?=form_error('password')?></small>
                </div> 
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
                <hr>
              </form>
                </div>
              </div>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url()?>auth/register">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
