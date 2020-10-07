
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Buku</h2>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus m-right-xs"> Tambah Data</i></a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                    <p class="text-muted font-13 m-b-30">
                      Data buku merupakan data yang berisi daftar buku yang telah diklasifikasikan.<br><br>
                    </p>
                     
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Judul Buku</th>
                          <th>ISBN</th>
                          <th>Penerbit</th>
                          <th>Tahun Terbit</th>
                          <th>Tempat Terbit</th>
                          <th>Kategori</th>
                          <th>Sinopsis</th>
                          <th>Pengarang</th>
                          <th>Cover</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          foreach ($datbuk as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_buku;?></td>
                          <td><?php echo $row->judul_buku;?></td>
                          <td><?php echo $row->isbn;?></td>
                          <td><?php echo $row->penerbit;?></td>
                          <td><?php echo $row->tahun_terbit;?></td>
                          <td><?php echo $row->tempat_terbit;?></td>
                          <td><?php echo $row->klasifikasi;?></td>
                          <td><?php echo $row->sinopsis;?></td>
                          <td><?php echo $row->pengarang;?></td>
                          <td><img src='<?=base_url()?>upload/cover/<?=$row->cover;?>' width='90' height='90'></td>
                          <td>
                          <a href="<?php echo base_url('c_datbuk/hapus/'.$row->id_buku);?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa fa-trash m-right-xs"> Hapus</i></a>
                          <a href="<?php echo base_url('c_datbuk/edit/'.$row->id_buku);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit m-right-xs"> Ubah</i></a>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('c_datbuk/tambahBuku');?>" method="post">
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="judul_buku">Judul Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9">
                          <select class="form-control" name="judul_buku" id="id_buku">
                            <option selected disable>PILIH</option>
                            <?php
                              foreach ($data_uji as $data){
                            ?>
                              <option value="<?php echo $data->js_buku; ?>" data-kategori="<?php echo $data->hasil2; ?>"><?php echo $data->js_buku; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3" for="isbn">ISBN<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm9 ">
                          <input type="text" id="isbn" name="isbn" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Penerbit<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input id="penerbit" name="penerbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Tahun Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input id="tahun_terbit" name="tahun_terbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Tempat Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input id="tempat_terbit" name="tempat_terbit" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Kategori<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" id="klasifikasi" name="klasifikasi" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Sinopsis<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input id="sinopsis" name="sinopsis" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 ">Pengarang<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input id="pengarang" name="pengarang" class="form-control" required="required" type="text">
                        </div>
                      </div>
                      <div class="modal-footer">
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12">
                          <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"> Batal</i></button>
                          <button class="btn btn-primary btn-sm" type="reset"><i class="fa fa-eraser"> Reset</i></button>
                          <button type="submit" value="upload" class="btn btn-success btn-sm"><i class="fa fa-file"> Simpan</i></button>
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



        