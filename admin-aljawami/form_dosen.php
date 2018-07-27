<?php
include('php/cek_akses.php');
?>
<!--Content isi-->
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Dosen</li>
  </ol>
    
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i> Form Data Dosen</div>
      <div class="card-body">
      <form action="php/dosen/tambah_dosen.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <tr>
          <td width="170px">NIP *</td>
          <td>
            <input class="form-control col-md-5" name="nip" type="text" placeholder="Enter NIP" required>
          </td>
        </tr>
        
        <tr>
          <td>Nama Dosen *</td>
          <td><input class="form-control col-md-5" name="nama_dosen" type="text" placeholder="Enter Nama Dosen" required ></td>
        </tr>
        <tr>
          <td>Dosen Prodi</td>
          <td>
          <select class="form-control col-md-5" name="d_prodi">
            <option value="" selected>-- Pilih Jurusan --</option>
              <?php
              include ('../config/koneksi.php');
                $sql = "SELECT * FROM tb_jurusan ORDER BY id_jurusan DESC";
                $query = mysqli_query($koneksi,$sql);
                while ($data =mysqli_fetch_array($query)){
                   echo '<option value="'.$data['jurusan'].'" >'.$data['kd_jurusan'].' - '.$data['jurusan'].'</option>';   
                }
              ?>
          </select>  
          </td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>
            <input class="form-control col-md-5" name="email" type="email" placeholder="Enter E-mail">
          </td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td>
            <input class="form-control col-md-5" name="no_hp" type="text" placeholder="Enter Nomor Hp">
          </td>
        </tr>
        </tbody>
      </table>
    <font color="red"><i>* Data tidak boleh kosong, harus diisi !</i></font>
    </br><br>
      &nbsp;&nbsp;
      <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;
      <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;
      <a href="index.php?page=dt_dosen" class="btn btn-large btn-danger"><i class="fa fa-table"></i> View Data Dosen</a>

     </form>

    </div>
  </div>
</div>  
