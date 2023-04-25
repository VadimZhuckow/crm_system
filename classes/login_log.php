<?php

class Login
{

    public $login;
    public $password;
    public $test = '';


    public function validate()
    {
        $bd = new Db;
        $bd->login = $this->login;
        $user = $bd->getUserData();
        if ($this->password == $user['password']) {
            return true;
        }
        echo "<pre>";
        var_dump($this->password);
        var_dump($user['password']);
        var_dump($user);
    }
    public function auth()
    {
        if (isset($this->login) && mb_strlen($this->login) > 3 && isset($this->password) && mb_strlen($this->password) > 3) {
            if ($this->validate()) {
                $_SESSION['login'] = $this->login;
                header('location:user_add.php');
            } else {
                $this->test = 'Не верный пароль';
                return 'err_validate';
            }
        } else {
            $this->test = 'Не верные данные';
            return 'err_data';
        }
    }
}
