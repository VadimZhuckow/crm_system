<?php
require_once "./includes/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crm</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
        }

        input {
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }

        .send-btn {
            background-color: #96c680;
            margin-top: 15px;
        }

        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php
 require_once './classes/setting.php';




    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $type = htmlspecialchars($_POST['type']);



        $mysql->query("INSERT INTO users(id, login, password, type) 
VALUES (null, '{$login}', '{$password}', '{$type}')");
        header("Location: user_add.php");
    }
    ?>




    <div class="container">
        <form action="user_add.php" method="POST">
            <input type="text" placeholder="login" name="login">
            <input type="password" placeholder="pass" name="password">
            <select name="type" id="">
                <option value="backend">backend</option>
                <option value="frontend">frontend</option>
                <option value="clinet">client</option>
            </select>
            <input type="submit" value="отправить" class="send-btn">
            <?php
            echo 'Вы авторизованы, ваш логин - ' . $_SESSION['login'];

            echo '<br>';
            var_dump($_SERVER['REMOTE_ADDR']);
            ?>
        </form>
    </div>
</body>

</html>