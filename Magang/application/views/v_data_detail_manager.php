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
      <a class="app-header__logo" href="manager">
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
        <li class="treeview">
          <a class="app-menu__item" href="" data-toggle="treeview">
            <i class="app-menu__icon fas fa-table"></i>
            <span class="app-menu__label">Data</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_tabel')?>">
              <i class="icon fab fa-uikit"></i>
              Utama
              </a>
            </li>
             <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/daily_report_manager')?>">
              <i class="icon fab fa-uikit"></i>
              Daily Report
              </a>
            </li>
             <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/monitoring_kerja')?>">
              <i class="icon fab fa-uikit"></i>
              Project Monitoring
              </a>
            </li>
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_department')?>">
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
          <h1><i class="app-menu__icon fa fa-table"></i>Detail Report</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="data_tabel">Detail Report</a></li>
        </ul>
      </div>


      <div style="width: 100%;" >
        <div class="btn-group">
         <form action="daily_report_manager">
             <button type="submit"class="btn btn-default" style="background-color: #e91e63;color: white;"><i class="icon fas fa-chevron-left"></i>Kembali
             </button>
         </form>
         <form method="get" action="tambah_data">
              <button class="btn btn-default" type="button" data-toggle="modal" data-target="#report"  style="color: white;background-color: #03a9f4"><i class="icon far fa-calendar-plus"></i>Tambah Rincian
              </button>
          </form>
        </div>
      </div>

        <div id="report" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Update Progres</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                 <form action="<?php echo base_url(). 'Admin/tambah_data_report'; ?>" method="post">
                    <div class="card-mb">
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Nama PIC</label>
                          <?php
                          foreach($t_data_input as $row)
                          {
                          ?>
                          <input type="text" name="nama_pic" class="form-control" value="<?php echo $row->nama_pic ?>" readonly>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Nama Pekerjaan</label>
                          <?php
                          foreach($t_data_input as $row)
                          {
                          ?>
                          <input type="text" name="nama_project" class="form-control" value="<?php echo $row->nama_project ?>" readonly>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Instansi</label>
                          <?php
                          foreach($t_data_input as $row)
                          {
                          ?>
                          <input type="text" name="instansi" class="form-control" value="<?php echo $row->instansi ?>" readonly>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-15">
                          <label for="usr">Rincian Pekerjaan</label>
                            <script src="<?php echo base_url('assets/docs/tinymce/js/tinymce.min.js')?>"></script>
                            <script>tinymce.init({ selector:'textarea' });</script>
                            <textarea name="rincian" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="usr">Progress</label>
                          <input type="number" name="progres" class="form-control">
                        </div>
                      </div>
                      <input type="hidden" name="tanggal_update" value="<?php echo date ("Y-m-d h:i:sa")?>">
                      <div class="form-group">
                        <div class="col-sm-5">
                          <button type="submit" style="background-color: #03a9f4;color: white" name="upload" class="btn btn-default" >Report</button>
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
                <td><?php echo $hasil->tanggal_update ?></td>
                <td>
                    <a href="edit_progres_utama_manager?no=<?php echo $hasil->no;?>">
                      <button class="btn btn-default" style="background-color: #7ed6df;">Update</button>
                    </a>
                    <a href="tampil_log_manager?nama_pic=<?php echo $hasil->nama_pic;?>&nama_project=<?php echo $hasil->nama_project?>&instansi=<?php echo $hasil->instansi?>">
                      <button class="btn btn-default" style="background-color: #badc58;">LOG</button>
                    </a>
                </td>
              </tr>
              <?php
              }
              ?>
              </tbody>

              <thead style="background-color: #f6e58d;">
                <tr>
                  <th>Rincian</th>
                  <th>Progress</th>
                  <th>Tanggal Update Progres</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody">
              <?php
              $no_urut = 1;
              foreach ($prog_detail as $h) {
              ?>
              <tr>
                <td><?php echo $h->rincian ?></td>
                <td><?php echo $h->progres."%" ?></td>
                <td><?php echo $h->tgl_update ?></td>
                <td>
                    <a href="<?php echo base_url('Admin/edit_progres_manager/'.$h->id_detail);?>">
                      <span class="fa fa-edit fa-lg" style="color: #03a9f4"></span>
                    </a>
                    <a href="hapus_rincian?id_detail=<?php echo $h->id_detail;?>&nama_project=<?php echo $h->nama_project?>&instansi=<?php echo $h->instansi?>&nama_pic=<?php echo $h->nama_pic?>">
                      <span class="fas fa-trash fa-lg" style="color: #ff7979"></span>
                    </a>
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
  </body>
</html>
