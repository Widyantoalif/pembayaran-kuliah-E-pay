<?php
//include('dbconnected.php');
include('koneksi.php');

$id_mahasiswa = $_GET['id_mahasiswa'];
$id_user = $_GET['id_user'];
$nim = $_GET['nim'];
$nama = $_GET['nama'];
$kelas = $_GET['kelas'];
$biaya = $_GET['biaya'];
$tingkat = $_GET['tingkat'];


//query update
$queryupdate = mysqli_query($konek, "UPDATE mahasiswa SET id_user='$id_user' , nim='$nim' , nama='$nama' , kelas='$kelas' , biaya='$biaya' , tingkat='$tingkat' WHERE id_mahasiswa='$id_mahasiswa' ");

if ($queryupdate) {
	# credirect ke page index
	header("location:datamahasiswa.php");	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
