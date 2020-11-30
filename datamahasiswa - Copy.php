<?php include "header.php";?>
<?php
  include 'koneksi.php';
  ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
      <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModal2">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Mahasiswa</span>
                  </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>  
                <th >Id mahasiswa</th> 
                <th>Id user</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Biaya</th>
                <th>Tingkat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $query = mysqli_query($konek,"SELECT * FROM mahasiswa");
              $no = 1;
              while ($row = mysqli_fetch_assoc($query)) 
              {
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['id_mahasiswa']; ?></td>
                <td><?php echo $row['id_user'] ?></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['kelas'] ?></td>
                <td><?php echo $row['biaya'] ?></td>
                <td><?php echo $row['tingkat'] ?></td>
                <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_mahasiswa']; ?>">Edit</a>
                </td>
              </tr>  
              

            <div class="modal fade" id="myModal<?php echo $row['id_mahasiswa']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Update Data </h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="editmahasiswa.php" method="get">

                        <?php
                        $id = $row['id_mahasiswa']; 
                        $query_view = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($query_view)) {  
                        ?>

                        <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>">
                        <div class="form-group">
                          <label>Nim</label>
                          <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>">      
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
  

  <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
                <!-- Modal content-->
           <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Tambah Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
             
                    <form role="form" action="tambahmahasiswa.php" method="post">
                        <!-- <input type="hidden" name="id_mahasiswa" value="test"> -->
                        <div class="form-group">
                          <label>Nim</label>
                          <select id="nim" name="nim" class="selectpicker form-control" data-live-search="true"  onchange="changeValue(this.value)">
                          <?php 
                            $sql=mysqli_query($konek,"SELECT * FROM user");
                            $jsArray = "var prdName = new Array();\n";
                            while ($data=mysqli_fetch_array($sql)) {
                          
                            echo '<option value="'.$data['id_user'].'">'.$data['nim'].'</option> ';
                            $jsArray .= "prdName['" . $data['nim'] . "'] = {nama:'" . addslashes($data['nama']) . "'};\n";
                          
                            }
                          ?>
                          </select>  
                        </div>

                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" id="nama">      
                        </div>

                        <div class="form-group">
                          <label>Kelas</label>
                          <input type="text" name="kelas" class="form-control" id="kelas">      
                        </div>

                        <div class="form-group">
                          <label>Biaya</label>
                          <input type="text" name="biaya" class="form-control" id="biaya">      
                        </div>


                        <div class="form-group">
                          <label>Tingkat</label>
                          <select id="tingkat" name="tingkat" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>    
                          </select>
                        </div>
                      </form>
                          <script type="text/javascript">
                   <?php echo $jsArray; ?>  
                  function changeValue(x){  
                  document.getElementById('nama').value = prdName[x].nama;   
                  };  
                          </script>
                      </div>
                  </div>
              </div>
          </div>
      </div>                      
</div>

<?php include "footer.php";?>