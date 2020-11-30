<?php
include('koneksi.php');

$query1 = mysqli_query($konek, "SELECT max(id_tagihan) as kodeTerbesar1 FROM tagihan");
$data1 = mysqli_fetch_array($query1);
$userid1 = $data1['kodeTerbesar1'];
$urutan1 = (int) substr($userid1, 3, 3);
$urutan1++;
$angka1 = "TAG";
$id_tagihan = $angka1 . sprintf("%03s", $urutan1);

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$kelas = $_POST['kelas'];
$biaya = $_POST['biaya'];
$tingkat = $_POST['tingkat'];
$keterangan = 'Registrasi';
$status = 'Lunas';
$tanggal_bayar = date('Y-m-d');

mysqli_query($konek, "insert into mahasiswa (id_mahasiswa, id_user, nim, nama, kelas, biaya, tingkat) values ('$id_mahasiswa', '$id_user', '$nim', '$nama', '$kelas', '$biaya', '$tingkat')");
mysqli_query($konek, "insert into tagihan (id_tagihan,id_mahasiswa, id_user, jumlah, keterangan, tanggal_bayar, status) values ('$id_tagihan', '$id_mahasiswa', '$id_user', '$biaya', '$keterangan' ,'$tanggal_bayar' ,'$status')");
header('location:datamahasiswa.php');
