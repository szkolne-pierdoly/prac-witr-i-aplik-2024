<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="baner">
        <h1>Zdjęcia</h1>
    </header>

    <nav class="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzeta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </nav>

    <main class="srodkowy">
        <div class="zdjecie-kontener">
            <img src="woodpecker.jpg" alt="Przykładowe zdjęcie">
            <h3>Przykładowy tytuł</h3>
            <p>Autor: Jan Kowalski</p>
            <a href="#">Zobacz więcej</a>
        </div>
        <div class="zdjecie-kontener">
            <img src="placeholder.jpg" alt="Inne zdjęcie">
            <h3>Inny przykład</h3>
            <p>Autor: Anna Nowak</p>
            <a href="#">Zobacz więcej</a>
        </div>
    </main>

    <aside class="prawy">
        <h2>Najbardziej lubiane</h2>
        <?php include 'skrypt2.php'; ?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
    </aside>

    <footer class="stopka">
        <h5>Stronę wykonał: [NUMER_ZDĄJĄCEGO]</h5>
    </footer>
</body>
</html> 