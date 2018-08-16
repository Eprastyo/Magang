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
          <a class="app-menu__item active" href="manager">
            <i class="app-menu__icon fas fa-tachometer-alt"></i>
            <span class="app-menu__label">Dashboard</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item active" href="daily_report_manager">
            <i class="app-menu__icon fas fa-receipt"></i>
            <span class="app-menu__label">Daily Report</span>
          </a>
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
           <div class="form-group">
                <div class="col-sm-7">
                    <label for="usr">Rincian Pekerjaan</label>
                    </br>
                    </br>
                    <label><?php echo $hasil->rincian_log ?></label>
                   <!--  <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                    <script>tinymce.init({ selector:'textarea' });</script>
                    <textarea name="rincian" class="form-control"><?php echo $hasil->detail_rincian ?></textarea> -->
                </div>
           </div>            
           <div class="form-group">
              <div class="col-sm-5">
                <form method="get" action="">
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#komentar" style="color: white;background-color: #03a9f4"><i class="fas fa-plus-circle"></i> Komentar
                    </button>
                </form>
              </div>
           </div>

           <div id="komentar" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Komentar</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo base_url(). 'Manager/tambah_komentar'; ?>" method="post">
                             <div class="form-group">
                              <?php
                              foreach ($data_log as $hasil) {
                              ?>
                                <input type="hidden" name="id_log" value="<?php echo $hasil->id_log ?>">
                                <div class="col-sm-15">
                                    <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                                    <script>tinymce.init({ selector:'textarea' });</script>
                                    <textarea name="komentar" class="form-control"><?php echo $hasil->komentar ?></textarea>
                                </div>
                              <?php
                              }
                              ?>
                              </div>

                              <div class="form-group">
                                        <button class="btn btn-default" type="submit" style="color: white;background-color: #03a9f4"><i class="far fa-save fa-2x"></i>
                                        </button>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="color: white;background-color: #e91e63">Close
                          </button>
                      </div>
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
