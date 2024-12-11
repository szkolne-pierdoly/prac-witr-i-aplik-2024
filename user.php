<?php
session_start();

if (isset($_SESSION['user'])) {
    echo 'logged as ' . $_SESSION['user']['username'];
    exit();
} else {
    $login = $_POST['login'];
    $password = $_POST['password'];

    echo 'username: ' . $login . '<br>';
    echo 'password: ' . $password . '<br>';

    $polaczenie = mysqli_connect('db', 'admin', 'supersecret', 'baza');

    $query = "SELECT * FROM users WHERE username = '$login' AND password = '$password'";
    $result = mysqli_query($polaczenie, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['user'] = $row;
        echo '<br>';
        echo 'logged as ' . $row['username'];
    } else {
        echo 'User not found';
    }
}

?>