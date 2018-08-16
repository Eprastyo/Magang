<html lang="en">
  <head>
    <title>Magang</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/docs/css/main.css')?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="<?php echo base_url ('assets/docs/font-awesome/css/all.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/datatables.min.css')?>">

  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="admin">
        <p></p>
      </a>
      <a class="app-sidebar__toggle fas fa-bars" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
            <?php echo $this->session->userdata('nama');?>
            <i class="fas fa-user fa-lg"></i>
          </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
            <li><a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/14691064_1126674984081042_7683922444718356585_n.png?_nc_cat=0&oh=8da3a15e5c5227e8b686de6905046eec&oe=5BD20F44" alt="User Image" style="width: 25%;">
        <div>
          <p class="app-sidebar__user-name"><?php echo $this->session->userdata('nama');?></p>
          <p class="app-sidebar__user-designation"><?php echo $this->session->userdata('status');?></p>
        </div>
      </div>

      <ul class="app-menu">
        <li>
          <a class="app-menu__item active" href="staff">
            <i class="app-menu__icon fas fa-tachometer-alt"></i>
            <span class="app-menu__label">Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="" data-toggle="treeview">
            <i class="app-menu__icon fas fa-table"></i>
            <span class="app-menu__label">Data</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_tabel_staff')?>">
                <i class="icon fab fa-uikit"></i>Project Monitoring</a>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/daily_report')?>">
              <i class="icon fab fa-uikit"></i>
              Daily Report
              </a>
            </li>
          </ul>
        </li>
      </ul>

    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-table"></i>Daily Report</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="data_tabel">Daily Report</a></li>
        </ul>
      </div>

      <div style="width: 100%;" >
        <div class="btn-group">
        <?php
              foreach ($data_log as $hasil) {
        ?>
        </div>
      </div>
        <div class="card-body" style="background-color: #f5f6fa">
          <div class="table-responsive">
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr"><b>Rincian Pekerjaan</b></label></br></br>
                  <label readonly><?php echo $hasil->rincian_log ?></label>
                 <!--  <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                  <script>tinymce.init({ selector:'textarea' });</script> -->
                 <!--  <textarea name="rincian" class="form-control" readonly><?php echo $hasil->rincian_log ?></textarea> -->
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr"><b>Komentar Manager</b></label></br></br>
                  <label readonly><?php echo $hasil->komentar ?></label>
                  <!-- <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                  <script>tinymce.init({ selector:'textarea' });</script>
                  <textarea name="rincian" class="form-control"><?php echo $hasil->komentar?></textarea> -->
                </div>
              </div>                      
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url('assets/docs/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/main.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/datatables.min.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable(
      {
        "order": [[5, "desc" ]],
        "autoWidth": false,
        "pageLength": 10,
        "searching": false,
        "bLengthChange": false,
        "bInfo" : false,
        "dom": '<"toolbar">frtip'
    });
    });
    </script>
    <style type="text/css">
      #kiri
      {
      width:50%;
      height:100px;
      float:left;
      }
      #kanan
      {
      width:50%;
      height:100px;
      float:right;
      }
    </style>
  </body>
</html>
