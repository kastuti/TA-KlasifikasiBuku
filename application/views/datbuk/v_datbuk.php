
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Buku</h2>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus m-right-xs"> Tambah Data</i></a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data buku merupakan data yang berisi daftar buku yang telah diklasifikasikan.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>ID</th>
                          <th>Judul Buku</th>
                          <th>Edisi</th>
                          <th>ISBN</th>
                          <th>Penerbit</th>
                          <th>Tahun Terbit</th>
                          <th>Deskripsi Fisik</th>
                          <th>Bahasa</th>
                          <th>Tempat Terbit</th>
                          <th>Klasifikasi</th>
                          <th>Sinopsis</th>
                          <th>Pengarang</th>
                          <th>Cover</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          $no=0;
                          $no++;
                          foreach ($datbuk as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $no++;?></td>
                          <td><?php echo $row->id_buku;?></td>
                          <td><?php echo $row->judul_buku;?></td>
                          <td><?php echo $row->edisi;?></td>
                          <td><?php echo $row->isbn;?></td>
                          <td><?php echo $row->penerbit;?></td>
                          <td><?php echo $row->tahun_terbit;?></td>
                          <td><?php echo $row->deskripsi_fisik;?></td>
                          <td><?php echo $row->bahasa;?></td>
                          <td><?php echo $row->tempat_terbit;?></td>
                          <td><?php echo $row->klasifikasi;?></td>
                          <td><?php echo $row->sinopsis;?></td>
                          <td><?php echo $row->pengarang;?></td>
                          <td><img src='<?=base_url()?>upload/<?=$row->cover;?>' width='100' height='100'></td>
                          <td>
                          <a href="<?php echo base_url('c_datbuk/hapus/'.$row->id_buku);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash m-right-xs"> Hapus</i></a>
                          <a href="<?php echo base_url('c_datbuk/ubah/'.$row->id_buku);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit m-right-xs"> Ubah</i></a>
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
                  <h4 class="modal-title" id="myModalLabel">Tambah Data Buku</h4>
              </div>
                    <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('c_datbuk/simpan');?>" method="post">
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="judul_buku">Judul Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" id="judul_buku" name="judul_buku" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="edisi">Edisi<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" id="edisi" name="edisi" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="isbn">ISBN<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" id="isbn" name="isbn" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Penerbit<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="penerbit" name="penerbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="tahun_terbit" name="tahun_terbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Deskripsi Fisik<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="deskripsi_fisik" name="deskripsi_fisik" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Bahasa<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="bahasa" name="bahasa" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Tempat Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-86 ">
                          <input id="tempat_terbit" name="tempat_terbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Klasifikasi<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
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
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Sinopsis<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="sinopsis" name="sinopsis" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Pengarang<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="pengarang" name="pengarang" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Cover<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 ">
                          <input id="cover" name="cover" class="form-control border-input" type="file" multiple="">
                        </div>
                      </div>
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