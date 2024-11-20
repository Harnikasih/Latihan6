<?php
include "koneksi.php"; // Memasukkan koneksi database

// Mendapatkan data dari database berdasarkan id yang dikirim melalui URL
$id = $_GET['id'];
$query = "SELECT * FROM biodata WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Jika form disubmit, update data di database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tmpt_lahir = $_POST['tmpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
      // Menyiapkan query untuk update data
      $updateQuery = "UPDATE biodata SET nama = ?, alamat = ?, tempat_lahir = ?, tgl_lahir = ? WHERE id = ?";
      $updateStmt = $mysqli->prepare($updateQuery);
      $updateStmt->bind_param("ssssi", $nama, $alamat, $tmpt_lahir, $tgl_lahir, $id);
  
      // Mengeksekusi query dan redirect jika berhasil
      if ($updateStmt->execute()) {
          header('Location: index.php'); // Redirect ke halaman utama setelah berhasil update
          exit();
      } else {
          echo "Error updating record: " . $updateStmt->error;
      }
  
      $updateStmt->close();
  }
  
  $stmt->close();
  ?>
  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
            height: 60px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Form Edit Data Mahasiswa</h1>
    <form method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" required><?= htmlspecialchars($row['alamat']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="tmpt_lahir">Tempat Lahir</label>
            <input type="text" id="tmpt_lahir" name="tmpt_lahir" value="<?= htmlspecialchars($row['tempat_lahir']); ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= htmlspecialchars($row['tgl_lahir']); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit">Update</button>
        </div>
    </form>
</div>

</body>
</html>





  
