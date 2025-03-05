<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link href="styl.css" rel="stylesheet"/>
</head>
<body>
    <div class="baner">
        <div class="baner__1">
            <h1>Warzenie pojazdów we Wrocławiu</h1>
        </div>
        <div class="baner__2">
            <img src="obraz1.png" alt="waga"/>
        </div>
    </div>
    <div class="content">
        <div class="lokalizacje">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $sql = "SELECT lokalizacje.ulica FROM lokalizacje;";

                    $conn = mysqli_connect("db","root","supersecret","baza-5-03-2025");
                    if (mysqli_connect_errno()) {
                        printf("", mysqli_connect_error());
                        exit(1);
                    }

                    $response = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($response) > 0) {
                        while ($row = mysqli_fetch_assoc($response)) {
                            echo"<li>ulica ".$row["ulica"]."</li>";
                        }
                    }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">Napisz</a>
        </div>
        <div class="alerty">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>Rejestracja</th>
                    <th>Ulica</th>
                    <th>Waga</th>
                    <th>Dzien</th>
                    <th>Czas</th>
                </tr>
                <?php
                    $sql = "SELECT wagi.rejestracja, lokalizacje.ulica, wagi.waga, wagi.dzien, wagi.czas FROM wagi, lokalizacje WHERE wagi.waga > 5;";
                    
                    $conn = mysqli_connect("db","root","supersecret","baza-5-03-2025");
                    if (mysqli_connect_errno()) {
                        printf("", mysqli_connect_error());
                    }
                    
                    $response = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($response) > 0) {
                        while ($row = mysqli_fetch_assoc($response)) {
                            echo "<tr><td>"
                                 .$row["rejestracja"]."</td><td>"
                                 .$row["ulica"]."</td><td>"
                                 .$row["waga"]."</td><td>"
                                 .$row["dzien"]."</td><td>"
                                 .$row["czas"]."</td>"
                                ."</tr>";
                        }
                    }
                ?>
                <!-- skrypt 2 -->
            </table>
        </div>
        <div class="image">
            <img src="obraz2.png" alt="tir" />
        </div>
    </div>
    <div class="footer">
        <p>Strone wykonal: 00000000000</p>
    </div>
</body>
</html>