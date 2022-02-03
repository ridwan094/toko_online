<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel-default panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Pelanggan</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Password</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-7">
                                        <textarea name="alamat" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Telp/HP</label>
                                    <div class="col-md-7">
                                        <input type="number" class="form-control" name="telepon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button class="btn-primary btn" name="daftar">Daftar</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            //Jika ada tombol daftar(ditekan tombol daftar)
                            if (isset($_POST["daftar"])) {
                                //Mengambil isian nama,email,password,alamat,telepon
                                $nama = $_POST["nama"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                                $alamat = $_POST["alamat"];
                                $telepon = $_POST["telepon"];

                                //Check apakah email sudah digunakan
                                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                                $yangcocok = $ambil->num_rows;
                                if ($yangcocok == 1) {
                                    echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
                                    echo "<script>location='daftar.php';</script>";
                                } else {
                                    //Query insert ke tabel pelanggan
                                    $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,
                                        nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
                                        VALUES ('$email','$password','$nama','$telepon','$alamat') ");
                                    
                                    echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
                                    echo "<script>location='login.php';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>