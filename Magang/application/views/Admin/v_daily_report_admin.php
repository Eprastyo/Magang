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
          <a class="app-menu__item active" href="admin">
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
              <a class="treeview-item" href="<?php echo base_url('Admin/data_tabel_admin')?>">
              <i class="icon fab fa-uikit"></i>
              Utama
              </a>
            </li>
             <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/daily_report_admin')?>">
              <i class="icon fab fa-uikit"></i>
              Daily Report
              </a>
            </li>
           <!--   <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/monitoring_kerja')?>">
              <i class="icon fab fa-uikit"></i>
              Project Monitoring
              </a>
            </li> -->
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_department_admin')?>">
              <i class="icon fab fa-uikit"></i>
              Department
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
        <div class="card-body" style="background-color: #f5f6fa">
          <div class="table-responsive">
            <table id="example" class="table" style="width:100%;">
              <thead style="background-color: #f6e58d;">
                <tr>
                  <th>No</th>
                  <th>Nama PIC</th>
                  <th>Nama Project</th>
                  <th>Instansi</th>
                  <th>Progress</th>
                  <th>Tanggal Update</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
              <?php
              $no_urut = 1;
              foreach ($t_data_report as $hasil) {
              ?>
              <tr>
                <td><?php echo $no_urut++ ?></td>
                <td><?php echo $hasil->nama_pic ?></td>
                <td><?php echo $hasil->nama_project ?></td>
                <td><?php echo $hasil->instansi ?></td>
                <td><?php echo $hasil->progres."%" ?></td>
                <?php
                $tgl_akhir  = new DateTime(date(".".$hasil->tanggal.""));
                $tgl_hitung = new DateTime(date("Y-m-d H:i:s"));
                $difference = $tgl_hitung->diff($tgl_akhir);
                if($difference->days >= 4){
                ?>
                  <td><label style="background-color: #eb4d4b;font: white;"><?php echo $hasil->tanggal ?></label></td>
                <?php
                }else{
                ?>
                  <td><label style="background-color: #badc58;font: white;"><?php echo $hasil->tanggal ?></label></td>
                <?php
                }
                ?>
                
                <td>
                  <center>
                     <a href="detail_project_admin?instan=<?php echo $hasil->instansi;?>&nama=<?php echo $hasil->nama_pic;?>&project=<?php echo $hasil->nama_project;?>">
                       <button class="btn btn-default" style="background-color: #f6e58d;">Detail</button>
                     </a>
                     <a href="hapus_prog_utama?no=<?php echo $hasil->no;?>&nama_pic=<?php echo $hasil->nama_pic;?>&nama_project=<?php echo $hasil->nama_project;?>&instansi=<?php echo $hasil->instansi;?>&progres=<?php echo $hasil->progres;?>">
                       <button class="btn btn-default" style="background-color: #ff7979;">Delete</button>
                     </a>
                  </center>
                </td>
              </tr>
              <?php
              }
              ?>
              </tbody>

            </table>
          </div>
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
    $('#example').DataTable(
      {
        "order": [[4, "desc" ]],
        "autoWidth": false,
        "pageLength": 20,
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
