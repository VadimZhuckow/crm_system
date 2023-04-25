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

<h3>Просмотр задачи</h3>
<a href="./tasks.php">Назад</a>
<?php
$id = htmlspecialchars($_GET['id']);
$current_task = (new Db)->getOne('tasks', $id);
?>
<div class="container">
<table>
    <tr>
           <td>Номер задачи</td>
           <td><?=$current_task['id']?></td>
    </tr>
    <tr>
           <td>Автор</td>
           <td><?=$current_task['user_id']?></td>
    </tr>
    <tr>
           <td>Для сотрудника</td>
           <td><?=$current_task['to_user_id']?></td>
    </tr>
    <tr>
           <td>По проекту</td>
           <td><?=$current_task['project_id']?></td>
    </tr>
    <tr>
           <td>Название задачи</td>
           <td><?=$current_task['title']?></td>
    </tr>
    <tr>
           <td>Описание задачи</td>
           <td><?=$current_task['description']?></td>
    </tr>
    <tr>
           <td>Дата постановки</td>
           <td><?=Time::toHuman($current_task['date_start'])?></td>
    </tr>
    <tr>
           <td>Дата завершения</td>
           <td><?=Time::toHuman($current_task['date_end'])?></td>
    </tr>
    <tr>
           <td>Дедлайн</td>
           <td><?=Time::toHuman($current_task['deadline'])?></td>
    </tr>
    <tr>
           <td>Статус</td>
           <td><?=$current_task['status']?></td>
    </tr>
</table>
<a href="task_edit.php?id=<?=$id?>">Редактировать</a>
</div>
</body>
</html>