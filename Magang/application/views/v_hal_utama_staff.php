<html lang="en">
  <head>
    <?php
    function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
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
      <a class="app-header__logo" href="index.html"></a>
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
          <p class="app-sidebar__user-name"> <?php echo $this->session->userdata('nama');?></p>
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
            <i class="app-menu__icon fa fa-table"></i>
            <span class="app-menu__label">Data</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="<?php echo base_url('Admin/data_tabel_staff')?>">
              <i class="icon fab fa-uikit"></i>
              Project Monitoring
              </a>
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
          <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="staff">Dashboard</a></li>
        </ul>
      </div>

      <div>
          <form method="post" action="<?php echo base_url().'Admin/staff';?>">
            <select name="tahun" style="width: 100px; height: 25px;">
                    <option value="<?php echo $search ?>"selected><?php echo $search ?></option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2010; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit" style="height: 25px;">Tahun</button>
          </form>
      </div>

      <div id="kiri">
        <div style="width: 500px;">
            <div class="widget-small primary coloured-icon"><i class="icon far fa-building fa-3x"></i>
              <div class="info">
                <h4>Nilai Total Estimasi Pendapatan</h4>
                <?php
                  foreach ($hasil_estimasi->result() as $row) {
                    ?>
                    <p><b><?php echo rupiah($row->tot_esti); ?></b></p>
                  <?php
                  }
                ?>
              </div>
            </div>
        </div>

        <div style="width: 500px;">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-check fa-3x"></i>
              <div class="info">
                <h4>Nilai Total Pendapatan(SPK)</h4>
                <?php
                  foreach ($hasil_real->result() as $row) {
                    ?>
                    <p><b><?php echo rupiah($row->tot_real); ?></b></p>
                  <?php
                  }
                ?>
              </div>
            </div>
        </div>
      </div>

      <div id="kanan">
        <div id="piechart" style="width:500px; height: 300px;">
          <?php
              $data_string = '';
              foreach($data as $key=>$data){
              $string = ($key == "tot_real")?"Total Pendapatan SPK":"Total Estimasi Pendapatan";
              $warna = ($key == "tot_real")?"#76A7FA":"#e5e4e2";
              $data_string .= "['$string'".",". $data ."],";
              }
          ?>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  <?php
                  echo $data_string;
                  ?>
              ]);
              var options = {
                colors: ['#ff1744', '#00e676'],
              };
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data,options);
            }
          </script>
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
