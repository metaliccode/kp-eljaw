<?php
include('php/cek_akses.php');
?>
<!--Content isi-->
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Kelas Mahasiswa</li>
  </ol>
    
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i> Form Data Kelas Mahasiswa</div>
      <div class="card-body">
      <form action="php/kelas/tambah_kelas.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <tr>
          <td width="170px">Kode Kelas</td>
          <td>
            <input class="form-control col-md-5" name="kd_kelas" type="text" placeholder="Enter Kode Kelas" required>
          </td>
        </tr>
        
        <tr>
          <td>Kelas</td>
          <td><input class="form-control col-md-5" name="kelas" type="text" placeholder="Enter Nama Kelas" required ></td>
        </tr>
        <tr>
          <td colspan=3>
          <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
          <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
          <a href="index.php?page=dt_kelas" class="btn btn-large btn-danger"><i class="fa fa-table"></i> View Data Kelas</a></td>
        </tr>
        </tbody>
      </table>
     </form>

    </div>
  </div>
</div>  
