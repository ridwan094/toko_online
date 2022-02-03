<?php
session_start();
//Menghancurkan $_SESSION["pelanggan"]
session_destroy();
echo "<script>alert('Anda telah logout');</script>";
echo "<script>location='index.php';</script>";
?>