<?php

class Db
{

    public $mysql;
    public $login;
    public $table_name;

    public $limit;
    public $ofset;

    public function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', '0000', 'users');
        mysqli_set_charset($this->mysql, "utf8mb4");
        // $this->mysql->set_charset("utf8_general_ci");
    }



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

    public function getAll()
    {
        $request     = "SELECT * FROM {$this->table_name}";
        $result      = $this->mysql->query($request);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function ofpage(){

        $request = "SELECT * FROM {$this->table_name} LIMIT {$this->limit} OFFSET {$this->ofset}";
        $result = $this->mysql->query($request);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }
        }
        return $data;
    }


    public function getOne($table_name,$id){

        $request = "SELECT * FROM {$table_name} WHERE id = {$id}";
        $result = $this->mysql->query($request);
         if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                $date = $row;


            }

         }
         return $date;
    }
}
