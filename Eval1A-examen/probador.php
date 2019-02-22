<?php
/**
 * El problema, por lo que he visto, es que no me pilla la variable $n 
 * que es la que utilizo en el foreach de vista.php y que me sirve para identificar cada
 * uno de los probadores 
 */


/**
 * Control de entrada de prendas en probadores
 *
 * Acciones:
 * accion=s&p=n     Añade una prenda al probador N
 * accion=r&p=n     Disminuye una prenda en el probador N
 * accion=v&p=n     Vacía el probador N
 * accion=x         Vacia todos los probadores
 */

session_start();
if(!isset($_SESSION['numprobadores'])){
    header('Location:index.php');
}
$numprobadores = $_SESSION['numprobadores'];

if(isset($_GET['accion'])){ //Accion que ejecuta 
    $accion=$_GET['accion'];
}else{
    $accion = "";
}

/**
 * Con esto nos aseguramos de que si alguien manipula la url poniendo 
 * un probador que no existe no nos destroce el programa 
 */

 //$n=$_GET['n'];
if(isset($_GET['n'])){ //pillamos el numero del probador 
    $n = $_GET['n']; //Lo almacenamos en una variable
    if($n<=0 || $n > $numprobadores){ 
        $error = "Este probador no existe";
    }
} 

//Lista de acciones 
switch($accion){
    case "s":
        $_SESSION['probador'][$n]++;
        break;
    
    case "r":
        if($_SESSION['probador'][$n]>0){
            $_SESSION['probador'][$n]--;
        }
        break;

    case "v":
        $_SESSION['probador'][$n]=0;
        break;
    
    case "x":
        for($i=1; $i<=$numprobadores;$i++){
            $_SESSION['probador'][$i]=0;
        }
}

require 'vista.php';
