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
                    <h1 class="h4 text-gray-900 mb-4">Halaman Lupa Kata Sandi</h1>
                    <!-- <p class="mb-4">Masukkan alamat email Anda dan kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda!</p> -->
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?php echo base_url('c_auth/sandi_baru') ?>/<?php echo $emailku[0]->id_admin ?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" value="<?php echo $emailku[0]->email?>" disabled="">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" aria-describedby="emailHelp" value="<?php echo $emailku[0]->nama ?>" disabled="">
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Kirim Email
                    </button>
                  </form>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('c_auth'); ?>">Anda sudah memiliki akun? Silahkan login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  