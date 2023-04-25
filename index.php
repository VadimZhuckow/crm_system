<?php
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
        table{
            width: 100%
        }
        td{
            border: 1px solid #747474;
            padding: 5px;
        }
    </style>
    
</head>
<body>
<h3>Список сотрудников</h3>
<a href="./user_add.php">Добавить сотрудника</a>
    <table>
    <tr>
      <td>id</td>
      <td>Логин</td>
      <td>Роль</td>
   </tr>
   
   
   
   <?php
    $result = $mysql->query("SELECT * FROM users");
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><a href='user_view.php?id={$row['id']}'>{$row['login']}</a></td>";
            echo "<td>{$row['type']}</td>";
            echo "</tr>";
        }
    }
?>
</table>
</body>
</html>