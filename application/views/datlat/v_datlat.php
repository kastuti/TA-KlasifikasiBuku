
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Latih</h2>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus m-right-xs"> Tambah Data</i></a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data latih merupakan data yang digunakan untuk proses pelatihan.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Judul/Sinopsis Buku </th>
                          <th>Kategori</th>
                          <th>Hasil Pemrosesan Teks</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                          foreach ($datlat as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_datlat;?></td>
                          <td><?php echo $row->js_buku;?></td>
                          <td><?php echo $row->kategori;?></td>
                          <td><?php echo $row->hasil;?></td>
                          <td>
                          <a href="<?php echo base_url('c_datlat/edit/'.$row->id_datlat);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit m-right-xs"> Ubah</i></a>
                          <a href="<?php echo base_url('c_datlat/hapus/'.$row->id_datlat);?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa fa-trash m-right-xs"> Hapus</i></a>
                          <a href="<?php echo base_url('c_datlat/processing/'.$row->id_datlat);?>" class="btn btn-info btn-sm"><i class="fa fa-retweet m-right-xs"> Proses</i></a>
                          </td>
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
                      <label class="col-form-label col-md-4 col-sm-4" for="js_buku">Judul/Sinopsis Buku<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" id="js_buku" name="js_buku" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4" for="kategori">Kategori<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 ">
                          <select class="form-control" name="kategori">
                            <option>Pilih Kategori</option>
                            <option value="000">Computer science, information, general works</option>
                            <option value="100">Philosophy & psychology</option>
                            <option value="200">Religion</option>
                            <option value="300">Social sciences</option>
                            <option value="400">Language</option>
                            <option value="500">Science</option>
                            <option value="600">Technology</option>
                            <option value="700">Arts & recreation</option>
                            <option value="800">Literature</option>
                            <option value="900">History & geography</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12"> 
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