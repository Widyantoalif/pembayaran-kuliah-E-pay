<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lama_angsuran = $_POST['lama_angsuran'];
    for ($i = 1; $i <= $lama_angsuran; $i++) {
        $id_user = $_POST['id_user'];
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $nama = $_POST['nama'];
        $tanggal_rencana = $_POST['tanggal_rencana'];
        $sisa_pembayaran = $_POST['sisa_pembayaran'];
        $total = $_POST['total'];
        $keterangan = $_POST['keterangan'];
        $status = $_POST['status'];


        $query = mysqli_query($konek, "SELECT max(id_tagihan) as kodeTerbesar FROM tagihan");
        $data = mysqli_fetch_array($query);
        $userid = $data['kodeTerbesar'];
        $urutan = (int) substr($userid, 3, 3);
        $urutan++;
        $angka = "TAG";
        $id_tagihan         = sprintf("%03s", $urutan) + $i;
        $tagihan_ke         = "TAGIHAN KE-" . sprintf('%03s', $i);
        $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($tanggal_rencana)));
        //$bulan = date('m', strtotime($jatuhtempo)) . " " . date('Y', strtotime($jatuhtempo));
        //$tempo_bulan        = mktime(0, 0, 0, date('m') + $i, date('d') + 0, date('Y') + 0);
        //$tempo              = date($tanggal_rencana, $tempo_bulan);
        $jalan = mysqli_query($konek, "insert into tagihan (id_user, id_mahasiswa, tanggal_rencana, sisa_pembayaran, keterangan, status, tagihan_ke) values ('$id_user', '$id_mahasiswa', '$jatuhtempo','$total', '$keterangan' ,'$status', '$tagihan_ke')");
    }
}




header('location:pembayaran.php');
