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
          <h1><i class="app-menu__icon fa fa-table"></i>Edit Data</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-table fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="">Edit Data</a></li>
        </u>
      </div>

        <div style="margin-bottom: 1%;">
            <button type="Cancel" class="btn btn-default" style="background-color: #e91e63;color: white;margin-left: 5%;" onclick="goBack();"><i class="icon fas fa-chevron-left"></i>Kembali</button>
        </div>

        <?php foreach($t_data_utama as $u){ ?>
        <form action="<?php echo base_url(). 'Admin/update'; ?>" method="post">
            <input type="hidden" name="no" value="<?php echo $u->no ?>" class="form-control" readonly>
            <div id="kiri">
                  <label for="usr">Nama PIC</label>
                  <input type="text" name="nama_pic" value="<?php echo $u->nama_pic ?>" class="form-control" readonly>

                  <label for="usr">Nama Project</label>
                  <input type="text" name="nama_project" class="form-control" value="<?php echo $u->nama_project ?>" >

                  <label for="usr">Instansi</label>
                  <input type="text" name="instansi" class="form-control" value="<?php echo $u->instansi ?>" >
                  <label for="usr">Type</label>
                       <select class="form-control" name="type">
                        <?php 
                            echo '<option value="'.$u->type.'" selected>'.$u->type.'</option>';
                        ?>
                         <option value="New">New</option>
                         <option value="Existing">Maintenance</option>
                         <option value="Upgrade">Upgrade</option>
                         <option value="Downgrade">Downgrade</option>
                       </select>
                  <label for="usr">Divisi</label>
                       <select class="form-control" name="divisi">
                          <?php 
                          echo '<option value="'.$u->divisi.'" selected>'.$u->divisi.'</option>';
                          foreach($nama_dept as $row)
                          { 
                            echo '<option value="'.$row->nama_department.'">'.$row->nama_department.'</option>'; 
                          }
                          ?>
                       </select>
                  <label for="usr">PIC Instansi</label>
                  <input type="text" name="pic_instansi" class="form-control" value="<?php echo $u->pic_instansi ?>">
                  <label for="usr">No Telp</label>
                  <input type="text" name="no_telp" class="form-control" value="<?php echo $u->no_telp?>">
            </div>
            <div id="kanan">
                  <label for="usr">Kode Project</label>
                  <input type="text" name="kode_project" value="<?php echo $u->kode_project ?>" class="form-control">
                  <label for="usr">Nilai Planning Pekerjaan</label>
                  <input type="text" name="est_pendapatan" id="num" class="form-control" onkeyup="document.getElementById('format1').innerHTML = formatCurrency(this.value);" value="<?php echo $u->esti_pendapatan ?>">
                   <span id="format1" style="background-color: white;"></span><br>
                  <label for="usr">Pendapatan (SPK)</label>
                  <input type="text" name="real_pendapatan" id="num" class="form-control" onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);" value="<?php echo $u->real_pendapatan ?>">
                  <span id="format2" style="background-color: white;"></span>
                  <br>
                  <button  type="submit" style="background-color: #0abde3;color: white;" name="Simpan" class="btn btn-default">Update
                  </button>
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
      width:40%;
      float:left;
      margin-left: 5%;
      }
      #kanan
      {
      width:40%;
      float:right;
      margin-right: 5%;
      }
    </style>
    <script type="text/javascript">
        function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
        num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num*100+0.50000000001);
        cents = num%100;
        num = Math.floor(num/100).toString();
        if(cents<10)
        cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        num = num.substring(0,num.length-(4*i+3))+'.'+
        num.substring(num.length-(4*i+3));
        return (((sign)?'':'-') + 'Rp' + " "+ num + ',' + cents);
        }
    </script>
    <script type="text/javascript">
      function goBack() {
          window.history.back();
      }
    </script>
  </body>
</html>