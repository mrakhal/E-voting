<div class="wrapper">

  <header class="main-header">
    <nav style="background-color:#40E0D0;" class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url(); ?>" class="navbar-brand">PEMIRA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        $man = $this->session->userdata('man');
        $user = $this->session->userdata('user');
        if ($man) { ?>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo site_url('dashboard/mhs/'); ?>">Mahasiswa</a></li>
              <li><a href="<?php echo site_url('dashboard/bem/'); ?>">KAHIM</a></li>
              <li><a href="<?php echo site_url('dashboard/suara/'); ?>">Perolehan Suara</a></li>
              <li><a href="<?php echo site_url('dashboard/insertdpt/'); ?>">Input Mahasiswa</a></li>
            </ul>
          </div>
        <?php
        } elseif ($user) { ?>
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo site_url('registrasi/'); ?>">Registrasi</a></li>
              <li><a href="<?php echo site_url('registrasi/mhs/'); ?>">Cek Data Mahasiswa</a></li>
            </ul>
          </div>
          <?php } else { ?>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;"Pemira Bersih Menuju Pemimpin Yang Berintegritas"&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
              </ul>
            </div>
        <?php  } ?>
        <!-- /.navbar-collapse -->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?php echo site_url('login/logout'); ?>">
                <i class="fa fa-power-off"></i>
                <span class="hidden-xs">Logout</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
