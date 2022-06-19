<?php
session_start();

$_SESSION['namamg'] = '';
unset($_SESSION['namamg']);
session_unset();
session_destroy();
echo"<script language = 'JavaScript'>
            alert('Anda Telah Keluar Dari Sistem !');
            document.location='../index.php';
            </script>";
?>