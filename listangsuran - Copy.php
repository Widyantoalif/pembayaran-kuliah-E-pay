<?php include "header.php"; ?>
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal1 {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content1 {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content1,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close1 {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content1 {
            width: 100%;
        }
    }
</style>
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
                            <th>Cek</th>

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
                                    <a href="#" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_tagihan']; ?>">Cek</a>
                                </td>
                            </tr>


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
                                                    <input type="text" name="bukti" class="form-control" value="<?php echo $data['bukti']; ?>">
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
                                                    <div class="form-group">
                                                        <label>Bukti Bayar</label>
                                                        <div class="text-center col-md-3 p-5">
                                                            <img id="myImg" src="images/<?= $data['bukti'] ?>" alt="picture" height="300" width="300">
                                                        </div>
                                                        <div id="myModal1" class="modal1">
                                                            <span class="close">&times;</span>
                                                            <img class="modal-content1" id="myImg">
                                                            <div id="caption"></div>
                                                        </div>
                                                    </div>
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
<script>
    // Get the modal
    var modal = document.getElementById(" myModal1"); // Get the image and insert it inside the modal - use its "alt" text as a caption var img=document.getElementById("myImg"); var modalImg=document.getElementById("img01"); var captionText=document.getElementById("caption"); img.onclick=function() { modal.style.display="block" ; modalImg.src=this.src; captionText.innerHTML=this.alt; } // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>

<!-- <?php include "footer.php"; ?>