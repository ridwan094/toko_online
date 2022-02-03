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
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel-default panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn-primary btn" name="login">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //Jika ada tombol login(tombol login ditekan)
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Lakukan query check akun di table pelanggan di db
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        //Menghitung akun yang terambil
        $akunyangcocok = $ambil->num_rows;

        //Jika 1 akun yang cocok, maka diloginkan
        if ($akunyangcocok == 1) {
            //Anda sukses login
            //Mendapatkan akun dalam bentuk array
            $akun = $ambil->fetch_assoc();
            //Simpan di session pelanggan
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert('anda sukses login');</script>";

            //Jika sudah belanja
            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
                echo "<script>location='checkout.php';</script>";
            } else {
                echo "<script>location='riwayat.php';</script>";
            }
        } else {
            //Anda gagal login
            echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>
</body>

</html>l