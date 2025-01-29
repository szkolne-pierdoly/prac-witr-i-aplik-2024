<?php
try {
    $connection = new mysqli("db", "admin", "supersecret", "baza", 3306);
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
        </div>
        <div class="footer">
            <div class="footer_1">
                <h3>Współpracuj z nami</h3>
                <a href="http://sklep.pl/">Sklep 1</a>
            </div>
            <div class="footer_2">
                <h3>Nasi top klienc</h3>

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