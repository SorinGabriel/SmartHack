<?php

$mysqli = new mysqli('localhost', 'user', 'pass', 'db');
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
$mysqli->query('SET character_set_client="utf8",character_set_connection="utf8",character_set_results="utf8";');
$numeechipa=$_POST['numeechipa'];
$univ=$_POST['univ'];
$numarpart=$_POST['numarpart'];
$nrtel=$_POST['nrtel'];
$mail=$_POST['mail'];
$reprezentant=$_POST['reprezentant'];
$participanti=$_POST['participanti'];
$rezultate=$_POST['rezultate'];
$limbaje=$_POST['limbaje'];
$motivatie=$_POST['motivatie'];
$participare=$_POST['participare'];

if (filter_var($mail, FILTER_VALIDATE_EMAIL))
{
	$stmt = $mysqli->prepare("INSERT INTO `inregistrati2`(nume, numarparticipanti, numeparticipanti, numereprezentant, telefon, mail, facultate, rezultatehackatoane, limbajeprogramare, motivatie, participare)
	VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sisssssssss", $numeechipa,$numarpart,$participanti,$reprezentant,$nrtel,$mail,$univ,$rezultate,$limbaje,$motivatie,$participare);
	if ($stmt->execute())
	{
		echo 'Te-ai inscris cu succes';
	}
	else
	{
		if ($stmt->errno == 1062) {
			print 'Cineva s-a inregistrat deja pe aceasta adresa de mail!';
		}
		else
		{
			echo 'Ceva nu a mers bine';
		}
	}
	$stmt->close();

	$today = date("YmdHis"); 
	if (file_exists("backups/inscrisi2".$today.".html"))
	{
		$myfile = fopen("backups/inscrisi2".$today.".html", "r+") or die("Chat error!");
	}
	else 
	{
		$myfile = fopen("backups/inscrisi2".$today.".html", "w+") or die("Chat error!");
	}

	$sql="SELECT * FROM `inregistrati2`";
	$result=$mysqli->query($sql);
	$i=0;
	fwrite($myfile,'<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></header>');
	fwrite($myfile,'<table border="1"><tr><td>Numar</td><td>Nume</td><td>numarparticipanti</td><td>numeparticipanti</td><td>numereprezentant</td><td>telefon</td><td>mail</td><td>facultate</td><td>rezultatehackatoane</td><td>limbajeprogramare</td><td>motivatie</td><td>participare la hackatoane</td></tr>');
	while ($row=$result->fetch_assoc())
	{
		extract($row);
		$i++;
		fwrite($myfile,'<tr><td>'.$i.'</td><td>'.$nume.'</td><td>'.$numarparticipanti.'</td><td>'.$numeparticipanti.'</td><td>'.$numereprezentant.'</td><td>'.$telefon.'</td><td>'.$mail.'</td><td>'.$facultate.'</td><td>'.$rezultatehackatoane.'</td><td>'.$limbajeprogramare.'</td><td>'.$motivatie.'</td><td>'.$participare.'</td></tr>');
	}
	fwrite($myfile,'</table>');
	fclose($myfile);
}
else
{
	echo 'Adresa de mail invalida!';
}
$mysqli->close();
?>