<?php


class Generator_on
{

    

    public static function project(){
    

    $x=0;
    $max=100;
    while($x<$max){
       
    $project_name = "project №{$x}";
    // $project_name = mb_convert_encoding($project_name, "windows-1251", "utf-8");
    $user_id = rand(1,8);
    $link = "local";
    $date_start = rand(1682200645,1682450645);
    $date_end = $date_start + 3600*24;
    $db = new Db;
    
    $db->mysql->query("INSERT INTO projects (id, project_name, user_id, link, date_start, date_end) 
    VALUES (null, '{$project_name}','{$user_id}','{$link}','{$date_start}','{$date_end}')");
    


        var_dump($db->mysql->error);
        $x++;
    }

    }




}





