<div class="content-wrapper">
            <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

<div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Input Data Pengajuan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                      <form method="POST" enctype="multipart/form-data">
                      <label class="form-label" for="basic-default-password32">Tanggal Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="date" name="tgl_pengajuan" class="form-control" placeholder="Masukkan Tanggal"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Nama Pengaju :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="nm_pengaju" class="form-control" readonly="" value="<?php echo"$ru[nm_user]" ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Jumlah Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="jumlah" class="form-control" placeholder="Rp.000.000" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Lama Angsuran :</label>
                      <div class="input-group input-group-merge">
                      <input type="number" name="lama" class="form-control" placeholder="0" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File KTP :</label>
                      <div class="input-group">
                      <input type="file" name="ktp" class="form-control" id="inputGroupFile2"/>
                      <label class="input-group-text" for="inputGroupFile2">Upload</label>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File Jaminan :</label>
                      <div class="input-group">
                      <input type="file" name="jaminan" class="form-control" id="inputGroupFile3"/>
                      <label class="input-group-text" for="inputGroupFile3">Upload</label>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File Foto :</label>
                      <div class="input-group">
                      <input type="file" name="foto" class="form-control" id="inputGroupFile4"/>
                      <label class="input-group-text" for="inputGroupFile4">Upload</label>
                      </div>&nbsp;<br>

                      <div class="input-group">
                        <center><input type="submit" class="btn btn-primary" name="simpan" value="Simpan Data">
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
  $nm_ktp                 = $_FILES['ktp']['name'];
  $nm_jaminan             = $_FILES['jaminan']['name'];
  $nm_foto                = $_FILES['foto']['name'];

  $x1                     = explode('.', $nm_ktp);
  $x2                     = explode('.', $nm_jaminan);
  $x3                     = explode('.', $nm_foto);

  $ekstensi1              = strtolower(end($x1));
  $ekstensi2              = strtolower(end($x2));
  $ekstensi3              = strtolower(end($x3));

  $ukuran_ktp             = $_FILES['ktp']['size'];
  $ukuran_jaminan         = $_FILES['jaminan']['size'];
  $ukuran_foto            = $_FILES['foto']['size'];

  $file_tmp1              = $_FILES['ktp']['tmp_name'];
  $file_tmp2              = $_FILES['jaminan']['tmp_name'];
  $file_tmp3              = $_FILES['foto']['tmp_name'];

  $angka_acak             = rand(1,9999);

  $nm_ktp_baru              = $angka_acak.'-'.$nm_ktp;
  $nm_jaminan_baru          = $angka_acak.'-'.$nm_jaminan;
  $nm_foto_baru             = $angka_acak.'-'.$nm_foto;

  $folder                   = "Dokumen/";

  if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp1, $folder .$nm_ktp_baru);
          move_uploaded_file($file_tmp2, $folder .$nm_jaminan_baru);
          move_uploaded_file($file_tmp3, $folder .$nm_foto_baru);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Insert into tbl_pengajuan (tgl_pengajuan, nm_pengaju, jumlah, lama, cicilan, ktp, jaminan, foto, status) values('$_POST[tgl_pengajuan]','$_POST[nm_pengaju]','$_POST[jumlah]','$_POST[lama]','$cicilan','$nm_ktp_baru','$nm_jaminan_baru','$nm_foto_baru','Proses Pengajuan') ");

          if($query){
            echo"<script language = 'JavaScript'> confirm('Data Pengajuan Berhasil Disimpan!'); document.location='index.php?page=data_pengajuan';</script>";
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