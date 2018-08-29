<html>
<head>
</head>
<body>
<table width="100%">
<tr>
<td width="50%"align="right">
  <img src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/14691064_1126674984081042_7683922444718356585_n.png?_nc_cat=0&oh=8da3a15e5c5227e8b686de6905046eec&oe=5BD20F44" class="img-responsive" width="20%">
</td>
  <td width="50%"align="left">
  <h3>PT.TIME EXCELINDO</h3>
  </td>
</tr>
</table>

<div class="container">    
    <div class="row">
      <div class="col-sm-12">
       <h3 style="font-weight:bold"><?php if(isset($subject)) { echo $subject; }?></h3>
       <h4><label>Update By : </label><?php if(isset($update_by)) { echo $update_by; }?></h4>
       <h4><label>Tanggal  : </label><?php if(isset($tanggal)) { echo $tanggal; }?></h4>
      </div>
    </div>
</div>
<div id="container" style="margin-top: 5%;">
  <div class="row">
     <table style="width: 100%;">
              <tr>
                  <th style="width: 10%;text-align: left;">PIC</th>
                  <th style="width: 20%;text-align: left;">Nama Project</th>
                  <th style="width: 20%;text-align: left;">Instansi</th>
                  <th style="width: 10%;text-align: left;">Rincian Log</th>
                  <th style="width: 10%;text-align: left;">Progres(%)</th>
                  <th style="width: 10%;text-align: left;">Tanggal Update</th>
                  <th style="width: 10%;text-align: left;">Komentar</th>
              </tr>

              <?php
              foreach ($all_log as $hasil) {
              ?>
              <tr>
                <td style="width: 10%;text-align: left;"><?php echo $hasil->nama_pic ?></td>
                <td style="width: 20%;text-align: left;"><?php echo $hasil->nama_project ?></td>
                <td style="width: 20%;text-align: left;"><?php echo $hasil->instansi ?></td>
                <td style="width: 10%;text-align: left;"><?php echo $hasil->rincian_log ?></td>
                <td style="width: 10%;text-align: left;"><?php echo $hasil->progress_log ?></td>
                <td style="width: 10%;text-align: left;"><?php echo $hasil->update_log ?></td>
                <td style="width: 10%;text-align: left;"><?php echo $hasil->komentar?></td>
              </tr>
              <?php
              }
              ?>
    </table>
  </div>
</div>
</body>
</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>