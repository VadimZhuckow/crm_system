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

        textarea {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $u_time_start = Time::toUnix($_POST['date_start']);
        $u_time_end = Time::toUnix($_POST['date_end']);
        $u_deadline = Time::toUnix($_POST['deadline']);


        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $project = htmlspecialchars($_POST['project']);
        $status = htmlspecialchars($_POST['status']);
        $date_start = $u_time_start;
        $date_end = $u_time_end;
        $deadline = $u_deadline;
        $user_id = 1;
        $to_user_id = 1;
        $project_id = 1;


        $mysql->query("INSERT INTO tasks (id, user_id, to_user_id, project_id, title, description, date_start, date_end, deadline, status) 
VALUES (null, '{$user_id}','{$to_user_id}','{$project_id}','{$title}','{$description}','{$date_start}','{$date_end}','{$deadline}','{$status}')");


    header('location:tasks.php');
    }


 
    ?>
    <div class="container">
        <form action="task_add.php" method="POST">
            <label>Название задачи</label>
            <input type="text" placeholder="Название задачи" name="title"><br>
            <label>Описание задачи</label><br>
            <textarea name="description" placeholder="Описание задачи"></textarea><br>
            <label>По проекту</label>
            <select name="type">
                <?php
                $bd = new Db;
                $bd->table_name = "projects";
                $projects_list = $bd->getAll();
                foreach ($projects_list as $project) {
                    echo "<option value = '{$project['id']}'>{$project['project_name']}</option>";
                }
                ?>
            </select>
            <label>Статус проекта</label>
            <select name="status">
                <option value="1">Новый</option>
                <option value="2">В работе</option>
                <option value="3">Выполнено</option>
            </select><br>
            <label>Дата постановки</label>
            <input type="date" name="date_start">
            <label>Дата завершения</label>
            <input type="date" name="date_end">
            <label>Дедлайн</label>
            <input type="date" name="deadline">

            <input type="submit" value="отправить" class="send-btn">

        </form>
    </div>
</body>

</html>