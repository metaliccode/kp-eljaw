<?php
if(isset($_GET['id'])){
	
	include('../../../config/koneksi.php');
	
	$id = $_GET['id'];
	
	$sql = "SELECT id_admin FROM tb_admin WHERE id_admin='$id' ";
	$cek = mysqli_query($koneksi, $sql);

	if(mysqli_num_rows($cek) == 0){
		
		echo '<script>window.history.back()</script>';
	
	}else{
		
		$sql1 = "DELETE FROM tb_admin WHERE id_admin='$id' ";
		$del = mysqli_query($koneksi, $sql1);
		if($del){
			echo "<script>alert('Data Berhasi Dihapus !');window.location='../../index.php?page=dt_admin';</script>";
		}else{
			echo "<script>alert('Gagal Mengahapus Data !');window.location='../../index.php?page=dt_admin';</script>";		
		}	
	}
	
}else{
	echo '<script>window.history.back()</script>';
	
}
?>