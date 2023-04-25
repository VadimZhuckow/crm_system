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
        select{
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }
        textarea{
            width: 100%;
        }
    </style>
</head>
<body>
<?php
$id = htmlspecialchars($_GET['id']);
$current_project = (new Db)->getOne('projects', $id);
if($_SERVER['REQUEST_METHOD']=='POST'){
$project_name = htmlspecialchars($_POST['project_name']);
$link = htmlspecialchars($_POST['link']);
$user_id = 1;
$mysql->query("UPDATE projects SET project_name = '{$project_name}', link = '{$link}' WHERE id ='{$id}'");
header('location:projects.php');
}
?>
<div class="container">
<form action="project_edit.php?id=<?=$current_project['id']?>" method="POST" >
    <label>Проект <?=$current_project['project_name']?></label>
    <input type="text" placeholder="<?=$current_project['project_name']?>" name="project_name"><br>
    <input type="text" placeholder="<?=$current_project['link']?>" name="link"><br>
    <input type="submit" value="отправить" class="send-btn">
</form>
</div>
</body>
</html>