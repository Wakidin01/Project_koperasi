<?php
include"../koneksi.php";
$sqlp = mysqli_query($con,"select * from tbl_pengajuan where id_pengajuan = $_GET[id]");
$rp = mysqli_fetch_array($sqlp);
?>

<div class="content-wrapper">
            <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

<div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Update Data Pengajuan</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">

                      <form method="POST" enctype="multipart/form-data">
                      <label class="form-label" for="basic-default-password32">Tanggal Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="hidden" name="id_pengajuan" value="<?php echo"$rp[id_pengajuan]"; ?>" />
                      <input type="date" name="tgl_pengajuan" class="form-control" value="<?php echo"$rp[tgl_pengajuan]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Nama Pengaju :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="nm_pengaju" class="form-control" readonly="" value="<?php echo"$ru[nm_user]" ?>"/>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Jumlah Pengajuan :</label>
                      <div class="input-group input-group-merge">
                      <input type="text" name="jumlah" class="form-control" value="<?php echo"$rp[jumlah]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Lama Angsuran :</label>
                      <div class="input-group input-group-merge">
                      <input type="number" name="lama" class="form-control" value="<?php echo"$rp[lama]"; ?>" />
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File KTP : (<?php echo"<a href='Dokumen/$rp[ktp]' target='_blank'>$rp[ktp]</a>"; ?>)</label>
                      <div class="input-group">
                      <input type="file" name="ktp" class="form-control" id="inputGroupFile2"/>
                      <label class="input-group-text" for="inputGroupFile2">Upload</label>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File Jaminan : (<?php echo"<a href='Dokumen/$rp[jaminan]' target='_blank'>$rp[jaminan]</a>"; ?>)</label>
                      <div class="input-group">
                      <input type="file" name="jaminan" class="form-control" id="inputGroupFile3"/>
                      <label class="input-group-text" for="inputGroupFile3">Upload</label>
                      </div>&nbsp;<br>

                      <label class="form-label" for="basic-default-password32">Upload File Foto : (<?php echo"<a href='Dokumen/$rp[foto]' target='_blank'>$rp[foto]</a>"; ?>)</label>
                      <div class="input-group">
                      <input type="file" name="foto" class="form-control" id="inputGroupFile4"/>
                      <label class="input-group-text" for="inputGroupFile4">Upload</label>
                      </div>&nbsp;<br>

                      <div class="input-group">
                        <center><input type="submit" class="btn btn-primary" name="simpan" value="Update Data">
                        <a href="index.php?page=data_pengajuan" class="btn btn-success">Cancel</a></center>
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

  
  if(!$file_tmp1=="" && !$file_tmp2=="" && !$file_tmp3==""){
  if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp1, $folder .$nm_ktp_baru);
          move_uploaded_file($file_tmp2, $folder .$nm_jaminan_baru);
          move_uploaded_file($file_tmp3, $folder .$nm_foto_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['ktp']);
          unlink('Dokumen/'.$data_file['jaminan']);
          unlink('Dokumen/'.$data_file['foto']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', ktp='$nm_ktp_baru', jaminan='$nm_jaminan_baru', foto='$nm_foto_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else if(!$file_tmp1=="" && !$file_tmp2==""){
  if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp1, $folder .$nm_ktp_baru);
          move_uploaded_file($file_tmp2, $folder .$nm_jaminan_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['ktp']);
          unlink('Dokumen/'.$data_file['jaminan']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', ktp='$nm_ktp_baru', jaminan='$nm_jaminan_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else if(!$file_tmp1=="" && !$file_tmp3==""){
  if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp1, $folder .$nm_ktp_baru);
          move_uploaded_file($file_tmp3, $folder .$nm_foto_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['ktp']);
          unlink('Dokumen/'.$data_file['foto']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', ktp='$nm_ktp_baru', foto='$nm_foto_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else if(!$file_tmp2=="" && !$file_tmp3==""){
  if(in_array($ekstensi2, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp2, $folder .$nm_jaminan_baru);
          move_uploaded_file($file_tmp3, $folder .$nm_foto_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['jaminan']);
          unlink('Dokumen/'.$data_file['foto']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', jaminan='$nm_jaminan_baru', foto='$nm_foto_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else if(!$file_tmp1==""){
  if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp1, $folder .$nm_ktp_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['ktp']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', ktp='$nm_ktp_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else if(!$file_tmp2==""){
  if(in_array($ekstensi2, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp2, $folder .$nm_jaminan_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['jaminan']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan',  jaminan='$nm_jaminan_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

if(!$file_tmp3==""){
  if(in_array($ekstensi3, $ekstensi_diperbolehkan) === true){
      if($ukuran_ktp < 2044070){
          move_uploaded_file($file_tmp3, $folder .$nm_foto_baru);

          $query = mysqli_query($con,"Select * from tbl_pengajuan where id_pengajuan='$_POST[id_pengajuan]'");
          $data_file = $query->fetch_array();
          unlink('Dokumen/'.$data_file['foto']);

          $cicilan = $_POST['jumlah'] / $_POST['lama'];

          $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan', foto='$nm_foto_baru' where id_pengajuan = '$_POST[id_pengajuan]' ");

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

else{
  $cicilan = $_POST['jumlah'] / $_POST['lama'];
  $query = mysqli_query($con,"Update tbl_pengajuan set tgl_pengajuan='$_POST[tgl_pengajuan]', jumlah='$_POST[jumlah]', lama='$_POST[lama]', cicilan='$cicilan' where id_pengajuan = '$_POST[id_pengajuan]' ");
            echo"<script language = 'JavaScript'> confirm('Data Pengajuan Berhasil Disimpan!'); document.location='index.php?page=data_pengajuan';</script>";
}
}

?>