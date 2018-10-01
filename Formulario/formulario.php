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
        
    if(!count($error)){
        //Guardaríamos en la BD    
        echo "Registro correcto ".$nombre;
        die();
    }
}
?>