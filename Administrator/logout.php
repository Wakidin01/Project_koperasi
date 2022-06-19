<?php
session_start();

$_SESSION['namaadm'] = '';
unset($_SESSION['namaadm']);
session_unset();
session_destroy();
echo"<script language = 'JavaScript'>
            alert('Anda Telah Keluar Dari Sistem !');
            document.location='../index.php';
            </script>";
?>