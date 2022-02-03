<?php 
session_start();
include 'koneksi.php'; 
?>
<?php
//Mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//Query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail["nama_produk"] ?></h2>
                    <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
                    <h5>Stok: <?php echo $detail['stok_produk'] ?></h5>

                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah" 
                                max="<?php echo $detail['stok_produk'] ?>">
                                <div class="input-group-btn">
                                    <button class="btn-primary btn" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    //Jika ada tombol beli
                    if (isset($_POST["beli"])) {
                        //Mendapatkan jumlah yang diinputkan
                        $jumlah = $_POST["jumlah"];
                        //Masukkan di keranjang belanja
                        $_SESSION["keranjang"][$id_produk] = $jumlah;

                        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>

                    <p><?php echo $detail["deskripsi_produk"]; ?></p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>