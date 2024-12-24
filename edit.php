<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $Id = $_POST['Id'];
    $Nama_Alat = $_POST['nama_alat'];
    $Jenis_Alat = $_POST['jenis_alat'];
    $Tanggal_Kalibrasi = $_POST['tanggal_kalibrasi'];
    $Keterangan = $_POST['keterangan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE alat SET nama_alat='$Nama_Alat', jenis_alat='$Jenis_Alat', tanggal_kalibrasi='$Tanggal_Kalibrasi', keterangan='$Keterangan' WHERE Id=$Id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$Id = $_GET['Id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM alat WHERE Id=$Id");

while($user_data = mysqli_fetch_array($result))
{
    $Nama_Alat = $user_data['Nama_Alat'];
    $Jenis_Alat = $user_data['Jenis_Alat'];
    $Tanggal_Kalibrasi = $user_data['Tanggal_Kalibrasi'];
    $Keterangan = $user_data['Keterangan'];
}
?>

<html>
<head>  
    <title>Edit Alat Kalibrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: none;
            color: #666;
        }
        a:hover {
            color: #000;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        td {
            padding: 10px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php">Home</a>
        <h2>Edit Alat Kalibrasi</h2>

        <form name="update_user" method="post" action="edit.php">
            <table>
                <tr> 
                    <td>Nama Alat</td>
                    <td><input type="text" name="nama_alat" value="<?php echo $Nama_Alat; ?>"></td>
                </tr>
                <tr> 
                    <td>Jenis Alat</td>
                    <td><input type="text" name="jenis_alat" value="<?php echo $Jenis_Alat; ?>"></td>
                </tr>
                <tr> 
                    <td>Tanggal Kalibrasi</td>
                    <td><input type="date" name="tanggal_kalibrasi" value="<?php echo $Tanggal_Kalibrasi; ?>"></td>
                </tr>
                <tr> 
                    <td>Keterangan</td>
                    <td><input type="text" name="keterangan" value="<?php echo $Keterangan; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="Id" value="<?php echo $_GET['Id']; ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
