<?php
include"../koneksi.php";
$query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_GET[id]'");
$data_file = $query->fetch_array();

mysqli_query($con,"Delete from tbl_pengajuan where id_pengajuan = '$_GET[id]'");

unlink('Dokumen/'.$data_file['ktp']);
unlink('Dokumen/'.$data_file['jaminan']);
unlink('Dokumen/'.$data_file['foto']);

echo"<script language = 'JavaScript'> document.location='index.php?page=data_pengajuan';</script>";

?>