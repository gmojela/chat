<?php

session_start();

require_once 'connection.php';

$message = '';

if(!empty($_POST['username']) && !empty($_POST['password']) )
{
        $conn->query("USE chat;");

            $sql = "INSERT INTO users_tbl (username, password) VALUES (:username, :password)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':username', $_POST['username']);
            $stmt->bindParam(':password', hash(whirlpool, $_POST['password']) );


            if( $stmt->execute() ){
                $message = 'User account has been created';
                header("Location: login.php");
            }
            else {
                $message = 'Sorry there must have been an issue creating your account';
            }

}


?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="body">
    <div class="section">
        <h1>Register</h1>
        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <form action="register.php" method="post">
            <input type="text" placeholder="Enter usename" name="username"><br>
            <input type="password" placeholder="Enter password" name="password"><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</div>
</body>
</html>
