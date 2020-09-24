
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hasil Perhitungan Data Uji</h2>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="<?php echo base_url('c_klasbuk');?>" class="btn btn-danger btn-sm">X</a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Nilai Probabilitas Kategori</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($hasil as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_buku;?></td>
                          <td><?php echo $row->kategori;?></td>
                          <td><?php echo $row->hasil;?></td>
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
        <!-- /page content -->