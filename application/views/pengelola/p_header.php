<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>EJournal</b>Undip</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- Notifications: style can be found in dropdown.less -->
        <!-- Tasks: style can be found in dropdown.less -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src ="<?= !empty($this->session->userdata('foto')) ? base_url($this->session->userdata('foto')) : 'https://via.placeholder.com/100'?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php
            if (!empty($this->session->userdata())){
              echo $this->session->userdata('name') ;

            }


            ?></span>
          </a>

        </li>
        <!-- Control Sidebar Toggle Button -->
      
      </ul>
    </div>

  </nav>
</header>
