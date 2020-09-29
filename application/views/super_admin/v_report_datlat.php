
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Latih</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data latih merupakan data yang digunakan untuk proses pelatihan. <br><br>
                      <a href="<?php echo base_url('super_admin/c_report_datlat/export_excel/');?>" class="btn btn-info btn-sm">Excel</a>
                      <a href="<?php echo base_url('super_admin/c_report_datlat/export_pdf/');?>" class="btn btn-info btn-sm">PDF</a>
                    </p>
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Judul/Sinopsis Buku </th>
                          <th>Kategori</th>
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
                          </td>
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