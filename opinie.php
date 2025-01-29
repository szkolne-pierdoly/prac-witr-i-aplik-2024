<?php
// ze wzgledu na to ze moja baza danych jest na kontenerze docker a nie xampp u mnie jest inna nazwa bazy, haslo i host
try {
    $connection = new mysqli("db", "root", "supersecret", "baza-22-01-2025", 3306);
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styl3.css"/>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hurtowania Spożywcza</h1>
        </div>
        <div class="main">
            <h2>Opinie naszych klientów</h2>
            <?php
            $sql = "SELECT opinia, (SELECT klienci.imie FROM klienci WHERE klienci.id = opinie.Klienci_id) AS imie, (SELECT klienci.zdjecie FROM klienci WHERE klienci.id = opinie.Klienci_id) as zdjecie FROM opinie;";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="opinia">
                        <img src="./zdjecia/'.$row["zdjecie"].'" alt="zdjecie">
                        <div class="dane">
                            <q>'.$row["opinia"].'</q>
                            <h4>'.$row["imie"].'</h4>
                        </div>
                    </div>';
                }
            } else {
                echo "Brak opinii";
            }
            ?>
        </div>
        <div class="footer">
            <div class="footer_1">
                <h3>Współpracuj z nami</h3>
                <a href="http://sklep.pl/">Sklep 1</a>
            </div>
            <div class="footer_2">
                <h3>Nasi top klienc</h3>
                <?php
                    $sql = "SELECT klienci.imie, klienci.nazwisko, klienci.punkty FROM klienci ORDER BY klienci.punkty DESC LIMIT 3;";
                    $result = $connection->query($sql);
                    echo "<ol>";
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>'.$row["imie"].' '.$row["nazwisko"].', '.$row["punkty"].' pkt.</li>';
                        }
                    } else {
                        echo "Brak klientów";
                    }
                    echo "</ol>";
                ?>
            </div>
            <div class="footer_3">
                <h3>Skontaktuj się</h3>
                <p>Telefon: 111222333</p>
            </div>
            <div class="footer_4">
                <h3>Autor: 00000000000</h3>
            </div>
        </div>
    </div>
</body>
</html>