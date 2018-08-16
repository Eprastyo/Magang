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
         <!--  <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Staff/data_tabel_staff')?>">
                <i class="icon fab fa-uikit"></i>Project Monitoring</a>
            </li>
          </ul> -->
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Staff/daily_report_staff')?>">
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
          <h1><i class="app-menu__icon fa fa-table"></i>Update Progres</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="data_tabel">Update Progres</a></li>
        </ul>
      </div>
      <div class="card-body" style="background-color: #f5f6fa">
        <form action="<?php echo base_url().'Staff/tambah_log_staff'; ?>" method="post" enctype="multipart/form-data">
          <div class="card-mb">
            <?php foreach($edit_prog as $u){ ?>
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr">Nama Project</label>
                  <input type="text" name="nama_project" value="<?php echo $u->nama_project ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr">Nama PIC</label>
                  <input type="text" name="nama_pic" value="<?php echo $u->nama_pic ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr">Instansi</label>
                  <input type="text" name="instansi" value="<?php echo $u->instansi ?>" class="form-control" readonly>
                </div>
              </div>
                <input type="hidden" name="tgl_update" value="<?php echo date ("Y-m-d H:i:s")?>">
              <?php } ?>
              <div class="form-group">
                <div class="col-sm-7">
                  <label for="usr">Rincian Pekerjaan</label>
                  <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                  <script>tinymce.init({ selector:'textarea' });</script>
                  <textarea name="rincian" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <label for="usr">Progress (%)</label>
                  <input type="text" name="progres" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <label for="usr">Upload File Attachment</label>
                  <input type="file" name="file"/>
                  <label>*(max 2MB *jpg,png,pdf,docx,pptx</label>
                  <br/><br/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-5">
                  <button type="submit" style="background-color: #0abde3;color: white" name="Simpan" class="btn btn-default">Update
                  </button>
                  <input type="button" style="background-color: #e91e63;color: white" class="btn btn-default" value="cancel" onClick="document.location.href='daily_report_staff';" />
                </div>
              </div>
          </div>
        </form>
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
    $('#example').DataTable();
    });
    </script>
  </body>
</html>
