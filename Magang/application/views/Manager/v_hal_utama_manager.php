<html lang="en">
  <head>
    <?php
    function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
    }
    function uang($angka){
      $hasil_rupiah = number_format($angka,2,',','.');
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
      <a class="app-header__logo" href="">
          <p class="app-sidebar__user-designation"></p>
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
          <h1><i class="fas fa-tachometer-alt"></i>Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="manager">Dashboard</a></li>
        </ul>
      </div>

      <div>
          <form method="post" action="<?php echo base_url().'Manager/manager';?>">
            <label>Pilih :</label>
            <select name="tahun" style="width: 100px; height: 25px;">
                    <option value="<?php echo $search ?>"selected><?php echo $search ?></option>
                <?php  
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x >= 2016; $x--) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit" style="height: 25px;">Tahun</button>
          </form>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-6">
          <div class="widget-small primary coloured-icon"><i class="icon far fa-building fa-3x"></i>
            <div class="info">
                <h4>Nilai Total Planning Pekerjaan <?php echo $search ?></h4>
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

        <div class="col-md-6 col-lg-6">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-check fa-3x"></i>
              <div class="info">
                <h4>Nilai Total Pendapatan(SPK) <?php echo $search ?></h4>
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
      
      <div class="row">
         <div class="col-md-6 col-lg-6">
                <label><b>GRAFIK PERBANDINGAN PLANNING DENGAN PENDAPATAN (SPK) <?php echo $search ?></b></label>
                <div id="piechart" style="height: 35%;width: 100%;">
                  <?php
                      $data_string = '';    
                      foreach($data as $key=>$data){
                      $string = ($key == "tot_real")?"Total Pendapatan SPK":"Total Planning Pekerjaan";
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

           <div class="col-md-6 col-lg-6">
                <label><b>GRAFIK PENDAPATAN PERSONAL IN CHARGE <?php echo $search ?></b></label>
                <canvas id="myChart" style="background-color: white;">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                  <?php
                      foreach($hasil as $data){
                          $nama_pic[] = $data->nama_pic;
                          $tot_real[] = $data->tot_real;
                      }
                  ?>
                <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                ctx.width = 200;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode ($nama_pic);?>,
                        datasets: [{
                            data: <?php echo json_encode ($tot_real);?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                              ticks: {
                              beginAtZero:true,
                              userCallback: function(value, index, values) {
                                  value = value.toString();
                                  value = value.split(/(?=(?:...)*$)/);
                                  value = value.join('.');
                                  return value;
                              }
                            }
                        }]

                      },
                      title: {
                        display: true,
                        position: 'left',
                        text: 'Nilai SPK'
                      },
                      legend: {
                        labels: {
                          filter: function(legendItem, chartData) {
                          }
                          }
                      }
                    }
                });
                </script>
              </canvas>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-6">
            <label><b>GRAFIK PERBANDINGAN PENDAPATAN PER DIVISI <?php echo $search ?></b></label>
            <div id="asd" style="height: 35%;width: 100%;"></div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <?php  
              $pie = "";
              foreach($h_pie as $pie_h){
              $pie .= "['$pie_h->divisi'".",". $pie_h->tot_real."],";
              }
          ?>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php echo $pie ?>
            ]);

            var options = {
              pieHole: 0.5
            };

            var chart = new google.visualization.PieChart(document.getElementById('asd'));

            chart.draw(data, options);
          }
        </script>
        <div class="col-md-6 col-lg-6">
          <label><b>NILAI PENDAPATAN PERSONAL IN CHARGE <?php echo $search ?></b></label>
          <div style="height: 35%;width: 100%;background-color: white;">
                  <div class="table-responsive">
                  <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama PIC</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    $no_urut = 1;
                    foreach ($hasil_tabel as $data) {
                    ?>
                    <tr>
                      <td><?php echo $no_urut++ ?></td>
                      <td><?php echo $data->nama_pic?></td>
                      <td><?php echo uang($data->tot_real)?></td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                  </table>
                </div>
          </div>
        </div>

        <div id="detail-pendapatan" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <h4 class="modal-title">Tabel Pendapatan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                    <div class="card-mb">  
                        <div class="table-responsive">
                          <table id="example" class="table table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama PIC</th>
                              <th>Jumlah</th>
                            </tr>
                          </thead>

                          <tbody>
                          <?php
                          $no_urut = 1;
                          foreach ($hasil_tabel as $data) {
                          ?>
                          <tr>
                            <td><?php echo $no_urut++ ?></td>
                            <td><?php echo $data->nama_pic?></td>
                            <td><?php echo uang($data->tot_real)?></td>
                          </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                        </table>
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

            </div>
          </div>
        </div>
      </div>   
    </main>
    <script src="<?php echo base_url('assets/docs/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/docs/js/main.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/datatables.min.js')?>"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable(
      {
        "order": [[1, "asc" ]],
        "autoWidth": false,
        "pageLength": 2,
        "searching": false,
        "bLengthChange": false,
        "bInfo" : false,
        "dom": '<"toolbar">frtip'
    });
     $("div.toolbar").html('<form method="get" action="detail-pendapatan"><label data-toggle="modal" data-target="#detail-pendapatan" style="color: #16a085;background-color: transparent;">Detail</label></form>');
    });
    </script>
    <style type="text/css">
    .toolbar {
    position: absolute;
    bottom: 0;
    right: 23;
    top: 185;
    }
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 80%;
        height:100%;
        margin-top: 2%;
        margin-left: 10%;
    }
 
    tr { height: 30%; }
    </style>
  </body>
</html>

