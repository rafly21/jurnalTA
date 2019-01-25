<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src ="<?= !empty($this->session->userdata('foto')) ? base_url($this->session->userdata('foto')) : 'https://via.placeholder.com/100'?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> <?php
        if (!empty($this->session->userdata())){
          echo $this->session->userdata('name') ;

        }


        ?></p>
      </div>
    </div>
    <br>
  </br>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview menu-open">




      <li>
        <a href="<?php echo base_url ('./jurnal-p') ?>">
          <i class="fa fa-th"></i> <span>Jurnal Yang Dikelola</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url ('pengelola/data_pengelola/'.$this->session->userdata('id_pengelola')) ?>">
          <i class="fa fa-th"></i> <span>Data Pengelola</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>


      <li>

    </ul>

  </section>
  <div style="padding:1rem">
    <a href="/JurnalTA/logout"class="btn btn-primary btn-block btn-flat" style="opacity:1"><i class=""></i> sign out </a>
</div>
  <!-- /.sidebar -->
</aside>
