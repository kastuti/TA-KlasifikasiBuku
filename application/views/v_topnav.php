<!--top Navigation-->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <span><?php echo $this->session->userdata('nama'); ?></span>
                    <!-- <img src="<? php echo base_url('assets/production/images/profil') . $data['foto']; ?>"> -->
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url('c_profil'); ?>"> Profil</a>
                    <a class="dropdown-item"  href="<?php echo base_url('c_auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
<!--top Navigation/-->