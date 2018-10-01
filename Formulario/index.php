<?php 
    include "formulario.php";
?>
<html>
    <body>
    <h2>Registro de Usuario</h2>
        <form method="POST">
            <div>Nombre: <input type="text" name="nombre" value="<?=$nombre?>" /> </div>
            <?php 
                //if(isset($error['nombre']))
                //    echo "<div style='color:red'> $error[nombre]</div>";
                verError($error, 'nombre');

            ?>
            <br>
            Edad: <input type="number" name="edad" value="<?=$edad?>">
            <br><br>
            E-mail: <input type="name" name="email" value="<?=$email?>">
            <br><br>
            Genero: <br>
            Masculino<input type="radio" name="genero" value="masculino"> Femenino <input type="radio" name="genero" value="femenino">
            <br><br>
            Observaciones: <input type="text" name="observaciones">
            <br><br>
            Contraseña deseada: <input type="text" name="contrasena"> 
            <br><br>
            Acepto las condiciones: <input type="checkbox" name="condiciones">
            <p> <input type="submit" name="envio" value="Enviar" /></p>
        </form>
    </body>
</html>