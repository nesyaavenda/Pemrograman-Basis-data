<?php

include "../koneksi.php";

$NIP	= $_GET["NIP"];

$query = $konek->prepare("DELETE FROM dosen WHERE NIP='$NIP'");
$query->execute();

if ($query) {
	header("Location: dosen.php");
	exit();
}
die("Terdapat kesalahan : ");
