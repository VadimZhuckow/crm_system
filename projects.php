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

        h3 {
            text-align: center;
        }

        .search {
            margin-top: 12px;
            margin-bottom: 12px;
        }
        .p-link{
            
            margin-top:30px ;
            float:left;
            width: 30px;
        }
    </style>
</head>
<body>
    <h3>Проекты</h3>
    <a href="./project_add.php">Добавить проект</a><br>
    <input class="f-title" type="text" placeholder="Поиск проекта">
    <div class="result">
        <table>
            <tr>
                <td>id</td>
                <td>Название</td>
                <td>Ссылка на проект</td>
            </tr>
            <?php
            $projects = new Db;
            $bd = new Db;
            $count_rows = (int)$bd->getCount('projects');
            $max_posts = 15;
            $pages = $count_rows / $max_posts;
            $pages = round($pages);
            $pages = (int)$pages;
            if (isset($_GET['page'])) {
                $current_page = $_GET['page'];
                $offset = $max_posts * $current_page;
                $offset -= $max_posts;
                $request = "SELECT * FROM projects LIMIT {$max_posts} OFFSET {$offset}";
                $result = (new Db)->mysql->query($request);



                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $project_all[] = $row;
                    }
                }
            } else {
                $projects->table_name = 'projects';
                $project_all =  $projects->getAll();
            }
            foreach ($project_all as $proj) {
                echo "<tr>";
                echo "<td>{$proj['id']}</td>";
                echo "<td><a href='project_view.php?id={$proj['id']}'>{$proj['project_name']}</a></td>";
                echo "<td>{$proj['link']}</td>";
            }
            ?>
        </table>
    </div>
    <?php
    $i = 1;
    while ($i < $pages) {
        echo "<div class='p-link'><a href='projects.php?page={$i}'>{$i}</a></div>";
        $i++;
    }
    ?>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).on("keyup", ".f-title", function () {
        var title = $(this).val();

        $.get("ajax.php", {title}, function (res) {
            $('.result').html(res);
        });
    });
</script>
</html>