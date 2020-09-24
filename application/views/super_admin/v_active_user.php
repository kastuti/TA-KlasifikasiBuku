
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Aktifasi Akun User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('super_admin/c_user/prosesActive') ?>" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">ID Aktifasi<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input type="hidden" name="id_admin" value="<?= $user['id_admin']; ?>">
                          <select class="form-control" name="active_id">
                            <option>ID Aktifasi</option>
                            <option value="0">0</option>
                            <option value="1">1</option> 
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                          <a href="<?php echo base_url('super_admin/c_user')?>" class="btn btn-danger btn-sm"><i class="fa fa-remove m-right-xs"> Batal</i></a>
                          <button type="submit" name="ubah" class="btn btn-success btn-sm"><i class="fa fa-file m-right-xs"> Simpan</i></button>
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