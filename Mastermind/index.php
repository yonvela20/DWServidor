<?php 
require "mastermind.php";

session_start();

if(!isset($_SESSION['master'])){
    $mastermind = new Mastermind();
    $mastermind->inicioJuego();
    $_SESSION['master']=$mastermind;
} else{
    $mastermid=$_SESSION['master'];

} 

if(isset($_POST['num'])){

    $num = $_POST['num'];
    $mastermid->validar($num);

}

require "vista.php";




