 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
 <!-- Bootstrap Table with Header - Footer -->
              <div class="card">
                <h5 class="card-header">Data Pengajuan Kredit</h5>
                <div class="table-responsive text-nowrap">

                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?page=data_pengajuan_tambah" class="btn btn-success">Cetak Data</a><br>&nbsp;

                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pengaju</th>
                        <th>Jumlah</th>
                        <th>Angsuran</th>
                        <th>Cicilan</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include"../koneksi.php";
                        $no=1;
                        $sqlp = mysqli_query($con,"select * from tbl_pengajuan where status ='Lolos Administrasi' ");
                        while($rp = mysqli_fetch_array($sqlp)){
                      ?>
                      <tr>
                        <td><?php echo"$no"; ?></td>
                        <td><?php echo"$rp[tgl_pengajuan]"; ?></td>
                        <td><?php echo"$rp[nm_pengaju]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['jumlah'],0,",",".").""; ?></td>
                        <td><?php echo"$rp[lama]"; ?></td>
                        <td><?php echo "Rp ".number_format($rp['cicilan'],0,",",".").""; ?></td>
                        <td><?php echo"$rp[status]"; ?></td>
                        <td>

                        <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dokumen </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo"../Nasabah/Dokumen/$rp[ktp]"; ?>" target="_blank">Dokumen KTP</a></li>
                            <li><a class="dropdown-item" href="<?php echo"../Nasabah/Dokumen/$rp[jaminan]"; ?>" target="_blank">Dokumen Jaminan</a></li>
                            <li><a class="dropdown-item" href="<?php echo"../Nasabah/Dokumen/$rp[foto]"; ?>" target="_blank">File Foto</a></li>
                          </ul>
                        </div> 

                        <a href="<?php echo"index.php?page=data_pengajuan_proses&&idp=$rp[id_pengajuan]"; ?>" class="btn btn-success">Proses Pencairan</a>

                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Angsuran</th>
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