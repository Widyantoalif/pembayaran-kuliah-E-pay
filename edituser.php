<?php
//include('dbconnected.php');
include('koneksi.php');

$id_user = $_GET['id_user'];
$nim = $_GET['nim'];
$nama = $_GET['nama'];
$telp = $_GET['telp'];
$alamat = $_GET['alamat'];
$tingkat = $_GET['tingkat'];
$status = $_GET['status'];
$prodi = $_GET['prodi'];


//query update
$queryupdate = mysqli_query($konek, "UPDATE user SET nim='$nim' , nama='$nama' , telp='$telp' , alamat='$alamat' , tingkat='$tingkat' , status='$status' , prodi='$prodi' WHERE id_user='$id_user' ");

if ($queryupdate) {
	# credirect ke page index
	header("location:datauser.php");	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
