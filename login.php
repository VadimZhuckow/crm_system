<?php
require_once './classes/setting.php';
require_once './classes/classes.php';
require_once "./includes/nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  
        .container {
        margin: 0 auto;
        width: 50%;
            
        }

        input {
            width: 50%;
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
       
    </style>
<title>auth</title>
</head>
<body>
   
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $login = new Login;
    $login->login = htmlspecialchars( $_POST['login']);
    $login->password = htmlspecialchars( $_POST['password']);

var_dump($login->auth());
}
?>
<div class="container">
<form action="login.php" method="POST" >
    <input type="text" placeholder="login" name="login">
    <input type="password" placeholder="pass" name="password">
    <input type="submit" value="отправить" class="send-btn">
   <?php
   echo $login->test;
   
?>
</form>
</div>
</body>
</html>