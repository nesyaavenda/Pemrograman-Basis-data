<?php

include "../koneksi.php";

$NIM = $_GET["NIM"];

$query = $konek->prepare("DELETE FROM mahasiswa WHERE NIM='$NIM'");
$query->execute();

if ($query) {
	header("Location: mahasiswa.php");
	exit();
}
die("Terdapat kesalahan : ");
