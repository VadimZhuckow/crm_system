<?php
require "./classes/classes.php";
require_once  "./classes/setting.php";
require_once "./includes/nav.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container{
        width: 50%;
        margin:0 auto;
        background-color: #cdcdcd;
        padding:15px;
        border-radius:15px;

    }
    table{
        width: 100%;
    }
    td{
        border:1px solid black;
        padding:5px;
    }
</style>
<body>
<?php
$id = htmlspecialchars($_GET['id']);
$current_user = (new Db)->getOne('users', $id);
?>
<h3>Сотрудник <?=$current_user['login']?></h3>
<a href="./tasks.php">Назад</a>
<div class="container">
<table>
    <tr>
           <td>id сотруднкиа</td>
           <td><?=$current_user['id']?></td>
    </tr>
    <tr>
           <td>Логин сотруднкиа</td>
           <td><?=$current_user['login']?></td>
    </tr>
    <tr>
           <td>Роль</td>
           <td><?=$current_user['type']?></td>
    </tr>
</table>
<a href="user_edit.php?id=<?=$id?>">Редактировать</a>
</div>
</body>
</html>