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
$current_project = (new Db)->getOne('projects', $id);
?>
<h3>Проект <?=$current_project['project_name']?></h3>
<a href="./projects.php">Назад</a>
<div class="container">
<table>
    <tr>
           <td>id проекта</td>
           <td><?=$current_project['id']?></td>
    </tr>
    <tr>
           <td>Название проекта</td>
           <td><?=$current_project['project_name']?></td>
    </tr>
    <tr>
           <td>Ссылка на проект</td>
           <td><?=$current_project['link']?></td>
    </tr>
</table>
<a href="project_edit.php?id=<?=$id?>">Редактировать</a>
</div>
</body>
</html>