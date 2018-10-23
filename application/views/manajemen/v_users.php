<!DOCTYPE html>
<html>
 <?php $this->load->view('manajemen/man_head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Header -->
  <?php $this->load->view('manajemen/man_header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('manajemen/man_leftbar')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <head>
        <div class="bar">
          <section class="content-header">
            <h1>
              Manajemen Pengelola
              <small>EJournal Universitas Diponegoro</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="Manajemen"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Manajemen Pengelola</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">

      </br>
      </br>
      <table id="tableuser" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>No.</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Telepon</th>
          <th style="padding-right:220px;">Opsi Pengelola</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach($data as $a) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->username ?></div></font></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->email ?></td>
          <td><?php echo $a->telepon ?></td>



          <td colspan="3">
            <a href="<?php echo base_url('kelola_pengelola/edit_user/'.$a->id_user); ?>" class="btn btn-info"><b>Edit</b></a>

            <a href="<?php echo base_url('kelola_pengelola/delete_user/'.$a->id_user);?>" class="btn btn-danger" onClick="return confirmDelete();" ><b>Delete</b></a>

            <a href="<?php echo base_url('kelola_pengelola/edit_pass/'.$a->id_user); ?>" class="btn btn-default"><b>Change Password</b></a>
          </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
      </section>
  </div>

  <?php $this->load->view('manajemen/man_footer')?>
</div>
<!-- ./wrapper -->
</body>
</html>
