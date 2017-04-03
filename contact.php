<?php

$mysqli = new mysqli('localhost', 'user', 'pass', 'db');
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
$nume=$_POST['nume'];
$subiect=$_POST['subiect'];
$email=$_POST['mail'];
$mesaj=$_POST['mesaj'];

$stmt = $mysqli->prepare("INSERT INTO `contact` (nume,subiect,mesaj,mail)
VALUES ('$nume','$subiect','$mesaj','$email')");
$stmt->bind_param("ssss", $nume,$subiect,$email,$mesaj);
if ($stmt->execute())
{
	echo 'Mesajul tau a fost trimis';
}
else
{
	echo 'Ceva nu a mers bine';
}
$stmt->close();

$sorin='sorinmarica4@gmail.com';
$lucia='luu.ariton@yahoo.com';
$eugen='eugen.vlasie@gmail.com';
$heads="From: $email";
mail($sorin,$subiect,$mesaj,$heads);
mail($eugen,$subiect,$mesaj,$heads);
mail($lucia,$subiect,$mesaj,$heads);
	
$mysqli->close();

?>