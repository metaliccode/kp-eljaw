<?php
include('php/cek_akses.php');
include('../config/koneksi.php');

$id=$_GET['id'];
$sql="SELECT * FROM tb_dosen WHERE id_dosen='$id' ";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);  
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
    <div class="card-header"><i class="fa fa-table"></i> Edit Data Dosen</div>
      <div class="card-body">
      <form action="php/dosen/edit_dosen.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <tr>
          <td width="250px">NIP *</td>
          <td>
            <input class="form-control col-md-5" name="nip" type="text" value="<?php echo $r['nip']; ?>" required>
          </td>
        </tr>
        
        <tr>
          <td>Nama Dosen *</td>
          <td><input class="form-control col-md-5" name="nama_dosen" type="text" value="<?php echo $r['dosen']; ?>" required ></td>
        </tr>
        <tr>
          <td>Dosen Prodi</td>
          <td>
            <select class="form-control col-md-5" name="d_prodi">
              <option value="<?php echo $r['d_prodi'];?>"><?php echo $r['d_prodi'];?></option>
              <?php
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
            <input class="form-control col-md-5" name="email" type="email" value="<?php echo $r['email']?>">
          </td>
        </tr>
        <tr>
          <td>No HP</td>
          <td>
            <input class="form-control col-md-5" name="no_hp" type="text" value="<?php echo $r['no_hp']?>">
          </td>
        </tr>
        </tbody>
      </table>
      <font color="red"><i>* Data tidak boleh kosong, harus diisi !</i></font>
    </br><br>
      &nbsp;&nbsp;
      <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;
      <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;
      <a href="index.php?page=dt_dosen" class="btn btn-large btn-danger"><i class="fa fa-times"></i> Back</a>
     </form>

    </div>
  </div>
</div>  

  
