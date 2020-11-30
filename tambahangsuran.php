<?php include "header.php"; ?>
<?php
include 'koneksi.php';
?>
<?php
$sqltambah = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$_GET[id_mahasiswa]'");
$e = mysqli_fetch_array($sqltambah);
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Angsuran</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Angsuran</h6>
        </div>
        <!-- Page Heading -->

        <form method="post" action="tambahcicilan.php" class="was-validated" style="border: 4px">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <label>Id user</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="id_user" name="id_user" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $e['id_user']; ?>">
                    </div>
                    <label>Id Mahasiswa</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $e['id_mahasiswa']; ?>">
                    </div>
                    <label>Nama Mahasiswa</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $e['nama']; ?>">
                    </div>
                    <label>Tanggal Rencana</label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="tanggal_rencana" name="tanggal_rencana" placeholder="Tanggal Rencana" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <label>Sisa Pembayaran</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="sisa_pembayaran" name="sisa_pembayaran" placeholder="Biaya" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $e['sisa_pembayaran']; ?>" onkeyup="sum();">
                    </div>
                    <label>Lama Angsuran</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="lama_angsuran" name="lama_angsuran" placeholder="Lama Angsuran" aria-label="Username" aria-describedby="basic-addon1" onkeyup="sum();">
                    </div>
                    <!-- <label>Lama Angsuran</label>
                    <div class="form-group">
                        <select class="custom-select" id="lama" onkeyup="sum();" required>
                            <option>Pilih Lama Angsuran</option>
                            <option value="1">1 Bulan</option>
                            <option value="2">2 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="4">4 Bulan</option>
                            <option value="5">5 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="7">7 Bulan</option>
                            <option value="8">8 Bulan</option>
                            <option value="9">9 Bulan</option>
                            <option value="10">10 Bulan</option>
                            <option value="11">11 Bulan</option>
                            <option value="12">12 Bulan</option>
                        </select>
                    </div> -->
                    <label>total</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="total" name="total" placeholder="total" aria-label="Username" aria-describedby="basic-addon1" onkeyup="sum();">
                    </div>
                    <label>Keterangan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label>Status</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Status" id="status" name="status" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            function sum() {
                var sisa_biaya = document.getElementById('sisa_pembayaran').value;
                var lama = document.getElementById('lama_angsuran').value;
                var result = parseInt(sisa_biaya) / parseInt(lama);
                if (!isNaN(result)) {
                    document.getElementById('total').value = result;
                }
            }
            //$harga = $_POST['sisa_pembayaran'];
            //$diskon = $_POST['potongan'];
            //$nilai = ($diskon / 100) * $harga;
        </script>
    </div>
</div>