<?php
session_start();
$mysql = new mysqli('localhost','root','0000','users');
$mysql->set_charset("utf8_general_ci");
?>