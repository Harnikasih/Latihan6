<?php 
include "koneksi.php";
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
$tmpt_lahir = $_GET['tmpt_lahir'];
$tgl_lahir = $_GET['tgl_lahir'];
$query = "INSERT INTO biodata (nama,alamat,tempat_lahir,tgl_lahir) VALUES ('$nama','$alamat','$tmpt_lahir','$tgl_lahir')";
$mysqli->query($query);
header('location:index.php');