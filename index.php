<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit(); // Terminate script execution after the redirect
}
?>
<style type="text/css">
    body {
        font-family: Arial, sans-serif;
        background-color: #e0e0e0;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background: #f9f9f9;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .header {
        background-color: #666666;
        color: white;
        text-align: center;
        padding: 10px;
        font-size: 18px;
    }

    h1 {
        text-align: center;
        color: #444444;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: center; /* Teks berada di tengah */
    }

    th {
        background-color: #cccccc;
        color: #333;
        border-right: 2px solid #999; /* Batas garis tebal antar kolom header */
    }

    td {
        border-right: 2px solid #ccc; /* Batas garis antar kolom */
    }

    tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    tr:hover {
        background-color: #e7e7e7;
    }

    a {
        text-decoration: none;
        color: #6666cc;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn-add {
        display: inline-block;
        padding: 10px 15px;
        background-color: #888888;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .btn-add:hover {
        background-color: #555555;
    }
</style>

<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY Id DESC");
?>

<html>
<head>    
    <title>Novia Kalibrasi</title>
</head>

<body>
    <div class="container">
        <h1>Daftar Alat Kalibrasi</h1>
        <a class="btn-add" href="add.php">Tambah Alat</a>

        <table>
            <tr class="header">
                <th>No</th>
                <th>Nama Alat</th>
                <th>Jenis Alat</th>
                <th>Tanggal Kalibrasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php  
            $i = 1;
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$user_data['Nama_Alat']."</td>";
                echo "<td>".$user_data['Jenis_Alat']."</td>";
                echo "<td>".$user_data['Tanggal_Kalibrasi']."</td>";    
                echo "<td>".$user_data['Keterangan']."</td>";    
                echo "<td><a href='edit.php?Id=$user_data[Id]'>Edit</a> | <a href='delete.php?Id=$user_data[Id]'>Delete</a></td>";
                echo "</tr>"; 
                $i++;       
            }
            ?>
        </table>
    </div>
    <div class="container-logout">
    <form action="logout.php" method="POST" class="login-email">
        <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
        <div class="input-group">
            <button type="submit" class="btn">Logout</button>
        </div>
    </form>
</div>
</body>
</html>
