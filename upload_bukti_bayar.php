<?php
// Load file koneksi.php
include('koneksi.php');
// Ambil Data yang Dikirim dari Form
$id_user = $_POST['id_user'];
$id_tagihan = $_POST['id_tagihan'];
$id_mahasiswa = $_POST['id_mahasiswa'];
$nama_file = $_FILES['upload']['name'];
$tmp_file = $_FILES['upload']['tmp_name'];
$status = 'Konfirmasi';

// Set path folder tempat menyimpan gambarnya
$path = "images/" . $nama_file;
// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
// Proses upload
if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
    // Jika gambar berhasil diupload, Lakukan :  
    // Proses simpan ke Database
    mysqli_query($konek, "UPDATE tagihan SET status = '$status', bukti = '$nama_file' WHERE id_tagihan ='$id_tagihan'");

    // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: listangsuran_mahasiswa.php?id_mahasiswa=$id_mahasiswa"); // Redirectke halaman index.php

}
