<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/template/back/dist') ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>GUEST</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div> -->
    <!-- search form -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header text-center"style="color:white;"><h4>Login Disini</h4></li>
      <li class="active treeview menu-open">
        </li>
      </ul>

      <?php if($this->session->flashdata('error_login')) : ?>
        <div class="alert alert-danger alert-dismissible" style="margin-bottom:10px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> login gagal !</h4>
          <?= $this->session->flashdata('error_login') ?>
        </div>
      <?php endif ?>
      <!-- <form action="" method="get" class="" style="padding:1rem;"> -->

    <form action="<?php echo base_url('auth_process') ?>"style="padding:1rem;" method="post">

      <div class="form-group">
        <label for="exampleInputEmail1" class="" style="color:white;">Username</label>
        <input type="username" name="username" class="form-control" placeholder="Username" required/>
      </div>
        <div class="form-group">
          <label for="exampleInputPassword1" style="color:white;">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required/>
            </div>
            <div class="form-group">
            <!-- <div class="col-xs-6"> -->
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            <!-- </div> -->
              </div>

    </form>

    <ul class="sidebar-menu" data-widget="tree">
    <!-- <li class="treeview">
      <ul class="sidebar-menu" data-widget="tree">
      <ul class="treeview-menu">
        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Profil</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Kontak Sistem</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> FAQ</a></li>
      </ul>
        </ul>
      </li> -->
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
    </ul>



    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->

  </section>
  <!-- /.sidebar -->
</aside>
