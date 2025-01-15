<?php
$database_adress="db";
$database_user="root";
$database_password="supersecret";
$database_db="baza";

function getOdpCount($database_adress, $database_user, $database_password, $database_db, $id_ankiety) {
    $conn = new mysqli($database_adress, $database_user, $database_password, $database_db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM odpowiedz WHERE ankieta_id = ".$id_ankiety.";";
    $res = $conn->query($sql);
    return $res->num_rows;
}

function getGlosCount($database_adress, $database_user, $database_password, $database_db, $id_ankiety) {
    $conn = new mysqli($database_adress, $database_user, $database_password, $database_db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM glos WHERE ankieta_id = ".$id_ankiety.";";
    $res = $conn->query($sql);
    return $res->num_rows;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
    <div class="main">
        <h1>Dostepe ankiety:</h1>
        <?php
            $conn = new mysqli($database_adress, $database_user, $database_password, $database_db);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM ankieta;";

            $res = $conn->query($sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo '
                        <div class="card">
                            <div class="card-title">'.
                                $row["pytanie"].'
                            </div>
                            <div class="card-odp-count">
                                Ilosc dostepnych odpowiedzi: '.
                                getOdpCount($database_adress, $database_user, $database_password, $database_db, $row["id"])
                            .'
                            </div>
                            <div class="card-odp-count">
                                Ilosc oddanych glosow: '.
                                getGlosCount($database_adress, $database_user, $database_password, $database_db, $row["id"])
                            .'
                            </div>
                            <a href="./glosuj.php?id='.$row["id"].'"> 
                                <button class="glosuj-button">
                                    zaglosuj
                                </button>
                            </button>
                        </div>
                    ';
                }
            } else {
                echo "brak ankiet";
            }


        ?>
    </div>
</body>
</html>