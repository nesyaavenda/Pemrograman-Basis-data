<?php

include "../koneksi.php";

$Kode_Jurusan	= $_GET["Kode_Jurusan"];


$query = $konek->prepare("DELETE FROM jurusan WHERE Kode_Jurusan='$Kode_Jurusan'");
$query->execute();

if ($query) {
	header("Location:jurusan.php");
	exit();
}
die("Terdapat kesalahan : ");
