<?php
	include('koneksi.php');
	$id=$_GET['id_mahasiswa'];
	mysqli_query($konek,"delete from mahasiswa where id_mahasiswa='$id'");
	header('location:datamahasiswa.php');
 
?>