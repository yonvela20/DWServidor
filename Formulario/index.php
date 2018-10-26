<?php 
    require "formulario.php";
?>
<html>
    <body>
    <h2>Registro de Usuario</h2>
        <form method="POST">
            <div>Nombre: <input type="text" name="nombre" value="<?=$nombre?>" /> </div>
            <?php 
                verError($error, 'nombre');
            ?>
            <br>
            Edad: <input type="number" name="edad" value="<?=$edad?>">
            <?php 
                verError($error, 'edad');
            ?>
            <br><br>
            E-mail: <input type="text" name="email" value="<?=$email?>">
            <?php 
                verError($error, 'email');
            ?> 
            <br><br>
            Genero: <br>
            Masculino<input type="radio" name="genero" value="masculino"> Femenino <input type="radio" name="genero" value="femenino">
            <?php 
                verError($error, 'genero');
            ?>
            <br><br>
            Observaciones: <input type="text" name="observaciones" value="<?=$observaciones?>">
            <br><br>
            Contraseña deseada: <input type="password" name="contrasena" value="<?=$contrasena?>">
            <?php 
                verError($error, 'contrasena');
            ?> 

            <br><br>
            Acepto las condiciones: <input type="checkbox" name="condiciones">
            <?php 
                verError($error, 'condiciones');
            ?> 
            <?php 
                //verError($error, 'contrasena');
            ?> 
            <p> <input type="submit" name="envio" value="Enviar" /></p>
        </form>
    </body>
</html>