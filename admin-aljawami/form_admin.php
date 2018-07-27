<?php
include('php/cek_akses.php');
?>
<!--Content isi-->
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Admin User</li>
  </ol>
    
  <div class="card mb-3">
    <div class="card-header"><i class="fa fa-table"></i> Form Data Admin User</div>
      <div class="card-body">
      <form action="php/admin_user/tambah_user.php" method="POST">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <tbody>
        <tr>
          <td width="170px">Nama Lengkap *</td>
          <td>
            <input class="form-control col-md-5" name="nama" type="text" placeholder="Enter Nama Lengkap" required>
          </td>
        </tr>
        
        <tr>
          <td>Username *</td>
          <td><input class="form-control col-md-5" name="username" type="text" placeholder="Enter Username" required ></td>
        </tr>
        <tr>
          <td>Password *</td>
          <td>
            <input class="form-control col-md-5" name="password" type="password" placeholder="Enter Password" required>&nbsp;<font color="red"><i>*password minimal 6 - 25 karakter</i></font>
          </td>
        </tr>
        <tr>
          <td>Password Confirm *</td>
          <td>
            <input class="form-control col-md-5" name="password2" type="password" placeholder="Enter Password Confirm" required >
          </td>
        </tr>
        </tbody>
      </table>
      <font color="red"><i>* Data tidak boleh kosong, harus diisi !</i></font>
    </br><br>
      &nbsp;&nbsp;
      <input type="submit" name="tambah" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;
      <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;
      <a href="index.php?page=dt_admin" class="btn btn-large btn-danger"><i class="fa fa-table"></i> View Data Admin</a></td>
     </form>

    </div>
  </div>
</div>  
