<?php

$email = $_POST['email'];
$nama = $_POST['nama'];
$subjek = "Tagihan Pembayaran Kuliah";
// $pesan = "Silahkan Membayar tagihan pembayaran kuliah";
// $pesan = "<p align:'center'>Daftar Nilai Ujian</P>"
// echo "<table border='1' width='20%' cellspacing='0' cellpadding='0' id='table2'>"
// echo "<tr><td align='center'>No</td><td align='center'>Nama Peserta</td><td align='center'>Nilai</td></tr>"
// echo "<tr><td align='center'>1</td><td>Amal Gofa</td><td align='center'>80</td></tr>"
// echo "<tr><td align='center'>2</td><td>Suprianto</td><td align='center'>80</td></tr>"
// echo "<tr><td align='center'>3</td><td>Joko</td><td align='center'>80</td></tr>"
// echo "</table>";
include "classes/class.phpmailer.php";
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; //host email
$mail->SMTPDebug = 1;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "alipwe2345@gmail.com"; //user email
$mail->Password = "alipwe2345678"; //password email 
$mail->SetFrom("alipwe2345@gmail.com", "Keuangan LP3I"); //set email pengirim
$mail->Subject = $subjek; //subyek email
$mail->AddAddress($email);  // email tujuan
$mail->MsgHTML("
<html>
<body>
  <p>Kepada yang terhormat $nama</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
"); //pesan


if ($mail->Send()) {
  echo "<script>alert('Kirim Pesan Sukses')</script>";
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else
  echo "<script>alert('GAGAL')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>

<!-- Elseif Channel -->