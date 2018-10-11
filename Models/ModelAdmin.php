<?php

require_once ("InteractiveDB.php");
class ModelAdmin{

    private $codigo;
    private $nombre;
    private $apellido;
    private $correo;
    private $documento;
    private $materia;
    private $contrasenia;


    public function  __construct($data){
        $this->codigo=$data['codigo'];
        $this->nombre=$data['nombre'];
        $this->apellido=$data['apellido'];
        $this->correo=$data['correo'];
        $this->documento=$data['documento'];
        $this->materia=$data['materia'];
        $this->contrasenia=$data['contrasenia'];
    }

    public function __destruct(){}

    public function SaveTeacher(){
        $obj=new InteractiveDB();
        $query="call InsertarInformacion(
        {$this->codigo},
        {$this->nombre},
        {$this->apellido},
        {$this->correo},
        {$this->documento},
        {$this->materia},
        {$this->contrasenia});";
        $obj->ExecuteQuery($query);
        $obj->CloseConnection();
   }

    public function UpdateTeacher(){
        $obj=new InteractiveDB();
        $query="call ActualizarInformacion(
        {$this->codigo},
        {$this->nombre},
        {$this->apellido},
        {$this->correo},
        {$this->documento},
        {$this->materia},
        {$this->contrasenia});";
        $obj->ExecuteQuery($query);
        $obj->CloseConnection();
    }

    public function DeleteTeacher(){
        $obj=new InteractiveDB();
        $query="call BorrarInformacion(
        {$this->codigo});";
        $obj->ExecuteQuery($query);
        $obj->CloseConnection();
   }

    public function ReadTeacher(){
        $flag=false;
        $obj=new InteractiveDB();
        $query="call MostrarInformacion(
        {$this->codigo},
        {$this->nombre},
        {$this->apellido},
        {$this->correo},
        {$this->documento},
        {$this->materia});";
        $data=$obj->ReadData($query);
        if ($value=$obj->AllData($data)){
            $this->codigo=$value['codigo'];
            $this->nombre=$value['nombre'];
            $this->apellido=$value['apellido'];
            $this->correo=$value['correo'];
            $this->documento=$value['documento'];
            $this->materia=$value['materia'];
            $flag=true;
        }
        $obj->EmptyResult($data);
        $obj->CloseConnection();
        return $flag;
   }


    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function getMateria()
    {
        return $this->materia;
    }

    public function getContrasenia()
    {
        return $this->contrasenia;
    }



}
