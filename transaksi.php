<?php include "header.php";?>

    <div class="card-body">
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Transaksi</span>
                  </a>
    </div>
    <div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th >id_tagihan</th>
            <th>id_mahasiswa</th>
            <th>Jatuh tempo</th>
            <th>Bulan</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>id user</th>
            <th>Konfirmasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Alif widiyanto</td>
            <td>10/08/2020</td>
            <td>Agustus</td>
            <td></td>
            <th>850.000</th>
            <th>Belum lunas</th>
            <th>1</th>
            <th>
            <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Edit</a>
            </th>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
 </div>
</div>





<?php include "footer.php";?>