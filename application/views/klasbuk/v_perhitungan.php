
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perhitungan Data Uji</h2>
                    <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus m-right-xs"> Tambah Data</i></a></span> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data ini merupakan data hasil perhitungan pada proses klasifikasi.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Judul/Sinopsis Buku</th>
                          <th>Kategori 000</th>
                          <th>Kategori 100</th>
                          <th>Kategori 200</th>
                          <th>Kategori 300</th>
                          <th>Kategori 400</th>
                          <th>Kategori 500</th>
                          <th>Kategori 600</th>
                          <th>Kategori 700</th>
                          <th>Kategori 800</th>
                          <th>Kategori 900</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          foreach ($klasbuk as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_klasbuk;?></td>
                          <td><?php echo $row->js_buku;?></td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
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