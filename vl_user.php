<?php
session_start();
include "koneksi.php";

$Username = $_POST["Username"];
$Password = $_POST["Password"];

// Validasi Login
if ($_POST) {

	$queryuser = "SELECT * FROM user WHERE Username='$Username'";
	$query = $konek->prepare($queryuser);
	$query->execute();
	while ($user = $query->fetch()) {
		if ($user) {
			if (password_verify($Password, $user["Password"])) {

				$_SESSION["Username"] 			= $user["Username"];
				$_SESSION["Password"] 			= $user["Password"];
				$_SESSION["Id_Usergroup_User"] 	= $user["Id_Usergroup_User"];
				$_SESSION["Id_User"] 			= $user["Id_User"];
				$_SESSION["Foto"]				= $user["Foto"];
				$_SESSION["Login"] 				= true;

				if ($_SESSION["Id_Usergroup_User"] == 1) {
					header("Location: admin/index.php");
					exit();
				} else if ($_SESSION["Id_Usergroup_User"] == 2) {
					header("Location: dosen/index.php");
					exit();
				} else if ($_SESSION["Id_Usergroup_User"] == 3) {
					header("Location: mahasiswa/index.php");
					exit();
				} else {
					header("Location :pagenotfound.php");
					exit();
				}
			} else {
				header("Location: index.php?Err=4");
				exit();
			}
		} else if (empty($Username) && empty($Password)) {
			header("Location: index.php?Err=1");
			exit();
		} else if (empty($Username)) {
			header("Location: index.php?Err=2");
			exit();
		} else if (empty($Password)) {
			header("Location: index.php?Err=3");
			exit();
		} else {
			header("Location: index.php?Err=5");
			exit();
		}
	}
}
