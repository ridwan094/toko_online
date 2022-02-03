<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <!-- Jika sudah login(ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])) : ?>
                <!-- Selain itu(belum login/belum ada session pelanggan) -->
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else : ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="daftar.php">Daftar</a></li>
            <?php endif ?>
            <li><a href="checkout.php">Checkout</a></li>
        </ul>

        <form action="pencarian.php" method="get" class="navbar-form navbar-right">
            <input type="text" class="form-control" name="keyword">
            <button class="btn-primary btn">Cari</button>
        </form>
    </div>
</nav>