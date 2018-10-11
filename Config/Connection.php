<?php

class Connection{

    private $connection;

    private $credencials=[
        "Host"=>"localhost",
        "User"=>"root",
        "Password"=>"",
        "DbName"=>"registros"
        ];

    public function __construct(){
        $this->connection= mysqli_connect(
            $this->credencials['Host'],
            $this->credencials['User'],
            $this->credencials['Password'],
            $this->credencials['DbName']
        );
    }


    public function getConnection(){
        return $this->connection;
    }

    public function StatusConnection(){
        $status = (mysqli_connect_error())?"Connect Error":"Connect Successful";
        return $status;
    }

}


