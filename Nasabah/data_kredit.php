 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
 <!-- Bootstrap Table with Header - Footer -->
              <div class="card">
                <h5 class="card-header">Data Pencairan Kredit</h5>
                <div class="table-responsive text-nowrap">

                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?page=data_pengajuan_tambah" class="btn btn-success">Cetak Data</a><br>&nbsp;

                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Ref</th>
                        <th>Tanggal</th>
                        <th>Nasabah</th>
                        <th>Cicilan</th>
                        <th>Sisa Kredit</th>
                        <th>Sisa Bayar</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include"../koneksi.php";
                        $no=1;
                        $sqlp = mysqli_query($con,"select tbl_kredit.*, tbl_pengajuan.* from tbl_kredit JOIN tbl_pengajuan ON tbl_pengajuan.id_pengajuan = tbl_kredit.id_pengajuan where tbl_pengajuan.nm_pengaju = '$ru[nm_user]' ");
                        while($rp = mysqli_fetch_array($sqlp)){
                      ?>
                      <tr>
                        <td><?php echo"$no"; ?></td>
                        <td><?php echo"$rp[no_ref]"; ?></td>
                        <td><?php echo"$rp[tgl_pembayaran]"; ?></td>
                        <td><?php echo"$rp[nm_pengaju]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['cicilan'],0,",",".").""; ?></td>
                        <td><?php echo"$rp[sisa_lama]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['total'],0,",",".").""; ?></td>
                        <td> 

                        <a href="<?php echo"index.php?page=pembayaran&&idp=$rp[id_kredit]"; ?>" class="btn btn-success">Bayar</a>

                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                      <tr>
                        <th>No</th>
                        <th>No Ref</th>
                        <th>Tanggal</th>
                        <th>Nasabah</th>
                        <th>Cicilan</th>
                        <th>Sisa Kredit</th>
                        <th>Sisa Bayar</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>