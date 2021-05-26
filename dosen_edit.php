<?php
include "../koneksi.php";

$NIP 			= $_POST["NIP"];
$Nama_Dosen 	= $_POST["Nama_Dosen"];
$Tanggal_Lahir 	= $_POST["Tanggal_Lahir"];
$JK 			= $_POST["JK"];
$Alamat 		= $_POST["Alamat"];
$No_Telp 		= $_POST["No_Telp"];

$query = $konek->prepare("UPDATE dosen SET Nama_Dosen='$Nama_Dosen', Tanggal_Lahir='$Tanggal_Lahir', JK='$JK', 
Alamat='$Alamat', No_Telp='$No_Telp' WHERE NIP='$NIP'");
$query->execute();

if ($query) {
	header("Location: dosen.php");
	exit();
}
die("Terdapat kesalahan : ");
