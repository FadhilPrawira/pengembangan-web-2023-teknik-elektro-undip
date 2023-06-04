<style>
body{
  background: #1cc88a;
}
</style>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sales & Inventory Management</h1>
                  </div>
                  <form class="user" action="<?php echo base_url("admin/login/login_process"); ?>" method="post">
                    <div class="form-group">
                      <input type="input"  name="username" value="<?php echo set_value('username');?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                      <?php echo form_error('username');?>
                    </div>
                    <div class="form-group">
                      <input type="password"  name="password" value="<?php echo set_value('password');?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <?php echo form_error('password');?>
                    </div>
                    <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control">
                      <option value="">Kosong</option>
                      <?php foreach ($tahun as $key => $value) {?>
                        <option value="<?=$value->tahun?>"><?=$value->tahun?></option>
                      <?php } ?>
                    </select>
                  </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Login
                    </button>

                  </form>
                  <?php if($this->session->flashdata('flashMessage')){?>
                      <div class="text-center small text-danger"><?php echo $this->session->flashdata('flashMessage');?></div>
                  <?php } ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
