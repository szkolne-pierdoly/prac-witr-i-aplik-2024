<?php
$database_adress="db";
$database_user="root";
$database_password="supersecret";
$database_db="baza";

if (!isset($_GET["id"])) {
    header("Location: /");
}

if (isset($_POST['ans']) && isset($_POST['username']) && $_POST['username'] != '') {
    $ans = $_POST['ans'];
    echo $ans;
    $conn = new mysqli($database_adress, $database_user, $database_password, $database_db);
    $sql = "INSERT INTO glos (ankieta_id, odpowiedz_id, nazwa_uzytkow) VALUES (";
} else if (isset($_POST['ans']) && isset($_POST['username']) && $_POST['username'] == '') {
    echo '<h1 style="text-align: center; color: red">Nazwa uzytkownika nie moze byc pusta</h1>';
}

if (!isset($_GET["id"])) {
    header("Location: /");
}

$tytul = "ladowanie...";

$odpowiedzi = [];

$conn = new mysqli($database_adress, $database_user, $database_password, $database_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM ankieta WHERE id = ".$_GET['id'].";";

$res = $conn->query($sql);

if ($res->num_rows == 0) {
    echo "Nie znaleziono Ankiety";
    return;
} else {
    $row = $res->fetch_assoc();
    $tytul = $row["pytanie"];
}

$sql = "SELECT * FROM odpowiedz WHERE ankieta_id =".$_GET['id'].";";
$res = $conn->query($sql);

if ($res->num_rows == 0) {
    $odpowiedzi = 0;
} else {
    while ($row = $res->fetch_assoc()) {
        $odp = ["id" => $row['id'], "tresc" => $row['tresc']];
        array_push($odpowiedzi, $odp);
    }
}

function vote($ans_id) {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
        }
        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .answers {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-top: 10px;
        }
        .odp {
            padding: 8px;
            background: #00000024;
        }
        .odp:hover {
            background-color: #00000032;
        }  
        .odp:active {
            background-color: #00000042;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php
            echo "<h1>".$tytul."</h1>"
        ?>
        <form method="POST">
            <input type="text" placeholder="Nazwa uzytkownika" onchange="" name="username"/><br/>
            <div class="answers">
                <?php
                    foreach ($odpowiedzi as $o) {
                        echo '<input class="odp" type="submit" name="ans" value="'.$o['tresc'].'"/>';
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>