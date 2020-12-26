<?php
include 'koneksi.php';
?>
<?php
$sqlcetak = mysqli_query($konek, "SELECT tagihan.sisa_pembayaran ,mahasiswa.nama from tagihan INNER JOIN mahasiswa on mahasiswa.id_mahasiswa = tagihan.id_mahasiswa WHERE id_tagihan='$_GET[id_tagihan]'");
$id_tagihan = $_GET['id_tagihan'];
$e = mysqli_fetch_array($sqlcetak);
// echo ($id_tagihan);
?>

<?php

// FUNGSI TERBILANG OLEH : MALASNGODING.COM
// WEBSITE : WWW.MALASNGODING.COM
// AUTHOR : https://www.malasngoding.com/author/admin


function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}


$angka = $e['sisa_pembayaran'];
// echo terbilang($angka);
?>

<?php
function tgl($tanggal)
{
	$bulan_arr    = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	$hari_arr     = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

	$ex           = explode('-', $tanggal);
	$hari         = date('N', strtotime($tanggal));
	$tanggal_indo = $hari_arr[$hari] . ', ' . $ex[2] . ' ' . $bulan_arr[(int)$ex[1]] . ' ' . $ex[0];

	return $tanggal_indo;
}

function hari($date)
{
	$hari_arr     = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
	$hari         = date('N', strtotime($date));
	return $hari_arr[$hari];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Print Bukti kas</title>

	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom Icon -->
	<link rel="stylesheet" href="icon/css/all.min.css">

	<style>
		body {
			font-family: Arial;
		}

		@media print {
			.no-print {
				display: none;
			}
		}

		table {
			border-collapse: collapse;
		}

		h4,
		h3 {
			line-height: 0;
		}
	</style>
</head>

<body>
	<table>
		<tr>
			<td>
				<img id="myImg" src="img/1.jpg" alt="picture" width="30%">
			</td>
		</tr>
	</table>
	<hr>
	<p style="font-size: 20px; text-align:center"><b>Jl. Raya Bogor KM38 No.56, Sukamaju, Kec. Cilodong, Kota Depok, Jawa Barat 16415</b></p>
	<hr>


	<div align=" center">
		<h3>BUKTI TERIMA KAS</h3>
		<!-- <h4>TAHUN PELAJARAN 2017/2018</h4> -->
	</div>
	<br>
	<hr>
	<table>
		<tr>
			<td width="200"><b style="font-size: 20px;">Tanggal</b></td>
			<td width="4"><b style="font-size:20px;">:</b></td>
			<td><b style="font-size: 20px;"><?php echo tgl(date('Y-m-d')) ?></b>
			</td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td width="200"><b style="font-size: 20px;">Telah diterima dari</b></td>
			<td width="4"><b style="font-size: 20px;">:</b></td>
			<td><b style="font-size: 20px;"><?php echo $e['nama']; ?></b>
			</td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td width="200"><b style="font-size: 20px;">Uang sejumlah</td>
			<td width="4"><b style="font-size: 20px;">:</td>
			<td><b style="font-size: 20px;"><?php echo $e['sisa_pembayaran']; ?></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td width="200"><b style="font-size: 20px;">Terbilang</td>
			<td width="4"><b style="font-size: 20px;">:</td>
			<td><b style="font-size: 20px;"><?php echo terbilang($angka); ?> rupiah</td>
		</tr>
	</table>
	<hr>
	<br>
	<table width="100%">
		<tr>
			<td></td>
			<td width="200px">
				<p>Cilodong, <?php echo date('d F Y'); ?></p>
				<br>
				<br>
				<p>_________________________</p>
			</td>
		</tr>
	</table>
	<br>
	<div align="center" style="margin-bottom: 40px">
		<script>
			window.print();
			// window.location.href = 'datamahasiswa.php';
		</script>

		<!-- <i class="fa fa-print" aria-hidden="true"></i> Print -->
		</a>
	</div>

</body>

</html>