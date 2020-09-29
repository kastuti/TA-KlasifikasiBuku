
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Uji</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data uji merupakan data untuk proses pengujian guna keperluan klasifikasi.<br><br>
                      <a href="<?php echo base_url('super_admin/c_report_klasbuk/export_excel/');?>" class="btn btn-info btn-sm">Excel</a>
                      <a href="<?php echo base_url('super_admin/c_report_klasbuk/export_pdf/');?>" class="btn btn-info btn-sm">PDF</a>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Judul/Sinopsis Buku</th>
                          <th>Hasil Klasifikasi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          foreach ($klasbuk as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_klasbuk;?></td>
                          <td><?php echo $row->js_buku;?></td>
                          <td><?php echo $row->hasil2;?></td>
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