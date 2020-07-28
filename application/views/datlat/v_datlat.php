
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Data Latih</h2>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus m-right-xs"> Tambah Data</i></a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data latih merupakan data yang berisi daftar buku yang ditambahkan melalui proses pelatihan.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>ID</th>
                          <th>Judul Buku </th>
                          <th>Sinopsis</th>
                          <th>Kategori</th>
                          <!-- <th>Frekuensi</th> -->
                          <!-- <th>Tanggal Dibuat</th> -->
                          <!-- <th>Aksi</th> -->
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                          $no=0;
                          $no++;
                          foreach ($datlat as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $no++;?></td>
                          <td><?php echo $row->id_datlat;?></td>
                          <td><?php echo $row->judul_buku;?></td>
                          <td><?php echo $row->sinopsis;?></td>
                          <td><?php echo $row->kategori;?></td>
                          <!-- <td><?php echo $row->frekuensi;?></td> -->
                          <!-- <td><?php echo $row->tgl_dibuat;?></td> -->
                          <!-- <td>
                          <a href="<?php echo base_url('c_datlat/hapus/'.$row->id_datlat);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash m-right-xs"> Hapus</i></a>
                          </td> -->
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>

              <!--MODAL ADD-->
              <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Tambah Data Latih</h4>
              </div>
                <div class="modal-body">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('c_datlat/simpan');?>" method="post">
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="judul_buku">Judul Buku<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" id="judul_buku" name="judul_buku" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="sinopsis">Sinopsis<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" id="sinopsis" name="sinopsis" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">Kategori<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <select class="select2_group form-control">
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
                    <!-- <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="frekuensi">Frekuensi<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" id="frekuensi" name="frekuensi" required="required" class="form-control ">
                        </div>
                    </div> -->
                    <div class="modal-footer">
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 offset-md-12"> 
                          <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove m-right-xs"> Batal</i></button>
                          <button class="btn btn-primary btn-sm" type="reset"><i class="fa fa-eraser m-right-xs"> Reset</i></button>
                          <button type="submit" value="upload" class="btn btn-success btn-sm"><i class="fa fa-file m-right-xs"> Simpan</i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
              </div>
              <!--END MODAL ADD-->
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- /page content -->