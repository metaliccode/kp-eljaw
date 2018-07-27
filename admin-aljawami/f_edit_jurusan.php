<?php
include('php/cek_akses.php');
include('../config/koneksi.php');

$id=$_GET['id'];
$sql="SELECT * FROM tb_jurusan WHERE id_jurusan='$id' ";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);  
?>
   

<!--Content isi-->
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Jurusan</li>
  </ol>
    
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i>Edit Data Jurusan</div>
      <div class="card-body">
      <form action="php/jurusan/edit_jurusan.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <tr>
          <td width="170px">Kode Jurusan</td>
          <td>
            <input class="form-control col-md-5" name="kd_jurusan" type="text" value="<?php echo $r['kd_jurusan']; ?>" required>
          </td>
        </tr>
        
        <tr>
          <td>Nama Jurusan</td>
          <td><input class="form-control col-md-5" name="nama_jurusan" type="text" value="<?php echo $r['jurusan']; ?>" required ></td>
        </tr>

        <tr>
          <td colspan=3>
          <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
          <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
          <a href="index.php?page=dt_jurusan" class="btn btn-large btn-danger"><i class="fa fa-times"></i> Back</a></td>
        </tr>
        </tbody>
      </table>
     </form>

    </div>
  </div>
</div>  

  
