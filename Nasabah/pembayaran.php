<?php 
include"../koneksi.php";
$sqlp = mysqli_query($con,"select * from tbl_kredit where id_kredit = $_GET[idp]");
$rp = mysqli_fetch_array($sqlp);

$sqlpe = mysqli_query($con,"select * from tbl_pengajuan where id_pengajuan = $rp[id_pengajuan]");
$rpe = mysqli_fetch_array($sqlpe);
?>

<div class="content-wrapper">
            <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

<div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Form Pembayaran</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                      <form method="POST" enctype="multipart/form-data">
                      <label class="form-label" for="basic-default-password32">Tanggal Bayar :</label>
                      <div class="input-group input-group-merge">
                      <input type="date" name="tgl_bayar" class="form-control" readonly value="<?php echo date('Y-m-d') ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">No Referensi :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="no_ref" class="form-control" readonly="" value="<?php echo"$rp[no_ref]" ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Nama Nasabah :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="nm_user" class="form-control" readonly="" value="<?php echo"$ru[nm_user]" ?>"/>

                      <input type="hidden" name="id_user" value="<?php echo"$ru[id_user]" ?>"/>
                      <input type="hidden" name="id_kredit" value="<?php echo"$rp[id_kredit]" ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Jumlah Bayar :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="jml_bayar" class="form-control" readonly value="<?php echo"$rpe[cicilan]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Bukti Bayar :</label>
                      <div class="input-group input-group-merge">
                      <input type="file" name="bukti" class="form-control" />
                      </div>&nbsp;<br>

                      
                      <div class="input-group">
                        <center><input type="submit" class="btn btn-primary" name="simpan" value="Simpan Pembayaran">
                        <input type="reset" class="btn btn-dark" name="reset" value="Reset Data"></center>
                      </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
  include"../koneksi.php";

  $ekstensi_diperbolehkan = array('pdf','png','jpg','jpeg');
  $nm_bukti                = $_FILES['bukti']['name'];
  $x                      = explode('.', $nm_bukti);
  $ekstensi              = strtolower(end($x));
  $ukuran_bukti          = $_FILES['bukti']['size'];
  $file_tmp              = $_FILES['bukti']['tmp_name'];
  $angka_acak             = rand(1,9999);
  $nm_bukti_baru          = $angka_acak.'-'.$nm_bukti;
  $folder                 = "Dokumen/";

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran_bukti < 2044070){
          move_uploaded_file($file_tmp, $folder .$nm_bukti_baru);

          $sisa_lama = $rp['sisa_lama'] - 1;
          $sisa_bayar = $rp['total'] - $_POST['jml_bayar'];

          $query = mysqli_query($con,"update tbl_kredit set sisa_lama = '$sisa_lama', total = '$sisa_bayar' where id_kredit = '$_GET[idp]' ");

          $query = mysqli_query($con,"Insert into tbl_bayar (id_kredit, id_user, tgl_bayar, jml_bayar, bukti) values('$_POST[id_kredit]','$_POST[id_user]','$_POST[tgl_bayar]','$_POST[jml_bayar]','$nm_bukti_baru') ");

          if($query){
            echo"<script language = 'JavaScript'> confirm('Data Pembayarn Berhasil Disimpan!'); document.location='index.php?page=data_kredit';</script>";
          }else{
            echo"Mohon Maaf, File Pengajuan Gagal Disimpan!";
          }
      }else{
        echo"Mohon Maaf, File Yang Anda Upload Terlalu Besar!";
      }
  }else{
    echo"Mohon Maaf, Ekstensi File Yang Anda Upload Salah!";
  }

}

?>