<?php
include('php/cek_akses.php');
?>  
<link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
<script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>


<div class="container-fluid" style="font-size: 14px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Jurusan</li>
  </ol>
  
<div class="card mb-2">
  <div class="card-header"><i class="fa fa-table"></i> 
    Data Tabel Jurusan
  </div>
      <div class="card-body">
        <div class="table-responsive">
          <a class="btn btn-primary btn-block col-md-1" href="index.php?page=form_jurusan" style="font-size: 14px;float: left;margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah</a>
        <table id="dt_tabel" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Jurusan</th>
              <th>Jurusan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
              <th>No</th>
              <th>Kode Jurusan</th>
              <th>Jurusan</th>
              <th>Opsi</th>
          </tfoot>
        
        <tbody>
        
        <?php
        include('../config/koneksi.php');
          $sql = "SELECT * FROM tb_jurusan ORDER BY id_jurusan DESC";
          $query = mysqli_query($koneksi,$sql);
          if(mysqli_num_rows($query)==0){  
            //jika data kosong, maka akan menampilkan row kosong
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
          }else{ 
            $no = 1;  
            while ($data =mysqli_fetch_assoc($query)){ ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['kd_jurusan'];?></td>
                <td><?php echo $data['jurusan'];?></td>
                <td><?php echo '
                <a class="btn btn-danger fa fa-pencil" data-toggle="tooltip" data-placement="bottom" title="Edit" href="index.php?page=f_edit_jurusan&id='.$data['id_jurusan'].'"></a>  
                <a class="btn btn-warning fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus" href="php/jurusan/hapus_jurusan.php?id='.$data['id_jurusan'].'" onclick="return confirm(\'Apakah Anda Yakin Ingin Mengahapus Data ini?\')"></a>
                ';?>
                </td>

              </tr>
        <?php 
            $no++;
            }
          }  
        ?>

        </tbody>
      </table>

      <script>
        $(document).ready(function() {
        $('#dt_tabel').DataTable();
        });
      </script>

    </div>
  </div>
</div>


</div>


