<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toko Skincare</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="insert_product.php" method="post">
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama"><br><br>
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori_id">
            <?php
            include 'koneksi.php';
            $result = $conn->query("SELECT * FROM Tb_kategori");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['kategori']}</option>";
            }
            ?>
        </select><br><br>
        <button type="submit">Simpan</button>
    </form>

    <h1>Tambah Kategori</h1>
    <form action="insert_kategori.php" method="post">
        <label for="kategori">Nama Kategori:</label>
        <input type="text" id="kategori" name="kategori"><br><br>
        <button type="submit">Simpan</button>
    </form>

    <h1>Daftar Produk</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT Tb_product.id, Tb_product.nama, Tb_kategori.kategori FROM Tb_product INNER JOIN Tb_kategori ON Tb_product.kategori_id=Tb_kategori.id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nama']}</td>
                    <td>{$row['kategori']}</td>
                    <td>
                        <a href='edit_product.php?id={$row['id']}'>Edit</a>
                        <a href='delete_product.php?id={$row['id']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

    <h1>Daftar Kategori</h1>
    <table border="1">
        <tr>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM Tb_kategori");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['kategori']}</td>
                    <td>
                        <a href='edit_kategori.php?id={$row['id']}'>Edit</a>
                        <a href='delete_kategori.php?id={$row['id']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>