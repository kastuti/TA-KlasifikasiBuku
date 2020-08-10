
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
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('c_datbuk/prosesEdit/' . $c_datbuk['id_buku']); ?>" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $c_datbuk['id_buku']; ?>">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="judul_buku">Judul Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="judul_buku" name="judul_buku" required="required" class="form-control" value="<?= $c_datbuk['judul_buku']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="edisi">Edisi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="edisi" name="edisi" required="required" class="form-control" value="<?= $c_datbuk['edisi']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="isbn">ISBN<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="isbn" name="isbn" required="required" class="form-control" value="<?= $c_datbuk['isbn']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="penerbit" name="penerbit" class="form-control" required="required" type="text" value="<?= $c_datbuk['penerbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="tahun_terbit" name="tahun_terbit" class="form-control" required="required" type="text" value="<?= $c_datbuk['tahun_terbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Fisik<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="deskripsi_fisik" name="deskripsi_fisik" class="form-control" required="required" type="text" value="<?= $c_datbuk['deskripsi_fisik']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Bahasa<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="bahasa" name="bahasa" class="form-control" required="required" type="text" value="<?= $c_datbuk['bahasa']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="tempat_terbit" name="tempat_terbit" class="form-control" required="required" type="text" value="<?= $c_datbuk['tempat_terbit']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Klasifikasi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class="select2_group form-control" name="klasifikasi" id="klasifikasi">
                            <optgroup label="Computer science, information & general works">
                              <option value="AK">Knowledge</option>
                              <option value="HI">The book</option>
                              <option value="AK">Systems</option>
                              <option value="HI">Computer science</option>
                              <option value="AK">Computer programming, programs, data, security</option>
                              <option value="HI">Special computer methods</option>
                            </optgroup>
                            <optgroup label="Philosophy & psychology ">
                            </optgroup>
                            <optgroup label="Religion">
                            </optgroup>
                            <optgroup label="Social sciences">
                            </optgroup>
                            <optgroup label="Language">
                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="klasifikasi" name="klasifikasi" class="form-control" required="required" type="text" value="<?= $c_datbuk['sinopsis']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pengarang<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="klasifikasi" name="klasifikasi" class="form-control" required="required" type="text" value="<?= $c_datbuk['pengarang']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Cover<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="klasifikasi" name="klasifikasi" class="form-control" required="required" type="file" value="<?= $c_datbuk['cover']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <a href="<?php echo base_url('c_datbuk')?>" class="btn btn-danger btn-sm"><i class="fa fa-remove m-right-xs"> Batal</i></a>
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