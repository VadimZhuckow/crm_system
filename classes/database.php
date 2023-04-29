<?php

class Db
{
    public $mysql;
    public $login;
    public $table_name;

    public $limit;
    public $ofset;

    //конструктор класса бд
    public function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', '0000', 'users');
        mysqli_set_charset($this->mysql, "utf8mb4");
    }
    //получение определенного юзера
    public function getUserData()
    {
        $this->table_name = 'users';
        $request = "SELECT * FROM {$this->table_name} WHERE login = '{$this->login}'";
        $result = $this->mysql->query($request);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
    //получение всех элементов определенной таблицы, на вывод 15 записей
    public function getAll()
    {
        $request     = "SELECT * FROM {$this->table_name} LIMIT 15";
        $result      = $this->mysql->query($request);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //получение количества записей в таблице, для пагинации
    public function getCount($table_name)
    {
        $request = "SELECT count(*) AS total FROM {$table_name}";
        $result = $this->mysql->query($request);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data['total'];
    }
    //получение определнной записи, в параметры передается название таблиц и id записи
     public function getOne($table_name, $id)
    {

        $request = "SELECT * FROM {$table_name} WHERE id = {$id}";
        $result = $this->mysql->query($request);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $date = $row;
            }
        }
        return $date;
    }
}
