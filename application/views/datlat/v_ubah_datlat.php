
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Data Latih</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('c_datlat/prosesEdit') ?>" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="js_buku">Judul/Sinopsis Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10">
                          <input type="hidden" name="id_datlat" value="<?= $datlat['id_datlat']; ?>">
                          <input type="text" id="js_buku" name="js_buku" required="required" class="form-control" value="<?= $datlat['js_buku']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">Kategori<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <select class="form-control" name="kategori">
                            <option>Pilih Kategori</option>
                            <option value="Computer science, information, general works">000</option>
                            <option value="Philosophy & psychology">100</option>
                            <option value="Religion">200</option>
                            <option value="Social sciences">300</option>
                            <option value="Language">400</option>
                            <option value="Science">500</option>
                            <option value="Technology">600</option>
                            <option value="Arts & recreation">700</option>
                            <option value="Literature">800</option>
                            <option value="History & geography">900</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                          <a href="<?php echo base_url('c_datlat')?>" class="btn btn-danger btn-sm"><i class="fa fa-remove m-right-xs"> Batal</i></a>
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