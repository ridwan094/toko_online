<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <section class="content">
        <div class="container">
            <!-- Nota disini copas saja dari nota yang ada di admin -->
            <h2>Detail Pembelian</h2>
            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
        ON pembelian.id_pelanggan=pelanggan.id_pelanggan
        WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <!-- Jika pelanggan yang beli != pelanggan yang login, maka dilarikan ke riwayat.php karena dia tidak berhak melihat nota orang lain -->
            <!-- Pelanggan yang beli == pelanggan yang login -->
            <?php
            //Mendapatkan id_pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];

            //Mendapatkan id_pelanggan yang login
            $idpelangganyanglogin = $_SESSION["pelanggan"]['id_pelanggan'];

            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('Jangan nakal!');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
                    Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
                    Total: <?php echo number_format($detail['total_pembelian']) ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        <?php echo $detail['telepon_pelanggan']; ?><br>
                        <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota'] ?></strong> <br>
                    Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
                    Alamat: <?php echo $detail['alamat_pengiriman'] ?>
                </div>
            </div>

            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Subberat</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?> Gr.</td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td><?php echo $pecah['subberat']; ?> Gr.</td>
                            <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-7">
                    <div class="alert-info alert">
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                            <strong>BANK MANDIRI 137-001088-3276 AN. Ridwan Saefudin</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>