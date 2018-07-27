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
    <li class="breadcrumb-item active">Data Jadwal Perkuliahan</li>
  </ol>
  
<div class="card mb-3">
  <div class="card-header"><i class="fa fa-table"></i> 
    Data Tabel Jadwal Perkuliahan
  </div>
      <div class="card-body">
        <div class="table-responsive">
          <a class="btn btn-primary btn-block col-md-1" href="index.php?page=form_jadwal" style="font-size: 14px;float: left;margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah</a>

        <table id="dt_tabel" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Hari</th>
              <th>Waktu</th>
              <th>Matakuliah</th>
              <th>SKS</th>
              <th>Dosen</th>
              <th>Ruang</th>
              <th>Jurusan</th>
              <th>Semester</th>
              <th>Kelas</th>

              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
              <th>No</th>
              <th>Hari</th>
              <th>Waktu</th>
              <th>Matakuliah</th>
              <th>SKS</th>
              <th>Dosen</th>
              <th>Ruang</th>
              <th>Jurusan</th>
              <th>Semester</th>
              <th>Kelas</th>
              <th>Opsi</th>
          </tfoot>
        
        <tbody>
        
        <?php
        include('../config/koneksi.php');
          $sql = "SELECT * FROM tb_matkul,tb_jadwal,tb_dosen,tb_jurusan 
                  WHERE tb_jurusan.kd_jurusan=tb_jadwal.kd_jurusan AND tb_matkul.kd_matkul=tb_jadwal.kd_matkul AND tb_dosen.id_dosen=tb_jadwal.kd_dosen  
                  ORDER BY id_jadwal DESC";
          $query = mysqli_query($koneksi,$sql);
          if(mysqli_num_rows($query)==0){  
            //jika data kosong, maka akan menampilkan row kosong
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
          }else{ 
            $no = 1;  
            while ($data =mysqli_fetch_assoc($query)){ ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['hari'];?></td>
                <?php 
                  $waktu1 = date('H:i', strtotime($data['waktu1']));
                  $waktu2 = date('H:i', strtotime($data['waktu2']));
                ?>
                <td><?php echo $waktu1;?> - <?php echo $waktu2;?></td>
                <td><?php echo $data['matkul'];?></td>
                <td><?php echo $data['sks'];?></td>
                <td><?php echo $data['dosen'];?></td>
                <td><?php echo $data['kd_ruang'];?></td>
                <td><?php echo $data['jurusan'];?></td>
                <td><?php echo $data['semester'];?></td>
                <td><?php echo $data['kelas'];?></td>

                <td><?php echo '
                <a class="btn btn-danger fa fa-pencil" data-toggle="tooltip" data-placement="bottom" title="Edit" href="index.php?page=f_edit_jadwal&id='.$data['id_jadwal'].'"></a>  
                <a class="btn btn-warning fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus" href="php/jadwal/hapus_jadwal.php?id='.$data['id_jadwal'].'" onclick="return confirm(\'Apakah Anda Yakin Ingin Mengahapus Data ini?\')"></a>
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

      <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $(".dropdown-menu li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      </script>

    </div>
  </div>
</div>


</div>


