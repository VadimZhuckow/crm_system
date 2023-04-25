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
    <title>crm</title>
    <style>
        table {
            width: 100%
        }

        td {
            border: 1px solid #747474;
            padding: 5px;
        }
    </style>

</head>

<body>
    <h3>Задачи</h3>
    <a href="./task_add.php">Добавить задачу</a>
    <table>
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Созданная</td>
            <td>Дедлайн</td>
        </tr>

        <?php
        $tasks = new Db;
        $tasks->table_name = 'tasks';
        $tasks_all = $tasks->getAll();

        
        foreach ($tasks_all as $task) {
            $date_start = (int)$task['date_start'];
            $date_start=Time::toHuman($task['date_start']);

            $deadline = (int)$task['deadline'];
            $deadline = Time::toHuman($task['deadline']);


            echo "<tr>";
            echo "<td>{$task['id']}</td>";
            echo "<td><a href='task_view.php?id={$task['id']}'>   {$task['title']}</a></td>";
            echo "<td>{$date_start}</td>";
            echo "<td>{$deadline}</td>";
        }
        ?>
    </table>
</body>

</html>