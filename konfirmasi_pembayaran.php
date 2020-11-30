<?php
include('koneksi.php');

$id_tagihan = $_GET['id_tagihan'];
$id_mahasiswa = $_GET['id_mahasiswa'];
$id_user = $_GET['id_user'];
$status = 'Lunas';
$tanggal_bayar = date('Y-m-d');
//$bulan = date('m', strtotime($jatuhtempo)) . " " . date('Y', strtotime($jatuhtempo));
//$tempo_bulan        = mktime(0, 0, 0, date('m') + $i, date('d') + 0, date('Y') + 0);
//$tempo              = date($tanggal_rencana, $tempo_bulan);
//mysqli_query($konek, "insert into tagihan (id_tagihan,id_user, id_mahasiswa, tanggal_rencana, sisa_pembayaran, keterangan, status, tagihan_ke) values ('$id_tagihan', '$id_user', '$id_mahasiswa', '$jatuhtempo','$total', '$keterangan' ,'$status', '$tagihan_ke')");
mysqli_query($konek, "UPDATE tagihan SET status ='$status' , tanggal_bayar = '$tanggal_bayar' WHERE id_tagihan ='$id_tagihan'");



header("location:listangsuran.php?id_mahasiswa=$id_mahasiswa");
