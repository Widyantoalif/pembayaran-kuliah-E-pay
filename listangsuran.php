<?php include "header.php"; ?>

<?php
include 'koneksi.php';
?>
<?php
$sqltambah = mysqli_query($konek, "SELECT * FROM tagihan WHERE id_mahasiswa='$_GET[id_mahasiswa]'");
$id_mahasiswa = $_GET['id_mahasiswa'];
$e = mysqli_fetch_array($sqltambah);

function rupiah($angka)
{
    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
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
                            <!-- <th>Id tagihan</th>
                            <th>Id Mahasiswa</th>
                            <th>Id user</th> -->
                            <th>Nama</th>
                            <th>Jumlah tagihan</th>
                            <th>Tanggal Rencana</th>
                            <th>Tanggal Bayar</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th>Bukti</th>
                            <th>Cetak</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($konek, "SELECT tagihan.id_mahasiswa ,tagihan.id_user ,tagihan.keterangan ,tagihan.status,mahasiswa.nama,mahasiswa.nim, tagihan.id_tagihan, mahasiswa.sisa_pembayaran,tagihan.sisa_pembayaran, tagihan.tanggal_bayar,tagihan.tagihan_ke,tagihan.tanggal_rencana,tagihan.status FROM mahasiswa INNER JOIN tagihan USING(id_mahasiswa) WHERE tagihan.id_mahasiswa = '$id_mahasiswa' AND tagihan.keterangan = 'Angsuran' order BY tagihan_ke ASC");
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                            if ($row['tanggal_bayar'] == '0000-00-00') {
                                $tanggal_bayar = '-';
                            } else {
                                $tanggal_bayar = tgl($row['tanggal_bayar']);
                            }
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++ ?></td>
                                <!-- <td align="center"><?php echo $row['id_tagihan']; ?></td>
                                <td align="center"><?php echo $row['id_mahasiswa'] ?></td>
                                <td align="center"><?php echo $row['id_user'] ?></td> -->
                                <td align="center"><?php echo $row['nama'] ?></td>
                                <td align="center"><?php echo rupiah($row['sisa_pembayaran']) ?></td>
                                <td align="center"><?php echo tgl($row['tanggal_rencana']) ?></td>
                                <td align="center"><?php echo $tanggal_bayar ?></td>
                                <td align="center"><?php echo $row['tagihan_ke'] ?></td>
                                <td align="center"><?php echo $row['status'] ?></td>
                                <td align="center">
                                    <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id_tagihan']; ?>">Detail</a>
                                </td>
                                <td align="center">
                                    <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1<?php echo $row['id_tagihan']; ?>">Bukti</a>
                                </td>
                                <td align="center">
                                    <a href="cetak_slip_transaksi.php?id_tagihan=<?= $row['id_tagihan']; ?>" type="button" class="btn btn-primary btn-sm">Cetak</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="myModal1<?php echo $row['id_tagihan']; ?>" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Konfirmasi Pembayaran </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="konfirmasi_pembayaran.php" method="get">

                                                <?php
                                                $id = $row['id_tagihan'];
                                                $query_view = mysqli_query($konek, "SELECT * FROM tagihan INNER JOIN mahasiswa on mahasiswa.id_mahasiswa = tagihan.id_mahasiswa WHERE id_tagihan='$id'");
                                                //$result = mysqli_query($conn, $query);
                                                while ($data = mysqli_fetch_assoc($query_view)) {
                                                ?>

                                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                                                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                                                    <input type="hidden" name="id_tagihan" value="<?php echo $data['id_tagihan']; ?>">
                                                    <input type="hidden" name="bukti" class="form-control" value="<?php echo $data['bukti']; ?>">
                                                    <?php
                                                    $bukti = $data['bukti'];
                                                    ?>

                                                    <div class="modal-footer">
                                                        <img id="myImg" src="images/<?= $data['bukti'] ?>" alt="picture" width="100%">
                                                        <button type="submit" class="btn btn-success">Konfirmasi</button>
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

                            <div class="modal fade" id="myModal<?php echo $row['id_tagihan']; ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Konfirmasi Pembayaran </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="konfirmasi_pembayaran.php" method="get">

                                                <?php
                                                $id = $row['id_tagihan'];
                                                $query_view = mysqli_query($konek, "SELECT * FROM tagihan INNER JOIN mahasiswa on mahasiswa.id_mahasiswa = tagihan.id_mahasiswa WHERE id_tagihan='$id'");
                                                //$result = mysqli_query($conn, $query);
                                                while ($data = mysqli_fetch_assoc($query_view)) {
                                                ?>

                                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                                                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                                                    <input type="hidden" name="id_tagihan" value="<?php echo $data['id_tagihan']; ?>">
                                                    <input type="hidden" name="bukti" class="form-control" value="<?php echo $data['bukti']; ?>">
                                                    <?php
                                                    $bukti = $data['bukti'];
                                                    ?>

                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nim</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nim']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input type="text" name="kelas" class="form-control" value="<?php echo $data['kelas']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>biaya</label>
                                                        <input type="text" name="biaya" class="form-control" value="<?php echo $data['sisa_pembayaran']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tingkat</label>
                                                        <input type="text" name="tingkat" class="form-control" value="<?php echo $data['tingkat']; ?>">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label>Bukti Bayar</label>
                                                        <div class="text-center col-md-3 p-5">
                                                            <img id="myImg" src="images/<?= $data['bukti'] ?>" alt="picture" class="img-fluid">
                                                        </div>
                                                    </div> -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Konfirmasi</button>
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
</div>


<!-- <?php include "footer.php"; ?>