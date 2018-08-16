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
    </aside>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-table"></i>Data Utama Staff</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="data_tabel">Data Utama Staff</a></li>
        </ul>
      </div>

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                 <form action="<?php echo base_url(). 'Admin/tambah_data_utama'; ?>" method="post">
                    <div class="card-mb">
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Nama PIC</label>
                          <select class="form-control" name="nama">
                          <?php
                          foreach($nama_staff as $row)
                          {
                            echo '<option value="'.$row->nama.'">'.$row->nama.'</option>';
                          }
                          ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Kode Project</label>
                          <input type="text" name="kode_project" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Nama Project</label>
                          <input type="text" name="nama_project" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Instansi</label>
                          <input type="text" name="instansi" class="form-control">
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-5">
                              <label for="usr">Type</label>
                              <select class="form-control" name="type">
                                <option value="New">New</option>
                                <option value="Existing">Existing</option>
                                <option value="Upgrade">Upgrade</option>
                                <option value="Downgrade">Downgrade</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-5">
                              <label for="usr">Divisi</label>
                              <select class="form-control" name="divisi">
                                <?php
                                foreach($nama_dept as $row)
                                {
                                  echo '<option value="'.$row->nama_department.'">'.$row->nama_department.'</option>';
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <!-- <input type="text" name="keterangan" class="form-control"> -->
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Estimasi Pendapatan</label>
                          <input type="text" name="est_pendapatan" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Real Pendapatan</label>
                          <input type="text" name="real_pendapatan" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-5">
                          <label for="usr">Tanggal</label>
                          <input type="date" name="tanggal">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-5">
                          <button type="submit" style="background-color: #03a9f4;color: white" name="upload" class="btn btn-default" >Tambah</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="color: white;background-color: #e91e63">Close
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body" style="background-color: #f5f6fa">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>PIC</th>
                  <th>Nama Project</th>
                  <th>Instansi</th>
                  <th>Pagu</th>
                  <th>Pendapatan (SPK)</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Info Pekerjaan</th>
                  <th>No SPK</th>
                  <th>Tanggal SPK</th>
                  <th>Update Project</th>
                </tr>
              </thead>

              <tbody>
              <?php
              $no_urut = 1;
              foreach ($t_data_utama as $hasil) {
              ?>
              <tr>
                <td><?php echo $no_urut++ ?></td>
                <td><?php echo $hasil->nama_pic ?></td>
                <td><?php echo $hasil->nama_project ?></td>
                <td><?php echo $hasil->instansi ?></td>
                <td><?php echo rupiah($hasil->esti_pendapatan) ?></td>
                <td><?php echo rupiah($hasil->real_pendapatan) ?></td>
                <td><?php echo $hasil->tanggal ?></td>
                <td><?php echo $hasil->status ?></td>
                <td><?php echo $hasil->info ?></td>
                <td><?php echo $hasil->no_spk ?></td>
                <td><?php echo $hasil->tgl_spk ?></td>
                <td>
                  <center>
                     <a href="<?php echo base_url('Admin/edit_info_staff/'.$hasil->no);?>">
                      <span class="fa fa-edit fa-lg" style="color: #03a9f4"></span>
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
    $('#example').DataTable();
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
