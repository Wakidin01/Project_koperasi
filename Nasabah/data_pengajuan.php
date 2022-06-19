 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
 <!-- Bootstrap Table with Header - Footer -->
              <div class="card">
                <h5 class="card-header">Data Pengajuan Kredit</h5>
                <div class="table-responsive text-nowrap">

                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?page=data_pengajuan_tambah" class="btn btn-primary">Tambah Data</a><br>&nbsp;

                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Lama Angsuran</th>
                        <th>Cicilan</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include"../koneksi.php";
                        $no=1;
                        $sqlp = mysqli_query($con,"select * from tbl_pengajuan where nm_pengaju = '$ru[nm_user]'");
                        while($rp = mysqli_fetch_array($sqlp)){
                      ?>
                      <tr>
                        <td><?php echo"$no"; ?></td>
                        <td><?php echo"$rp[tgl_pengajuan]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['jumlah'],0,",",".").""; ?></td>
                        <td><?php echo"$rp[lama]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['cicilan'],0,",",".").""; ?></td>
                        <td><?php echo"$rp[status]"; ?></td>
                        <td><?php echo"<a href='index.php?page=data_pengajuan_edit&&id=$rp[id_pengajuan]' class='btn btn-sm btn-success'>Edit</a>"; ?> <a href="<?php echo"index.php?page=data_pengajuan_delete&&id=$rp[id_pengajuan]"; ?>" class="btn btn-sm btn-warning" onclick="javascript: return confirm('Apakah Anda Yakin Menghapus Data Ini ?')">Hapus</a></td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jumlah Pengajuan</th>
                        <th>Lama Angsuran</th>
                        <th>Cicilan</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>