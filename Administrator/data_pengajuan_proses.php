<?php 
include"../koneksi.php";
$sqlp = mysqli_query($con,"select * from tbl_pengajuan where id_pengajuan = $_GET[idp]");
$rp = mysqli_fetch_array($sqlp);
?>

<div class="content-wrapper">
            <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

<div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Data Pengajuan Nasabah</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                      <form method="POST" enctype="multipart/form-data">
                      <label class="form-label" for="basic-default-password32">Tanggal Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="date" name="tgl_pengajuan" class="form-control" readonly value="<?php echo"$rp[tgl_pengajuan]"; ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Nama Pengaju :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="nm_pengaju" class="form-control" readonly="" value="<?php echo"$rp[nm_pengaju]" ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Jumlah Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="jumlah" class="form-control" readonly value="<?php echo"$rp[jumlah]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Lama Angsuran :</label>
                      <div class="input-group input-group-merge">
                      <input type="number" name="lama" class="form-control" readonly value="<?php echo"$rp[lama]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Cicilan :</label>
                      <div class="input-group input-group-merge">
                      <input type="number" name="cicilan" class="form-control" readonly value="<?php echo"$rp[cicilan]"; ?>" />
                      </div>&nbsp;<br><hr>

                      <label class="form-label" for="basic-default-password32">Keputusan :</label>
                      <div class="input-group input-group-merge">
                      <select name="status" class="form-control">
                        <option>~Pilih Keputusan~</option>
                        <option value="Lolos Administrasi">Lolos Administrasi</option>
                        <option value="Ditunda">Ditunda</option>
                        <option value="Tidak Lolos">Tidak Lolos</option>
                      </select>
                      </div>&nbsp;<br>

                      
                      <div class="input-group">
                        <center><input type="submit" class="btn btn-primary" name="simpan" value="Proses Dokumen">
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

          $query = mysqli_query($con,"update tbl_pengajuan set status = '$_POST[status]' where id_pengajuan = '$_GET[idp]' ");
         
            echo"<script language = 'JavaScript'> confirm('Data Pengajuan Berhasil Diproses!'); document.location='index.php?page=data_pengajuan';</script>";

}

?>