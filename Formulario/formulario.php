<?php

function verError($errores, $dato){
    /** Muesta el error de un datos del formulario, si existe
     * $errores: array de errores
     * $dato: dato del que se quiere mostrar el error
     */
    if(isset($errores[$dato])){
        echo "<div style='color:red'>".$errores[$dato]."</div>";
    }
}

$nombre="";
$edad=0;
$email="";
$error=[];
$contrasena="";
$observaciones="";
$condiciones="";
$genero="";

if(isset($_POST['envio'])){

    //Validamos nombre
    if (!isset($_POST['nombre']) or !$_POST['nombre']) {
        $error['nombre']= "Error: el nombre es requerido."; 
    } else {
        $nombre=$_POST['nombre'];
        if (strlen($nombre)<3){ 
            $error['nombre']='La longitud mínima es de tres caracteres';
        }
        if (is_numeric($nombre)){
            $error['nombre']='¿Tienes número de serie?';
        }    
    }
       
    //Validamos la contraseña    
    if (!isset($_POST['contrasena']) or !$_POST['contrasena']){
        $error['contrasena']= "Error: la contraseña es requerida";
    } else{
        $contrasena=$_POST['contrasena'];
        if(strlen($contrasena)<6){
            $error['contrasena']="La contraseña debe tener minimo 6 caracteres";
        }       
    }
    
    //Validamos la edad
    if(!isset($_POST['edad']) or !$_POST['edad']){
        $error['edad']= "Edad no valida";
    } else{
        $edad=$_POST['edad'];
        if($edad>100){
            $error['edad']="Eres demasiado viejo para estas cosas";
        }
        if($edad<1){
            $error['edad']="Tu edad no puede ser menor que 0";
        }
    }

    //Recogemos las observaciones 
    if(isset($_POST['observaciones'])){
        $observaciones=$_POST['observaciones'];
    }

    //Recogemos el genero 
    if(isset($_POST['genero'])){
        $genero = $_POST['genero'];
    } else{
        $error['genero']="Debes seleccionar un genero";
    }
    
    //Validando que se aceptan las condiciones 
    if(!isset($_POST['condiciones'])){
        $error['condiciones']="No has aceptado las condiciones";
    }

    //Validamos que el email sea valido
    if(!isset($_POST['email']) or !$_POST['email']){
        $error['email']="El email es obligatorio";
    } else{
        $email=$_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email']="El email no es valido";
        }
    }  

    if(!count($error)){
        //Guardaríamos en la BD    
        echo "Registro correcto!";
        echo "<br>";
        echo "Nombre: ".$nombre;
        echo "<br>";
        echo "E-mail: ".$email;
        //echo "Contraseña: ".$contrasena;
        echo "Edad: ".$edad;
        echo "<br>";
        echo "Observaciones: ".$observaciones;
        echo "<br>";
        echo "Genero: ".$genero;
        die();
    }
}
?>