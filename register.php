<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['username'];
    $password = $_POST['password'];

    $password_hash = md5($password);

    $polaczenie = mysqli_connect('db', 'admin', 'supersecret', 'baza');

    $usernameExistsQuery = "SELECT * FROM users WHERE username = '$login'";
    $usernameExistsResult = mysqli_query($polaczenie, $usernameExistsQuery);
    $usernameExistsRow = mysqli_fetch_assoc($usernameExistsResult);

    if ($usernameExistsRow) {
        echo 'Username already exists';
        echo '<br>';
        echo '<a href="login.php">login to your account </a>';
        echo '<br/>';
        echo 'or <a href="register.php">use difrent username</a>';
        exit();
    }

    $query = "INSERT INTO users (username, password) VALUES ('$login', '$password_hash')";
    mysqli_query($polaczenie, $query);

    echo 'User registered successfully';
    echo '<br>';
    echo '<a href="login.php">login to your account </a>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Register</button>
    </form>
</body>
</html>