<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        /* Basic styling for the body and headings */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Styling for the form */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        select {
            padding: 8px;
            font-size: 16px;
            margin-right: 10px;
        }
        button {
            padding: 8px 15px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }

        /* Styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling for links */
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Styling for "Tambah Data" link */
        .add-data-link {
            display: inline-block;
            margin-top: 15px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }
        .add-data-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <form action="" method="get">
        <select name="filter">
            <?php
            $q_alamat = "SELECT alamat FROM biodata GROUP BY alamat";
            $r_alamat = $mysqli->query($q_alamat);
            while($data_alamat = $r_alamat->fetch_assoc()){
            ?>
             <option value="<?= $data_alamat['alamat'];?>"><?php echo $data_alamat['alamat'];?></option>
            <?php
            }
            ?>
        </select>
        <button>Filter</button>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tempat_Lahir</th>
            <th>Tanggal_Lahir</th>
            <th>Aksi</th>
        </tr>
        <?php
        if(isset($_GET['filter'])){
            $query = "SELECT * FROM biodata WHERE alamat='$_GET[filter]'";
        } else {
            $query = "SELECT * FROM biodata";
        }
        $result = $mysqli->query($query);
        $no = 0;
        while($row = $result->fetch_assoc()){
            $no++;
        ?>
            <tr>
                <td><?= $no;?></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['alamat'];?></td>
                <td><?= $row['tempat_lahir'];?></td>
                <td><?= $row['tgl_lahir'];?></td>
                <td>
                    <a href="<?= 'form-edit.php?id='.$row['id'];?>">Edit</a>
                    <a href="<?= 'hapus-data.php?id='.$row['id'];?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <a href="form-data.php">Tambah Data</a>
</body>
</html>

