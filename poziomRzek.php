<?php
$pokaz = "wszystko";

echo $_POST['pokaz'];

if (isset($_POST['pokaz'])) {
    $pokaz = $_POST['pokaz'];
    echo $pokaz;
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
                    <tr class="t-header">
                        <th>Wodomierz</th>
                        <th>Rzeka</th>
                        <th>Ostrzegawczy</th>
                        <th>Alarmowy</th>
                        <th>Aktualny</th>
                    </tr>
                    <?php
                        $sqlAll = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, MAX(pomiary.stanWody) AS stanWody, MAX(wodowskazy.stanOstrzegawczy) AS stanOstrzegawczy, MAX(wodowskazy.stanAlarmowy) AS stanAlarmowy FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id  WHERE pomiary.dataPomiaru = '2022-05-05' GROUP BY wodowskazy.rzeka, wodowskazy.nazwa;";
                        $sqlPonadStan = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, MAX(pomiary.stanWody) AS stanWody, MAX(wodowskazy.stanOstrzegawczy) AS stanOstrzegawczy, MAX(wodowskazy.stanAlarmowy) AS stanAlarmowy FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id  WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy GROUP BY wodowskazy.rzeka, wodowskazy.nazwa;";
                        $sqlOstrzenie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, MAX(pomiary.stanWody) AS stanWody, MAX(wodowskazy.stanOstrzegawczy) AS stanOstrzegawczy, MAX(wodowskazy.stanAlarmowy) AS stanAlarmowy FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id  WHERE pomiary.dataPomiaru = '2022-05-05' GROUP BY wodowskazy.rzeka, wodowskazy.nazwa;";

                        try {
                            $connection = new mysqli("db", "root", "supersecret", "baza-05-02-2025", 3306);
                            if ($connection->connect_error) {
                                throw new Exception("Connection failed: " . $connection->connect_error);
                            }

                            $res = $connection->query($pokaz == 'wszystko' ? $sqlAll : $sqlOstrzenie);
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <td>".$row['nazwa']."</td>
                                            <td>".$row['rzeka']."</td>
                                            <td>".$row['stanOstrzegawczy']."</td>
                                            <td>".$row['stanAlarmowy']."</td>
                                            <td>".$row['stanWody']."</td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<td>Brak wynikow</td>";
                            }
                        } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
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