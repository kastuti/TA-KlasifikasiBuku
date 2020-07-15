<?php $this->load->view('v_header');?>

  <!-- top body -->
  <?php $this->load->view('v_topbody');?>
  <!-- /top body -->

            <!-- menu profil -->
            <?php $this->load->view('v_menu_profil');?>
            <!-- /menu profil-->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view('v_menu');?>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('v_topnav');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Data Profil</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                      <input type="hidden" name="id" value="<?= $c_datbuk['id_buku']; ?>">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="email" name="email" required="required" class="form-control" value="<?= $c_profil['email']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?= $c_profil['nama']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="password" name="password" class="form-control" required="required" type="text" value="<?= $c_profil['password']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <a href="<?php echo base_url('c_profil')?>" class="btn btn-danger"><i class="fa fa-remove m-right-xs"> Batal</i></a>
                          <a href="<?php echo base_url('c_profil')?>" class="btn btn-success"><i class="fa fa-file m-right-xs"> Simpan</i></a>
                          <!-- <button type="submit" value="upload" class="btn btn-success"><i class="fa fa-file m-right-xs"> Simpan</i></button> -->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('v_footer');?>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('v_script');?>
  
  </body>
</html>