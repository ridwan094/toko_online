<?php
session_start();
include 'koneksi.php';

//Jika tidak ada session pelanggan(belum login)
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

//Mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//Mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//Mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]['id_pelanggan'];

if ($id_pelanggan_login !== $id_pelanggan_beli) {
    echo "<script>alert('Jangan nakal!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>kirim bukti pembayaran Anda disini</p>
        <div class="alert-info alert">Total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto bukti harus JPG maksimal 2MB</p>
            </div>
            <button class="btn-primary btn" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    //Jika ada tombol kirim
    if (isset($_POST["kirim"])) {
        //Upload dulu foto bukti
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        //Simpan pembayaran
        $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
            VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks') ");

        //Update data pembelian dari pending menjadi sudah dikirim
        $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran'
            WHERE id_pembelian='$idpem'");
        
        echo "<script>alert('terimakasih sudah mengirimkan bukti pembayaran');</script>";
        echo "<script>location='riwayat.php';</script>";
    }
    ?>
</body>

</html>