
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Buku</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                    <p class="text-muted font-13 m-b-30">
                      Data buku merupakan data yang berisi daftar buku yang telah diklasifikasikan.<br><br>
                      <a href="<?php echo base_url('super_admin/c_report_datbuk/export_excel/');?>" class="btn btn-info btn-sm">Excel</a>
                      <a href="<?php echo base_url('super_admin/c_report_datbuk/export_pdf/');?>" class="btn btn-info btn-sm">PDF</a>
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
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- /page content -->



        