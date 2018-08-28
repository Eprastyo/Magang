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
  <h5>TANGERANG SELATAN (BSD)</h5>
  </td>
</tr>

<div class="container">    
    <div class="row">
      <div class="col-sm-12">
       <h3 style="font-weight:bold"><?php if(isset($subject)) { echo $subject; }?></h3>
       <label>Nama PIC : </label><?php if(isset($nama_pic)) { echo $nama_pic; }?><br>
       <label>Tanggal  : </label><?php if(isset($tanggal)) { echo $tanggal; }?>
      </div>
    </div>
</div>
</table>
<br>
<br>
<br>
<table align="center" width="100%">
<tr>
  <th width="20%" align="left">Nama Project</th>
  <th width="30%" align="left">Instansi</th>
  <th width="30%" align="left">Rincian</th>
  <th width="20%" align="left">Progres(%)</th>
</tr>
<tr>
  <td width="20%"><?php if(isset($nama_project)) { echo $nama_project; }?></td>
  <td width="30%"><?php if(isset($instansi)) { echo $instansi; }?></td>
  <td width="30%"><?php if(isset($rincian)) { echo $rincian; }?></td>
  <td width="20%"><?php if(isset($progres)) { echo $progres; }?></td>
</tr>
</table>
</body>
</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>