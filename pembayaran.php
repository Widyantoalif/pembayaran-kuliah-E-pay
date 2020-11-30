<?php include "header.php"; ?>
<?php
include 'koneksi.php';
?>

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Id tagihan</th>
              <th>Nama</th>
              <th>Tahun akademik</th>
              <th>Sisa Pembayaran</th>
              <th>Tanggal Bayar</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Angsuran</th>
              <th>Daftar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($konek, "SELECT mahasiswa.id_mahasiswa ,mahasiswa.id_user ,mahasiswa.nama, mahasiswa.nim, tagihan.id_tagihan, mahasiswa.sisa_pembayaran,mahasiswa.tahun_akademik, tagihan.tanggal_bayar,tagihan.keterangan,tagihan.status FROM mahasiswa JOIN tagihan USING(id_mahasiswa) WHERE keterangan = 'Registrasi'");
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td align="center"><?php echo $row['id_tagihan']; ?></td>
                <td align="center"><?php echo $row['nama'] ?></td>
                <td align="center"><?php echo $row['tahun_akademik'] ?></td>
                <td align="center"><?php echo $row['sisa_pembayaran'] ?></td>
                <td align="center"><?php echo tgl($row['tanggal_bayar']) ?></td>
                <td align="center"><?php echo $row['keterangan'] ?></td>
                <td align="center"><?php echo $row['status'] ?></td>
                <td align="center">
                  <a href="tambahangsuran.php?id_mahasiswa=<?= $row['id_mahasiswa']; ?> & nama=<?= $row['nama']; ?> & sisa_pembayaran=<?= $row['sisa_pembayaran']; ?>" class="btn btn-success btn-icon-split"><span class="icon text-white-100"><i class="fas fa-plus"></i></span></a>
                </td>
                <td align="center">
                  <a href="listangsuran.php?id_mahasiswa=<?= $row['id_mahasiswa']; ?>" class="btn btn-success btn-icon-split"><span class="icon text-white-100"><i class="fa fa-eye"></i></span></a>
                </td>
              </tr>


              <div class="modal fade" id="myModal<?php echo $row['id_mahasiswa']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Update Data </h4>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="editmahasiswa.php" method="get">

                        <?php
                        $id = $row['id_mahasiswa'];
                        $query_view = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($query_view)) {
                        ?>

                          <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                          <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                          <div class="form-group">
                            <label>Nim</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="<?php echo $data['kelas']; ?>">
                          </div>
                          <div class="form-group">
                            <label>biaya</label>
                            <input type="text" name="biaya" class="form-control" value="<?php echo $data['biaya']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Tingkat</label>
                            <input type="text" name="tingkat" class="form-control" value="<?php echo $data['tingkat']; ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        <?php
                        }
                        //mysql_close($host);
                        ?>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





<!-- <?php include "footer.php"; ?>