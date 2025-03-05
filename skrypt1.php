<?php
$polaczenie = mysqli_connect('db', 'root', 'supersecret', 'baza-12-02-2025', 3306);

if (!$polaczenie) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$kwerenda = "SELECT z.plik, z.tytul, z.polubienia, a.imie, a.nazwisko 
            FROM zdjecia z
            JOIN autorzy a ON z.autorzy_id = a.id
            ORDER BY a.nazwisko ASC";
$wynik = mysqli_query($polaczenie, $kwerenda);

while ($wiersz = mysqli_fetch_array($wynik)) {
    echo '<div class="zdjecie-kontener">';
    echo '<img src="'.$wiersz['plik'].'" alt="zdjęcie">';
    echo '<h3>'.$wiersz['tytul'].'</h3>';
    
    if ($wiersz['polubienia'] > 40) {
        echo '<p>Autor: '.$wiersz['imie'].' '.$wiersz['nazwisko'].'.<br>Wiele osób polubiło ten obraz</p>';
    } else {
        echo '<p>Autor: '.$wiersz['imie'].' '.$wiersz['nazwisko'].'</p>';
    }
    
    echo '<a href="'.$wiersz['plik'].'" download>Pobierz</a>';
    echo '</div>';
}

mysqli_close($polaczenie);
?> 