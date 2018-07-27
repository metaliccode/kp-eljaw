<?php
if(isset($_POST['tambah'])){
	
	include('../../../config/koneksi.php');
	$id 			= $_POST['id'];
	$nip			= $_POST['nip'];
	$nama_dosen		= $_POST['nama_dosen'];
	$d_prodi		= $_POST['d_prodi'];	
	$email			= $_POST['email'];
	$no_hp 			= $_POST['no_hp'];	
	
if($nip&&$nama_dosen ){		
	$sql = "UPDATE tb_dosen SET nip='$nip', dosen='$nama_dosen', d_prodi='$d_prodi', email='$email', no_hp='$no_hp' WHERE id_dosen='$id' ";		
	$update = mysqli_query($koneksi,$sql);
	
	if($update){
			echo "<script>alert('Data Berhasil Disimpan !');window.location='../../index.php?page=dt_dosen';</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan !');window.history.back()</script>";	
		}
}else{
	echo "<script>alert('Ada Form Yang kosong, Silahkan Lengkapi Terlebih Dahulu !');window.history.back()</script>";
}

}else{	

	echo '<script>window.history.back()</script>';

}
?>