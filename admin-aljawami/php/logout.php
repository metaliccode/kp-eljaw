<?php
unset($_SESSION['user_admin']);
unset($_SESSION['nama_admin']);
session_start();
session_destroy();
header('location:../../index.html');
?>