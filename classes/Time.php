<?php


class Time{

    public static function toHuman($time){
        $time += 3600 * 4;
        return date('d.m.Y',$time);
    }

    public static function toUnix($time){
        return strtotime($time);
    }
}

?>