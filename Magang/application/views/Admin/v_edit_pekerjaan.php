<html lang="en">
  <head>
    <?php
    function rupiah($angka){
      
      $hasil_rupiah = "" . number_format($angka,2,',','.');
      return $hasil_rupiah;
     
    }
    ?>
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
          <a class="app-menu__item active" href="">
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
              <a class="treeview-item" href="<?php echo base_url('Admin/data_tabel')?>">
                <i class="icon fab fa-uikit"></i>Utama</a>
            </li>
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/monitoring_kerja')?>">
                <i class="icon fab fa-uikit"></i>Project Monitoring</a>
            </li>
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_department')?>">
                <i class="icon fab fa-uikit"></i>Department</a>
            </li>
          </ul>
        </li>
      </ul>

    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-table"></i>Edit Data</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="">Edit Data</a></li>
        </u>
      </div>

      <div class="row">
        <div class="card-body">
        <?php foreach($t_data_utama as $u){ ?>
        <form action="<?php echo base_url(). 'Admin/update_pekerjaan'; ?>" method="post">
          <div class="card-mb">
              <div class="form-group">
                <div class="col-sm-5">
                  <label for="usr"></label>
                  <input type="hidden" name="no" value="<?php echo $u->no ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-5">
                  <label for="usr">Kode Project</label>
                  <input type="text" name="kode_project" value="<?php echo $u->kode_project ?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-5">
                  <label for="usr">Nama PIC</label>
                  <input type="text" name="nama_pic" value="<?php echo $u->nama_pic ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="usr">Nama Project</label>
                  <input type="text" name="nama_project" class="form-control" value="<?php echo $u->nama_project ?>" >
              </div>
                </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="usr">Instansi</label>
                  <input type="text" name="instansi" class="form-control" value="<?php echo $u->instansi ?>" >
                </div>
              </div>
              <div class="form-group">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="usr">Status Pekerjaan</label>
                       <select class="form-control" name="status">
                        <?php 
                            echo '<option value="'.$u->status.'" selected>'.$u->status.'</option>';
                        ?>
                         <option value="Closed">Closed</option>
                         <option value="Development">Development</option>
                         <option value="Failed">Failed</option>
                       </select>
                    </div>
                  </div>
               </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="usr">No SPK</label>
                  <input type="number" name="no_spk" class="form-control" value="<?php echo $u->no_spk ?>" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <label for="usr">Tanggal SPK</label>
                  <input type="date" name="tgl_spk" class="form-control" value="<?php echo $u->tgl_spk ?>" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                <label for="comment">Informasi Pekerjaan</label>
                <textarea class="form-control" rows="5" name="info"><?php echo $u->info?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-5">
                  <button type="submit" style="background-color: #0abde3;color: white" name="Simpan" class="btn btn-default">Update
                  </button>
                  <button class="btn btn-default" style="background-color: #e91e63;color: white" onclick= "goBack()" >Cancel</button>
                </div>
              </div>
          </div>
        </form>
        <?php } ?>
        </div>
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

    function goBack() {
    window.history.go(-2);
    }
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