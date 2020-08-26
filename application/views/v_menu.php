  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('c_dashboard') ?>" class="site_title">
               <img class="logo" src="<?php echo base_url();?>assets/production/images/icon7.png " alt="logo" style="position: left; width: 50px; height: 50px;" />
              <span>KLASIBU</span></a>
            </div>

            <div class="clearfix"></div>
             <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('upload/profil/') . $data['foto']; ?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= $data['nama'];?></h2>
              </div>
            </div>

            <br />
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Umum</h3>
                <ul class="nav side-menu">
                  <li><a class="nav-link" href="<?php echo base_url('c_dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Klasifikasi Buku</h3>
                <ul class="nav side-menu">
                  <li><a class="nav-link" href="<?php echo base_url('c_datlat')?>"><i class="fa fa-table"></i> Data Latih</span></a></li>
                  <li><a class="nav-link" href="<?php echo base_url('c_klasbuk')?>"><i class="fa fa-bar-chart"></i> Data Uji</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('c_perhitungan')?>"><i class="fa fa-bar-chart"></i> Hasil Perhitungan</a></li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Data Buku</h3>
                <ul class="nav side-menu">
                  <li><a class="nav-link" href="<?php echo base_url('c_datbuk')?>"><i class="fa fa-book"></i> Data Buku</a></li>
                </ul>
              </div>
            </div>
            <!-- sidebar menu/ -->
          </div>
        </div>



