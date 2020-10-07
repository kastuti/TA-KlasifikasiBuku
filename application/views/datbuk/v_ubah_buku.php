
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Data Buku</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('c_datbuk/prosesEdit') ?>" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="judul_buku">Judul Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10">
                          <input type="hidden" name="id_buku" value="<?= $datbuk['id_buku']; ?>">
                          <input type="text" id="judul_buku" name="judul_buku" required="required" class="form-control" value="<?= $datbuk['judul_buku']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2" for="isbn">ISBN<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input type="text" id="isbn" name="isbn" required="required" class="form-control" value="<?= $datbuk['isbn']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Penerbit<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="penerbit" name="penerbit" class="form-control" required="required" type="text" value="<?= $datbuk['penerbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Tahun Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="tahun_terbit" name="tahun_terbit" class="form-control" required="required" type="text" value="<?= $datbuk['tahun_terbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">Tempat Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="tempat_terbit" name="tempat_terbit" class="form-control" required="required" type="text" value="<?= $datbuk['tempat_terbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">Kategori<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <select class="form-control" name="klasifikasi">
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
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">Sinopsis<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="sinopsis" name="sinopsis" class="form-control" required="required" type="text" value="<?= $datbuk['sinopsis']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 ">Pengarang<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="pengarang" name="pengarang" class="form-control" required="required" type="text" value="<?= $datbuk['pengarang']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Cover<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 ">
                          <input id="cover" name="cover" class="form-control" required="required" type="file" value="<?= $datbuk['cover']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                          <a href="<?php echo base_url('c_datbuk')?>" class="btn btn-danger btn-sm"><i class="fa fa-remove m-right-xs"> Batal</i></a>
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