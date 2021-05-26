<?php

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "a_akademik";

$konek = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password, array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
