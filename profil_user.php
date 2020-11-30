<?php include "header.php"; ?>
<?php
include('koneksi.php');
?>
<?php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    $id_user = $_SESSION['id_user'];
}
?>
<?php
$query = mysqli_query($konek, "select * from user where nim = '$_SESSION[nim]'");
$foto = mysqli_fetch_array($query);
// echo $foto['foto'];
?>
<?php
$query1 = mysqli_query($konek, "select * from mahasiswa where nim = '$_SESSION[nim]'");
$status = mysqli_fetch_array($query1);
// echo $foto['foto'];
?>
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="row gutters-sm">

                <div class="text-center col-md-3 p-5">
                    <img src="images/<?= $foto['foto'] ?>" alt="Admin" height="150" width="150">
                    <div class="mt-3">
                        <h4><?= $_SESSION['nama']; ?></h4>
                        <p class="text-secondary mb-1"><?= $_SESSION['nim']; ?></p>
                        <p class="text-muted font-size-sm"><?= $_SESSION['prodi']; ?></p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Settings</button>
                    </div>
                </div>


                <div class="col-md-8 p-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $_SESSION['nama']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nim</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $_SESSION['nim']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $_SESSION['email']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $_SESSION['telp']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Alamat</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $_SESSION['alamat']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $status['status'] ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profil</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="update_profile.php" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="nim" id="nim">
                        <div class="form-group">
                            <input type="hidden" name="id_user" class="form-control" id="id_user" value="<?= $_SESSION['id_user']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $_SESSION['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" id="password" value="<?= $_SESSION['password']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Foto Profil</label>
                            <input type="file" name="foto" class="form-control" id="foto" value="<?= $_SESSION['foto']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>