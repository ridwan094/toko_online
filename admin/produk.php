<h2>Data Produk</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_kategori']; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp.<?php echo number_format($pecah['harga_produk']); ?>,00</td>
                <td><?php echo $pecah['berat_produk']; ?> gr.</td>
                <td>
                    <img src="../foto/<?php echo $pecah['foto_produk']; ?>" class="img-thumbnail" width="200" alt="Cinque Terre">
                </td>
                <td><?php echo $pecah['deskripsi_produk']; ?></td>
                <td><?php echo $pecah['stok_produk']; ?></td>
                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn-sm btn" onclick="return confirm('Yakin Hapus?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-warning btn-sm btn"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-info btn-sm btn"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn-primary btn">Tambah Data</a>