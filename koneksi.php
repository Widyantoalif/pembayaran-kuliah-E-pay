<?php
//variabel koneksi
$konek = mysqli_connect("localhost","root","","payment");

if(!$konek){
	echo "Koneksi Database Gagal...!!!";
}


?>