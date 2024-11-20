<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$query = "UPDATE biodata set
    nama='$nama',
    alamat='$alamat',
    tempat_lahir='$tmpt_lahir',
    tgl_lahir='$tgl_lahir'
    WHERE id='$_GET[id]'
    ";
$mysqli->query($query);
header('location:index.php');
?>