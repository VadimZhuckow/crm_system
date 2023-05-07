<?php
// require_once 'settings/settings.php';
require_once 'classes/classes.php';
?>
<table>
    <tr>
        <td>id</td>
        <td>Название</td>
    </tr>

    <?php
    $title = $_GET['title'];
    $db = new Db;
    $result = $db->getAllByLike('projects', 'project_name', $title);

    foreach ($result as $res){
        echo "<tr>";
        echo "<td>{$res['id']}</td>";
        echo "<td>{$res['project_name']}</td>";
        echo "</tr>";
    }
    ?>
</table>