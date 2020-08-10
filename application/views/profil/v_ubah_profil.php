
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
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('c_profil/editadmin/'); ?>" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="email" name="email" required="required" class="form-control" value="<?= $data['email']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="nama" name="nama" required="required" class="form-control" value="<?= $data['nama']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="password" name="password" class="form-control" required="required" type="password" value="<?= $data['password']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Foto<span class="required">*</span>
                        </label>
                        <div class="col-sm-1">
                              <img src="<?= base_url('upload/profil/') . $data['foto'];?>" class="img-thumbnail" width="50px">
                            </div>
                        <div class="col-md-5 col-sm-5 ">
                          <input id="foto" name="foto" class="form-control" required="required" type="file" value="<?= $data['foto']; ?>">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <a href="<?php echo base_url('c_profil')?>" class="btn btn-danger btn-sm"><i class="fa fa-remove m-right-xs"> Batal</i></a>
                          <button type="submit" name="ubah" class="btn btn-success btn-sm"><i class="fa fa-file m-right-xs"> Simpan</i></button>
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