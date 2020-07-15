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
                    <p class="mb-4">Masukkan alamat email Anda dan kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda!</p>
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form class="user" method="GET" action="<?php echo base_url('c_auth/cari_email') ?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="cari" placeholder="Masukan alamat email Anda" value="<?php echo set_value('email'); ?>">
                      <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Kirim Email
                    </button>
                    <br />
                    <br />
                    Hasil Pencarian:
                    <center>
                    <?php if (count($result) > 0) {
                      echo "<a href=".site_url('c_auth/view_email/'.$result[0]->id_admin)."><font size='3'>".$result[0]->email."</font></a>";
                    } else {
                      echo "<center><font color='red' size='3'>Email Tidak ditemukan</font></center>";
                      } ?>
                    </center>
                    <hr>
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
  