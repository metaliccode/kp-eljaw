<?php
include('../../config/koneksi.php');
IF(ISSET($_POST['login'])){

$user = $_POST['username'];
$pass = md5($_POST['password']);
//$pass = $_POST['password'];

$sql = "SELECT * FROM tb_admin WHERE username='$user' AND password='$pass' ";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$dt=mysqli_fetch_array($login);

if($ketemu>0){
	echo "<script language=\"javascript\">alert(\"Selamat datang Admin E-Schedule AL-JAWAMI !!!\");</script>";
	session_start();
	$_SESSION['nama_admin'] 	= $dt['nama_admin'];
	$_SESSION['user_admin']		= $dt['username'];	
	header('location: ../index.php?page=home');
}else{
	echo "<script language=\"javascript\">alert(\"Password atau Username Salah !!!\");window.history.back()</script>";
}

}
?>
