<?php
// Load file koneksi.php
include('koneksi.php');
// Ambil Data yang Dikirim dari Form
$id_user = $_POST['id_user'];
$email = $_POST['email'];
$password = $_POST['password'];
$nama_file = $_FILES['foto']['name'];
$tmp_file = $_FILES['foto']['tmp_name'];

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
  mysqli_query($konek, "UPDATE user SET email ='$email' , password = '$password' , foto = '$nama_file' WHERE id_user ='$id_user'");

  // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: profil_user.php"); // Redirectke halaman index.php

}
