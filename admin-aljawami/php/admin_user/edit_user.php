<?php
if(isset($_POST['tambah'])){
	
	include('../../../config/koneksi.php');

	$id				= $_POST['id'];
	$nama			= $_POST['nama'];	
	$username		= $_POST['username'];
	//$ps 			= $_POST['ps'];	
	//$pass 		= md5($_POST['pass']);
	//$pass 		= $_POST['pass'];
	$pass1			= $_POST['pass1'];
	$pass2			= $_POST['pass2'];

if (strlen($username) > 15){
 		echo "<script>alert('Username tidak boleh lebih dari 15 karakter!');window.history.back()</script>";
	}else {
	    
	//password harus 6-25 karakter
    if (strlen($pass1) > 25 || strlen($pass2) < 6){
 		echo "<script>alert('Password harus 6-25 karakter!');window.history.back()</script>";
	}else {

    	//cek pas1 & pass2
        if($pass1==$pass2){
            
/*            $sql = "SELECT * FROM tb_admin WHERE username = '$username' ";
            $query = mysqli_query($koneksi,$sql);
            $cek = mysqli_num_rows($query);
        
        //cek username yang sama
        if ($cek == 0) {
*/        	
            $pass1=md5($_POST['pass1']); 
			$sql = "UPDATE tb_admin SET nama_admin='$nama', username='$username', password='$pass1' WHERE id_admin='$id' ";
			$update = mysqli_query($koneksi,$sql);	
				if($update){
					echo "<script>alert('Data Berhasil Disimpan !');window.location='../../index.php?page=dt_admin';</script>";
				}else{
					echo "<script>alert('Data Gagal Disimpan !');window.history.back()</script>";
				}

/*        }

        else {
 			echo "<script>alert('Maaf username yang anda masukkan sudah terdaftar !');window.history.back()</script>";
        }
*/
        }else {
	 		echo "<script>alert('Password yang anda masukkan tidak sama !');window.history.back()</script>";
        }
        
    }
}


}
//else{echo "window.history.back()";}
?>