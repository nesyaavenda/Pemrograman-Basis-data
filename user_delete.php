<?php

include "../koneksi.php";

$Id_User	= $_GET["Id_User"];


$query = $konek->prepare("DELETE FROM user WHERE Id_User='$Id_User'");
$query->execute();

if ($query) {
	header("Location: user.php");
	exit();
}
die("Terdapat kesalahan : ");
