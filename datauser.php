<?php include "header.php"; ?>
<?php
include 'koneksi.php';
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data User</h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th style="display:none;">Id User</th>
              <th>Nim</th>
              <th>Nama</th>
              <th>Telp</th>
              <th>Alamat</th>
              <th>Tingkat</th>
              <th>Prodi</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($konek, "SELECT * FROM user");
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td style="display:none;"><?php echo $row['id_user']; ?></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['telp'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['tingkat'] ?></td>
                <td><?php echo $row['prodi'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <!-- Button untuk modal -->
                  <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_user']; ?>">Edit</a>
                </td>
              </tr>


              <div class="modal fade" id="myModal<?php echo $row['id_user']; ?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Update Data </h4>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="edituser.php" method="get">

                        <?php
                        $id = $row['id_user'];
                        $query_view = mysqli_query($konek, "SELECT * FROM user WHERE id_user='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($query_view)) {
                        ?>

                          <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                          <div class="form-group">
                            <label>Nim</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Telp</label>
                            <input type="number" name="telp" class="form-control" value="<?php echo $data['telp']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Prodi</label>
                            <input type="text" name="prodi" class="form-control" value="<?php echo $data['prodi']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Tingkat</label>
                            <input type="text" name="tingkat" class="form-control" value="<?php echo $data['tingkat']; ?>">
                          </div>

                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>">
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>

                        <?php
                        }
                        //mysql_close($host);
                        ?>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>