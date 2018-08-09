<?php
$tgl1 = "2013-01-23";
$tgl2 = date('Y-m-d', strtotime('-5 days', strtotime($tgl1)));
echo $tgl2;
?>