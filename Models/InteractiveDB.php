<?php

require_once ("../Config/Connection.php");

class InteractiveDB{

    private $conection;

    public function __construct(){
        $obj=new Connection();
        $this->conection=$obj->getConnection();
    }

    public function ExecuteQuery($query){
        mysqli_query($this->conection,$query);
    }

    public function CloseConnection(){
        mysqli_close($this->conection);
    }

    public function ReadData($query){
        $result=mysqli_query($this->conection,$query);
        return $result;
    }

    public function  AllData($data){
        $arrayData=mysqli_fetch_array($data);
        return $arrayData;
    }

    public function __destruct(){}

    public function EmptyResult($data){
        mysqli_free_result($data);
    }


}