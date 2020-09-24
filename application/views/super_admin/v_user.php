
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data User</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Data user merupakan data yang berisi daftar user yang telah terdaftar.<br><br>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>ID Role</th>
                          <th>Role</th>
                          <th>ID Aktifasi</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          foreach ($user as $row){
                        ?>

                        <tr class="table-primary">
                          <td><?php echo $row->id_admin;?></td>
                          <td><?php echo $row->nama;?></td>
                          <td><?php echo $row->email;?></td>
                          <td><?php echo $row->role_id;?></td>
                          <td><?php echo $row->role;?></td>
                          <td><?php echo $row->active_id;?></td>
                          <td><img src='<?=base_url()?>upload/profil/<?=$row->foto;?>' width='90' height='90'></td>
                          <td>
                          <a href="<?php echo base_url('super_admin/c_user/hapus/'.$row->id_admin);?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa fa-trash m-right-xs"> Hapus</i></a>
                          <a href="<?php echo base_url('super_admin/c_user/active/'.$row->id_admin);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit m-right-xs"> Aktifasi Akun</i></a>
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



        