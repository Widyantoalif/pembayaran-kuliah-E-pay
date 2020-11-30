<?php include "header.php"; ?>
<?php
include 'koneksi.php';
?>
<?php
$sqltambah = mysqli_query($konek, "SELECT * FROM tagihan WHERE id_mahasiswa='$_GET[id_mahasiswa]'");
$id_mahasiswa = $_GET['id_mahasiswa'];
$e = mysqli_fetch_array($sqltambah);
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
                            <th>Bayar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($konek, "SELECT tagihan.id_mahasiswa ,tagihan.id_user ,mahasiswa.nama,mahasiswa.nim, tagihan.id_tagihan, mahasiswa.sisa_pembayaran, tagihan.tanggal_bayar,tagihan.tagihan_ke,tagihan.tanggal_rencana,tagihan.status FROM mahasiswa INNER JOIN tagihan USING(id_mahasiswa) WHERE tagihan.id_mahasiswa = '$id_mahasiswa' AND keterangan = 'Angsuran' order BY tagihan_ke ASC");
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
                                <td align="center"><?php echo $row['sisa_pembayaran'] ?></td>
                                <td align="center"><?php echo tgl($row['tanggal_rencana']) ?></td>
                                <td align="center"><?php echo $tanggal_bayar ?></td>
                                <td align="center"><?php echo $row['tagihan_ke'] ?></td>
                                <td align="center"><?php echo $row['status'] ?></td>
                                <td align="center">
                                    <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_tagihan']; ?>">Bayar</a>
                                </td>
                            </tr>


                            <div class="modal fade" id="myModal<?php echo $row['id_tagihan']; ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col section-1 section-description">
                                                    <div class="text-center">
                                                        <h5><b>Silahkan melakukan pembayaran Ke No Rekening</b> <br>
                                                            BRI A/n Yayasan cahaya berkah sejahtera<br>
                                                            0421-01-000825-301 </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="upload_bukti_bayar.php" enctype="multipart/form-data" method="POST">

                                                <?php
                                                $id = $row['id_tagihan'];
                                                $query_view = mysqli_query($konek, "SELECT * FROM tagihan INNER JOIN mahasiswa on mahasiswa.id_mahasiswa = tagihan.id_mahasiswa WHERE id_tagihan='$id'");
                                                //$result = mysqli_query($conn, $query);
                                                while ($data = mysqli_fetch_assoc($query_view)) {
                                                ?>

                                                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                                                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $data['id_user']; ?>">
                                                    <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?php echo $data['id_tagihan']; ?>">

                                                    <div class="form-group">
                                                        <label>Upload Bukti Transfer</label>
                                                        <input type="file" name="upload" id="upload" class="form-control">
                                                    </div>
                                                    <!-- <div class=" form-group">
                                                        <label>Status</label>
                                                        <input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>">
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





<?php include "footer.php"; ?>