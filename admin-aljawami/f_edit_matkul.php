<?php
include('php/cek_akses.php');
include('../config/koneksi.php');

$id=$_GET['id'];
$sql="SELECT * FROM tb_matkul,tb_jurusan WHERE tb_jurusan.kd_jurusan=tb_matkul.kd_jurusan AND id_matkul='$id' ";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);  
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
    <div class="card-header"><i class="fa fa-table"></i> Edit Data Matakuliah</div>
      <div class="card-body">
      <form action="php/matakuliah/edit_matkul.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <tr>
          <td width="250px">Kode Matakuliah *</td>
          <td>
            <input class="form-control col-md-5" name="kd_matkul" type="text" value="<?php echo $r['kd_matkul']; ?>" required>
          </td>
        </tr>
        
        <tr>
          <td>Nama Matakuliah *</td>
          <td><input class="form-control col-md-5" name="nama_matkul" type="text" value="<?php echo $r['matkul']; ?>" required></td>
        </tr>
        <tr>
          <td>Jurusan *</td>
          <td>
            <select class="form-control col-md-5" name="jurusan">
              <option value="<?php echo $r['kd_jurusan'];?>"><?php echo $r['jurusan'];?></option>
              <?php
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
            <!--<input class="form-control col-md-5" name="sks" type="text" value="<?php //echo $r['sks']?>">
            -->
            <select class="form-control col-md-1" name="sks">
              <option value="<?php echo $r['sks'];?>"><?php echo $r['sks'];?></option>
              <option value=0>0</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Semester *</td>
          <td>
           <!-- <input class="form-control col-md-5" name="no_hp" type="text" value="<?php //echo $r['semester']?>">
          -->
          <select class="form-control col-md-1" name="semester" required>
              <option value="<?php echo $r['semester'];?>"><?php echo $r['semester'];?></option>
              <option value=1>1</option>
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
      <a href="index.php?page=dt_matkul" class="btn btn-large btn-danger"><i class="fa fa-times"></i> Back</a>
     </form>

    </div>
  </div>
</div>  

  
