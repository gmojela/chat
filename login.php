<?php

session_start();

$message = '';

require_once 'connection.php';

if(!empty($_POST['username']) && !empty($_POST['password'])):

    $conn->query("USE chat;");
    $records = $conn->prepare('SELECT id,username,password FROM users_tbl WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();

    $results = $records->fetch(PDO::FETCH_ASSOC);

    print_r($results);

    $pwd = hash("whirlpool", $_POST['password']);

    if(count($results) > 0 && $pwd === $results['password'] ){

        $_SESSION['user_id'] = $results['id'];
        $_SESSION['username'] = $results['username'];
        header("Location: home.php");

    } else {

        $message = 'Sorry, those credentials do not match';
    }

endif;


?>
<html>
<head>
    <title>Login</title>
</head>
<body>

<div id="body">
    <div class="section">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" placeholder="Enter usename" name="username"><br>
            <input type="password" placeholder="Enter password" name="password"><br>
            <input type="submit" name="submit" value="Login">
        </form>

    </div>
</div>

</body>
</html>