<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Komis aut</title>
  <link href="./styl.css" rel="stylesheet"/>
</head>
<body>
  <div class="contnet">
    <header class="baner">
      <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <main class="main">
      <div class="main-1">
        <?php
          $con = mysqli_connect("db","root","supersecret","baza-19-03-2025");
          if (mysqli_connect_errno()) {
            printf("", mysqli_connect_error());
            exit(1);
          }

          $sql = "SELECT samochody.model, samochody.rocznik, samochody.przebieg, samochody.paliwo, samochody.cena, samochody.zdjecie FROM samochody WHERE samochody.id = 10;";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '
                <img src="./img/'.$row['zdjecie'].'">
                <div>
                  <h4>Oferta dnia: Toyota '.$row["model"].'</h4>
                  <p>Rocznik: '.$row["rocznik"].', Przebieg: '.$row["przebieg"].', rodzaj paliwa: '.$row["paliwo"].'</p>
                  <h4>Cena: '.$row["cena"].'</h4>
                </div>
              ';
            }
          }
        ?>
      </div>
      <div class="main-2">
        <h2>Wybierz markę</h2>
        <form method="post">
          <select>
            
          </select>
          <input type="submit" value="Wyszukaj" />
        </form>
      </div>
      <div class="main-3">

      </div>
    </main>
    <footer class="footer">
      <p>Strone wykonał: +48 694202137</p>
      <a href="http://firmy.pl/komis">Znajdź nas także</a>
    </footer>
  </div>
</body>
</html>