<?php
include('koneksi.php');

$query = mysqli_query($konek, "SELECT max(id_mahasiswa) as kodeTerbesar FROM mahasiswa");
$data = mysqli_fetch_array($query);
$userid = $data['kodeTerbesar'];
$urutan = (int) substr($userid, 3, 3);
$urutan++;
$angka = "MHS";
$id_mahasiswa = $angka . sprintf("%03s", $urutan);

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
$tahun_akademik = $_POST['tahun_akademik'];
$tingkat = $_POST['tingkat'];
$keterangan = 'Registrasi';
$status = 'Lunas';
$tanggal_bayar = date('Y-m-d');
$uang_muka = $_POST['uang_muka'];
$sisa_pembayaran = $_POST['sisa_pembayaran'];
$status_aktif = 'aktif';

mysqli_query($konek, "insert into mahasiswa (id_mahasiswa, id_user, nim, nama, kelas, biaya, uang_muka , sisa_pembayaran , tingkat, status, tahun_akademik) values ('$id_mahasiswa', '$id_user', '$nim', '$nama', '$kelas', '$biaya', '$uang_muka', '$sisa_pembayaran', '$tingkat','$status_aktif','$tahun_akademik')");
mysqli_query($konek, "insert into tagihan (id_mahasiswa, id_user, sisa_pembayaran, keterangan, tanggal_bayar, status) values ('$id_mahasiswa', '$id_user', '$sisa_pembayaran', '$keterangan' ,'$tanggal_bayar' ,'$status')");
header('location:datamahasiswa.php');
