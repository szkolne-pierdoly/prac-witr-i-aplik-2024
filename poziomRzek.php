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
    <title>Poziomy Rzek</title>
    <link href="./styl.css" rel="stylesheet" />
</head>
<body>
    <div class="content">
        <header class="header">
            <div class="header1">
                <img src="./obraz1.png" alt="mapa polski"/>
            </div>
            <div class="header2">
                <h1>Rzeki w województwie dolnośląskim</h1>
            </div>
        </header>
        <menu class="menu">
            <form method="POST">
                <input id="pokaz-wszystko" type="radio" name="pokaz" value="wszystko" />
                <label for="pokaz-wszystko">Wszystko</label>
                <input id="pokaz-ostrzegawczy" type="radio" name="pokaz" value="ostrzegawczy" />
                <label for="pokaz-ostrzegawczy">Ponad stan ostrzegawczy</label>
                <input id="pokaz-alarmowy" type="radio" name="pokaz" value="alarmowy" />
                <label for="pokaz-alarmowy">Alarmowy</label>
                <input type="submit" value="pokaż"/>
            </form>
        </menu>
        <main class="main">
            <div class="left">
                <h3>Stany na dzień 2022-05-05</h3>
                <table class="table">
                    <th class="t-header">
                        <td>Wodomierz</td>
                        <td>Rzeka</td>
                        <td>Ostrzegawczy</td>
                        <td>Alarmowy</td>
                        <td>Aktualny</td>
                    </th>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </table>

            </div>
            <div class="right">

            </div>
        </main>
        <footer class="footer">
            strone wykonal: 69420213769
        </footer>
    </div>
</body>
</html>