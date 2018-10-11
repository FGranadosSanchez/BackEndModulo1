<?php

require_once ("../Models/ModelAdmin.php");
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

$codigo=(isset($_REQUEST["codigo"]))?'':$_REQUEST["codigo"];
$nombre=(isset($_REQUEST["nombre"]))?'':$_REQUEST["nombre"];
$apellido=(isset($_REQUEST["apellido"]))?'':$_REQUEST["apellido"];
$correo=(isset($_REQUEST["correo"]))?'':$_REQUEST["correo"];
$documento=(isset($_REQUEST["documento"]))?'':$_REQUEST["documento"];
$materia=(isset($_REQUEST["materia"]))?'':$_REQUEST["materia"];
$contrasenia=(isset($_REQUEST["contrasenia"]))?'':password_hash($_REQUEST["contrasenia"],PASSWORD_BCRYPT);
$operations=(isset($_REQUEST["operations"]))?'':$_REQUEST["operations"];
 $data=[
    "codigo"=>$codigo,
    "nombre"=>$nombre,
    "apellido"=>$apellido,
    "correo"=>$correo,
    "documento"=>$documento,
    "materia"=>$materia,
    "contrasenia"=>$contrasenia
 ];

 $obj=new ModelAdmin($data);
 if ($operations=="save"){
     if ($obj->ReadTeacher()){
         $json=['status'=>"Duplicate" ];
         echo json_encode($json);
     }else{
         $obj->SaveTeacher();
         $json=['status'=>"Save" ];
         echo json_encode($json);
     }
 }

 if ($operations=="update"){
     $obj->UpdateTeacher();
     $json=['status'=>"Update"];
     echo json_encode($json);
 }

 if ($operations=="delete"){
     $obj->DeleteTeacher();
     $json=['status'=>"Delete"];
     echo json_encode($json);
 }

 if ($operations=="read"){
     if($obj->ReadTeacher()){
        $codigo_=$obj->getCodigo();
        $nombre_=$obj->getNombre();
        $apellido_=$obj->getApellido();
        $correo_=$obj->getCorreo();
        $documento_=$obj->getDocumento();
        $materia_=$obj->getMateria();
        $json=[
            "codigo"=>$codigo_,
            "nombre"=>$nombre_,
            "apellido"=>$apellido_,
            "correo"=>$correo_,
            "documento"=>$documento_,
            "materia"=>$materia_
        ];
        echo json_encode($json);
     }else{
         $json=[
           'status'=>"Empty"
         ];
         echo json_encode($json);
     }

 }

