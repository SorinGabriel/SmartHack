<DOCTYPE! html>

<head>
<title>SmartHack - ASMI project</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="scripts/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
var parola = "parolagreudeaflat";
var pass = prompt("Password:", "??????");
while(pass != parola)
{
	pass=prompt("Password:", "??????");
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Sorin Marica">
<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand|Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
<section id="parteneri">
<div align="center">
<table>
<h1>Inregistrati</h1>
<tr><th>Nume</th><th>Prenume</th><th>Mail</th></tr>
<?php

$conn = new mysqli('localhost', 'user', 'pass', 'db');
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$sql="SELECT * FROM inregistrati";
$results=$conn->query($sql);
while ($row=$results->fetch_assoc())
{
	echo '<tr><td>'.$row['nume'].'</td><td>'.$row['prenume'].'</td><td>'.$row['mail'].'</td></tr>';
}
echo '</table><h1>Mesaje primite</h1><table><tr><th>Nume</th><th>Mail</th><th>Subiect</th><th>Mesaj</th></tr>';

$sql="SELECT * FROM contact";
$results=$conn->query($sql);
while ($row=$results->fetch_assoc())
{
	echo '<tr><td>'.$row['nume'].'</td><td>'.$row['mail'].'</td><td>'.$row['subiect'].'</td><td>'.$row['mesaj'].'</td></tr>';
}

$conn->close();

?>
</table>
</div>
</section>
</body>

</html>