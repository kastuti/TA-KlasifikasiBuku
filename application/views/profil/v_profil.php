        

        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil Admin</h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                       <form action="<?=base_url('c_profil/editadmin/');?>">
                         <!-- Default box -->
                         <div class="container">
                          <!-- <div class="card mb-5"> -->
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th width="20%">Administrator</th>
                                  <th> <?= $data['nama'];?> </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Email</td>
                                  <td> <?=$data['email'];?></td>
                                </tr>
                                <tr>
                                  <td>Password</td>
                                  <td> <?=$data['password']?></td>
                                </tr>
                                  <tr>
                                  <td>Foto</td>
                                  <td> <img src="<?= base_url('upload/profil/') . $data['foto'];?>" class="img-thumbnail"></td>
                                </tr>
                              </tbody>
                            </table>
                          </div> 
                          <div class="form-group">
                            <label  class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                            <button class="btn btn-success btn-sm" name="edit" type="submit"><i class="fa fa-edit"></i>Ubah Profil</button>
                             <!--  <button class="bnt btn-success btn-sm" name="edit" type="submit">
                                <i class="fa fa-edit"></i> Edit Profil
                              </button> -->

                               <!-- . $data['id_admin'] -->
                            </div>
                          </div>

                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>