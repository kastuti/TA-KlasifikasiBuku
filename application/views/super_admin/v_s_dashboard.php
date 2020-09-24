    <div class="right_col" role="main">
    <section class="content-header">
      <ol class="breadcrumb">
        <h6>
        Dashboard 
        </h6>
      </ol>
    </section>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                    <i class="fa fa-table"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Total Data User</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?= $total_admin ?></h3>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <br/>

      <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil Admin</h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                       <form>
                         <div class="container">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th width="20%"><img src="<?= base_url('upload/profil/') . $data['foto'];?>" class="img-thumbnail" width="120px" heihg="120px">
                                  </th>
                                  <th>
                                  <h1><u><?= $data['nama'];?></u></h1>
                                  <h2><u>Email</u>
                                  <br/><?= $data['email'];?></h2>
                                  </th>
                                </tr>
                              </thead>
                            </table>
                          </div> 
                        </form>

                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>

