<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <!-- untuk form action="" boleh yang diarahkan ke method controller yang memanggil halaman ini. boleh diisi atau tidak, tidak apapa -->
            <form method="post" action="" class="user">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="fullname" placeholder="Fullname" value="<?=set_value('name')?>" name="name">
                <small class="form-text text-danger"><?=form_error('name')?></small>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" value="<?=set_value('email')?>" name="email">
                <small class="form-text text-danger"><?=form_error('email')?></small>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                  <small class="form-text text-danger"><?=form_error('password1')?></small>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?=base_url()?>auth/">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
