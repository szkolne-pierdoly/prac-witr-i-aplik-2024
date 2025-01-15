<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Baza flmow</h3>
        <form method="POST">
            <select name="gat">
                <option value="1">Sci-Fi</option>
                <option value="2">animacja</option>
                <option value="zse">dramat</option>
                <option value="4">horror</option>
                <option value="5">komedia</option>
            </select>
            <input type="submit" value="Filmy" />
        </form>
        <?php
            try {
                $connection = new mysqli("db", "root", "supersecret", "baza_15_01_2025", 3306);
                if ($connection->connect_error) {
                    throw new Exception("Connection failed: " . $connection->connect_error);
                }
                #zapytanie 1 - wykonywane tylko po wybraniu gatunku

                if (isset($_POST['gat'])) {
                    $gatunek = $_POST['gat'] == 'zse' ? '3' : $_POST['gat'];

                    $sql = "SELECT tytul, rok, ocena FROM filmy WHERE gatunki_id = ".$gatunek.";";
    
                    $res = $connection->query($sql);
    
                    $gatslownie = "";
    
                    
                    if ($gatunek == "1") {
                            $gatslownie = "Sci-Fi";
                    } else if ($gatunek == "2") {
                            $gatslownie = "animacja";
                    } else if ($gatunek == "3") {
                            $gatslownie = "dramat";
                    } else if ($gatunek == "4") {
                            $gatslownie = "horror";
                    } else if ($gatunek == "5") {
                        $gatslownie = "komedia";
                    }
                    
                    echo "<h2>".$gatunek.". ".$gatslownie."</h2>";
    
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<p>tytul: ".$row['tytul']."; Rok produkcji: ".$row['rok']."; ocena: ".$row['ocena']."</p>";
                        }
                    }
                }
                $sql = "SELECT filmy.id, filmy.tytul, (SELECT rezyserzy.imie FROM rezyserzy WHERE rezyserzy.id = rezyserzy_id) AS imie_rezysera, (SELECT rezyserzy.nazwisko FROM rezyserzy WHERE rezyserzy.id = rezyserzy_id) AS nazwisko_rezysera FROM filmy;";

                $res = $connection->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<p>".$row['id'].". ".$row['tytul'].", reżyseria: ".$row["imie_rezysera"]." ".$row["nazwisko_rezysera"]."</p>";
                    }
                } 
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>