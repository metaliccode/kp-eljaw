<?php
include('php/cek_akses.php');
?>
<!--Content isi-->
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Matakuliah</li>
  </ol>
    
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i> Form Data Matakuliah</div>
      <div class="card-body">
      <form action="php/matakuliah/tambah_matkul.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <tr>
          <td width="170px">Kode Matakuliah *</td>
          <td>
            <input class="form-control col-md-5" name="kd_matkul" type="text" placeholder="Enter Kode Matakuliah" required>
          </td>
        </tr>
        
        <tr>
          <td>Nama Matakuliah *</td>
          <td><input class="form-control col-md-5" name="nama_matkul" type="text" placeholder="Enter Nama Matakuliah" required ></td>
        </tr>
        <tr>
          <td>Jurusan *</td>
          <td>
          <select class="form-control col-md-5" name="jurusan" required>
            <option value="" selected>-- Pilih Jurusan --</option>
              <?php
              include ('../config/koneksi.php');
                $sql = "SELECT * FROM tb_jurusan ORDER BY id_jurusan DESC";
                $query = mysqli_query($koneksi,$sql);
                while ($data =mysqli_fetch_array($query)){
                   echo '<option value="'.$data['kd_jurusan'].'" >'.$data['kd_jurusan'].' - '.$data['jurusan'].'</option>';   
                }
              ?>
          </select>  
          </td>
        </tr>
        <tr>
          <td>SKS *</td>
          <td>
            <select class="form-control col-md-1" name="sks" required>
              <option value=0 selected>0</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
            </select>
            <!--<input class="form-control col-md-5" name="sks" type="text" placeholder="Enter Jumlah SKS" required>-->
          </td>
        </tr>
        <tr>
          <td>Semester *</td>
          <td>
            <!--<input class="form-control col-md-5" name="semester" type="text" placeholder="Enter Semester">
            -->
            <select class="form-control col-md-1" name="semester" required>
              <option value=1 selected>1</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
              <option value=5>5</option>
              <option value=6>6</option>
              <option value=7>7</option>
              <option value=8>8</option>
            </select>
          </td>
        </tr>
        </tbody>
      </table>
    <font color="red"><i>* Data tidak boleh kosong, harus diisi !</i></font>
    </br><br>
      &nbsp;&nbsp;
      <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;
      <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;
      <a href="index.php?page=dt_matkul" class="btn btn-large btn-danger"><i class="fa fa-table"></i> View Data Matakuliah</a>

     </form>

    </div>
  </div>
</div>  
