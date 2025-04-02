<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważywniak</title>
    <meta charset="UTF8">
    <link rel="stylesheet" href="./styl2.css" />
</head>
<body>
    <div class="root">
        <header class="both-baners">
            <header class="baner1">
                <h1>Internetowy sklep z eko-warzywami</h1>
            </header>
            <nav class="baner2">
                <ol>
                    <li>warzywa</li>
                    <li>owoce</li>
                    <li><a href="https://terapiasokami.pl">soki</a></li>
                </ol>
            </nav>
        </header>
        <main class="main">
            <?php
                $conn = mysqli_connect('db', 'root', 'supersecret', 'dane2'); // change to localhost if not using docker to run
                if (mysqli_connect_errno()) {
                    printf("", mysqli_connect_error());
                    exit(1);
                }
                $sql = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE produkty.Rodzaje_id = (1 || 2);";

                $response = mysqli_query($conn, $sql);
                if ($response->num_rows) {
                    while ($row = mysqli_fetch_assoc($response)) {
                        echo '
                        <div class="produkt">
                            <img src="'.$row["zdjecie"].'" />
                            <h5>'.$row['nazwa'].'</h5>
                            <p>opis: '.$row['opis'].'</p>
                            <p>na stanie: '.$row['ilosc'].'</p>
                            <h2>'.$row['cena'].' zł</h2>
                        </div>
                        ';
                    }
                }

            ?>
        </main>
        <footer class="footer">
            <form>
                <label>nazwa:</label>
                <input type="text" />
                <label>Cena</label>
                <input type="text" />
                <input type="submit" value="Dodaj produkt" />
            </form>
            <p>Strone wykonal: 11111111111</p>
        </footer>
    </div>
</body>
</html>