<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php
        if (!empty($this->session->userdata())){
          echo $this->session->userdata('name') ;

        }


        ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> </a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview menu-open">



      <li class="treeview">
        <a href="#">
          <i class="fa fa-question"></i>
          <span>Tentang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Profil</a></li>
          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Kontak Sistem</a></li>
          <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> FAQ</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Menu Jurnal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url ('./jurnal') ?>"><i class="fa fa-circle-o"></i> Jurnal Terdaftar </a></li>
          <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Jurnal Belum Terbit</a></li> -->
          <li><a href="<?php echo base_url ('dept') ?>"><i class="fa fa-circle-o"></i> Daftar Departemen </a></li>
          <li><a href="<?php echo base_url ('sk') ?>"><i class="fa fa-circle-o"></i> Kelola SK </a></li>
          <li><a href="<?php echo base_url ('./pengindeks') ?>"><i class="fa fa-circle-o"></i> Tambah Pengindeks</a></li>
          <li><a href="<?php echo base_url ('./lembaga') ?>"><i class="fa fa-circle-o"></i> Tambah Lembaga</a></li>
          <li><a href="<?php echo base_url ('./lab') ?>"><i class="fa fa-circle-o"></i> Tambah Lab</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart"></i> <span>Jurnal Dalam Grafik </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> ____________</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> ____________</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> ____________</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Manajemen Pengelola</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url ('./kelola_pengelola') ?>"><i class="fa fa-circle-o"></i> Kelola Pengelola</a></li>
          <li><a href="<?php echo base_url ('./tambah_pengelola') ?>"><i class="fa fa-circle-o"></i> Tambah Pengelola</a></li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Filtering Data Jurnal</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Menurut Bahasa
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> INGGRIS</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> INDONESIA</a></li>
              </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Menurut Portal
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> ejournal1</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> ejournal2</a></li>
                </ul>
              </li>

              <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Status Akreditasi
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> S1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> S2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> S3</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> S4</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> S5</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> S6</a></li>


                  </ul>
                </li>
        </ul>

      </li> -->

    </ul>

  </section>
  <div style="padding:1rem">
    <a href="/JurnalTA/logout"class="btn btn-primary btn-block btn-flat" style="opacity:1"><i class=""></i> sign out </a>
</div>
  <!-- /.sidebar -->
</aside>
