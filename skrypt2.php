<?php
$polaczenie = mysqli_connect('db', 'root', 'supersecret', 'baza-12-02-2025', 3306);

if (!$polaczenie) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$kwerenda = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100";
$wynik = mysqli_query($polaczenie, $kwerenda);

while ($wiersz = mysqli_fetch_array($wynik)) {
    echo '<img src="'.$wiersz['plik'].'" alt="'.$wiersz['tytul'].'" style="width:100%; margin-bottom:20px;">';
}

mysqli_close($polaczenie);
?> 