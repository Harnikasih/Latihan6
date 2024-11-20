<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
        hr {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: blue;
        }
    </style>

</head>
<body>
    <h1>Form Tambah Data Mahasiswa</h1>
    <form action="tambah-data.php" method="get">
        <label for="nama">Nama</label>
        <input type="text" name="nama" /><br/>
        <label for="alamat">Alamat</label>
        <textarea name="alamat"></textarea></br>
        <label for="tmpt_lahir">Tempat Lahir</label>
        <input type="text" name="tmpt_lahir" /><br/>
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" /><br/>
        <button>Simpan</button>
    </form>
</body>
</html>