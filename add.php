<style type="text/css">
    body {
        font-family: Arial, sans-serif;
        background-color: #e0e0e0;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 40%;
        margin: 50px auto;
        background: #f9f9f9;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    h1 {
        text-align: center;
        color: #444444;
    }

    form {
        width: 100%;
    }

    table {
        width: 100%;
        margin: 20px 0;
    }

    table tr td {
        padding: 10px;
        vertical-align: middle;
    }

    input[type="text"], input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #888888;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #555555;
    }

    a {
        display: block;
        text-decoration: none;
        color: #6666cc;
        font-size: 16px;
        text-align: center;
        margin-top: 20px;
    }

    a:hover {
        text-decoration: underline;
    }

    .message {
        margin-top: 20px;
        font-size: 16px;
        color: #444444;
        text-align: center;
    }
</style>

<html>
<head>
    <title>Add Alat</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Alat Kalibrasi</h1>
        <form action="add.php" method="post" name="form1">
            <table>
                <tr> 
                    <td><label for="nama_alat">Nama Alat</label></td>
                    <td><input type="text" id="nama_alat" name="nama_alat"></td>
                </tr>
                <tr> 
                    <td><label for="jenis_alat">Jenis Alat</label></td>
                    <td><input type="text" id="jenis_alat" name="jenis_alat"></td>
                </tr>
                <tr> 
                    <td><label for="tanggal_kalibrasi">Tanggal Kalibrasi</label></td>
                    <td><input type="date" id="tanggal_kalibrasi" name="tanggal_kalibrasi"></td>
                </tr>
                <tr> 
                    <td><label for="keterangan">Keterangan</label></td>
                    <td><input type="text" id="keterangan" name="keterangan"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input type="submit" name="Submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
        
        <a href="index.php">Kembali ke Halaman Utama</a>

        <?php
        if (isset($_POST['Submit'])) {
            $nama_alat = $_POST['nama_alat'];
            $jenis_alat = $_POST['jenis_alat'];
            $tanggal_kalibrasi = $_POST['tanggal_kalibrasi'];
            $keterangan = $_POST['keterangan'];

            include_once("config.php");

            $result = mysqli_query($mysqli, "INSERT INTO alat(nama_alat, jenis_alat, tanggal_kalibrasi, keterangan) VALUES('$nama_alat', '$jenis_alat', '$tanggal_kalibrasi', '$keterangan')");

            echo "<div class='message'>Alat berhasil ditambahkan. <a href='index.php'>Lihat Daftar Alat</a></div>";
        }
        ?>
    </div>
</body>
</html>
