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
    <h3>Проекты</h3>
    <a href="./project_add.php">Добавить проект</a>
    <table>
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Ссылка на проект</td>
        </tr>

        <?php
        $projects = new Db;
        $projects->table_name = 'projects';
        $projects->limit = 10;
        $projects->ofset = 5;
        $project_all = $projects->ofpage();
        foreach ($project_all as $proj) {
            echo "<tr>";
            echo "<td>{$proj['id']}</td>";
            echo "<td><a href='project_view.php?id={$proj['id']}'>{$proj['project_name']}</a></td>";
            echo "<td>{$proj['link']}</td>";

        }
        ?>
        </table>
</body>
</html>