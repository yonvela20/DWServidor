<?php
session_start();
echo "<form method='post'>";
echo "Introduce el usuario: <input type='text' name='usuario'/><br>";
echo "Introduce la contraseña: <input type='password' name='password'/><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if(!isset($_POST['usuario']) && !isset($_POST['password'])){
    echo "Introduce usuario y contraseña";

}else{
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario=='admin' && $password=='admin') {
        $_SESSION['usuario']=['usuario'=>'admin','password'=>'password'];
        echo "Login correcto! <a href='index.php'> Volver al inicio </a>";
    
    
    }else {
        echo "Usuario incorrecto";
    }
}


?>