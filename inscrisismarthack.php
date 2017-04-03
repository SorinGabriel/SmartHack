<?php

$conn = new mysqli('localhost', 'user', 'pass', 'db');
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
$conn->query('SET character_set_client="utf8",character_set_connection="utf8",character_set_results="utf8";');

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

echo '<h1>Inregistrati inainte de 3 octombrie:</h1><table border="1"><tr><td>Nume</td><td>Prenume</td><td>Mail</td></tr>';
$sql="SELECT * FROM `inregistrati`";
$res=$conn->query($sql);
while ($row=$res->fetch_assoc())
{
	if (strcmp($row['nume'],'Nume')!=0)
	{
	echo "<tr><td>".$row['nume']."</td><td>".$row['prenume']."</td><td>".$row['mail']."</td></tr>";
	}
}

echo '</table><h1>Inregistrati dupa 3 octmbrie:</h1><table border="1"><tr><td>Nume</td><td>numarparticipanti</td><td>numeparticipanti</td><td>numereprezentant</td><td>telefon</td><td>mail</td><td>facultate</td><td>rezultatehackatoane</td><td>limbajeprogramare</td><td>motivatie</td><td>participare la hackatoane</td></tr>';

$sql="SELECT * FROM `inregistrati2`";
$res=$conn->query($sql);
$i=0;
while ($row=$res->fetch_assoc())
{
	$i++;
	echo "<tr><td>".$i."</td><td>".htmlspecialchars($row['nume'])."</td><td>".htmlspecialchars($row['numarparticipanti'])."</td><td>".htmlspecialchars($row['numeparticipanti'])."</td><td>".htmlspecialchars($row['numereprezentant'])."</td><td>".htmlspecialchars($row['telefon'])."</td><td>".htmlspecialchars($row['mail'])."</td><td>".htmlspecialchars($row['facultate'])."</td><td>".htmlspecialchars($row['rezultatehackatoane'])."</td><td>".htmlspecialchars($row['limbajeprogramare'])."</td><td>".htmlspecialchars($row['motivatie'])."</td><td>".htmlspecialchars($row['participare'])."</td></tr>";
}

echo '</table>';

$conn->close();


?>