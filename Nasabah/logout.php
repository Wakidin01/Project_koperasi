<?php
session_start();

$_SESSION['namanas'] = '';
unset($_SESSION['namanas']);
session_unset();
session_destroy();
echo"<script language = 'JavaScript'>
            alert('Anda Telah Keluar Dari Sistem !');
            document.location='../index.php';
            </script>";
?>