<?php

$id_pol = mysqli_connect('db', 'admin', 'supersecret', 'baza');
$query = "SELECT * FROM licznik";
$result = mysqli_query($id_pol, $query);
$tab = mysqli_fetch_row($result);
$wartosc = $tab[0] ?? null;

$czas = time();
$dodajQuery = "INSERT INTO czas (czas) VALUES ($czas)";
mysqli_query($id_pol, $dodajQuery);

//remove all czases older than 30s
$usunQuery = "DELETE FROM czas WHERE czas < " . ($czas - 30);
mysqli_query($id_pol, $usunQuery);

//count all czases taht are left
$countQuery = "SELECT COUNT(*) FROM czas";
$result = mysqli_query($id_pol, $countQuery);
$count = mysqli_fetch_row($result)[0];

//update licznik
$updateQuery = "UPDATE licznik SET hit = $count";
mysqli_query($id_pol, $updateQuery);

echo $count;
?><br/>
<a href="login.php">Login</a><br/>
<a href="register.php">Register</a>