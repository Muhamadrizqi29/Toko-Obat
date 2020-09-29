  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>

                   <?php if ($this->session->flashdata('info')) : ?>
                  <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('info'); ?>
                  </div>
                  <?php endif; ?>
                  <?php echo validation_errors('  <div class="alert alert-danger">', '</div>'); ?>

                  <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                    <div class="form-group">
                      <input type="text" autocomplete="off" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
