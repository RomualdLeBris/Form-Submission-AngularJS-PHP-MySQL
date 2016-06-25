<?php

$data = json_decode(file_get_contents("php://input"));


$con = mysqli_connect("localhost","root","root", "paybox");


$unom = mysqli_escape_string($con, $data->unom);
$uprenom = mysqli_escape_string($con, $data->uprenom);
$uemail = mysqli_escape_string($con, $data->uemail);
$utel = mysqli_escape_string($con, $data->utel);
$uadresse = mysqli_escape_string($con, $data->uadresse);
$ucp = mysqli_escape_string($con, $data->ucp);
$uville = mysqli_escape_string($con, $data->uville);

// Check connection

if (mysqli_connect_errno()) {

	echo "Failed to connect to MYSQL : " . mysqli_connect_error();
}

// Perform queries

mysqli_query($con, "INSERT INTO `users`(`nom`, `prenom`, `email`, `telephone`, `adresse`, `cp`, `ville`) VALUES ('". $unom ."','". $uprenom ."','". $uemail ."','". $utel ."','". $uadresse ."','". $ucp. "','".$uville."')");

mysqli_close($con);






?>
