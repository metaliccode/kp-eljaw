<?php
if(isset($_POST['tambah'])){
	
	include('../../../config/koneksi.php');
	
	$nip 			= addslashes(strip_tags ($_POST['nip'])); 
	$nama_dosen 	= addslashes(strip_tags ($_POST['nama_dosen'])); 
	//$d_prodi	 	= $_POST['d_prodi'];
	$d_prodi	 	= addslashes(strip_tags ($_POST['d_prodi']));
	$email	 		= $_POST['email'];
	$no_hp 			= $_POST['no_hp']; 

	if ($nip&&$nama_dosen) {

	$sql = "INSERT INTO tb_dosen SET id_dosen='', nip='$nip', dosen='$nama_dosen', d_prodi='$d_prodi', email='$email', no_hp='$no_hp' ";
	$simpan=mysqli_query($koneksi,$sql);

		if($simpan){
				echo "<script>alert('Data Berhasil Ditambahkan !');window.location='../../index.php?page=dt_dosen';</script>";
			}else{
				echo "<script>alert('Data Gagal Ditambahkan, No nip tidak unique !');window.history.back()</script>";	
			}

	}else{
		echo "<script>alert('Data masih belum lengkap !');window.history.back()</script>";
	}		

}else{	
	echo '<script>window.history.back()</script>';

}
?>