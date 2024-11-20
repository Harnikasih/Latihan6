<?php
$mysqli = new mysqli("localhost", "root", "",
"db_mhs");

 if ($mysqli->connect_error) {
 die("Koneksi gagal: " . $mysqli->connect_error);
}

?>