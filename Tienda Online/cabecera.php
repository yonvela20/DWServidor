<html>
    <head>
        <link href='bootstrap/css/bootstrap.min.css' rel="stylesheet">
    </head>
    <body>
        <div class='panel-body' style='width:900px;margin:auto;background:#dee'>
        <div class='col col-md-8'>
            <h2><a href="index.php">Mi Amazon</a></h2>
        </div>
        <div class='col col-md-3'>
            <?php
                if(usuario()) { // Estamos logueados
                    echo "Usuario: ".usuario()['nombre'];
                    echo " <a href=logout.php class='btn btn-primary'>Salir</a>";
                    echo " <a href=miperfil.php class='btn btn-primary'>Mi Perfil</a>";
                } else
                    echo "<a href=login.php class='btn btn-primary'>Login</a>";
            ?>
        <br>
        <br>
        <a href="carro.php" class="btn btn-primary">carrito</a>
        </div>
        </div>
        <div class='panel-body' style='width:900px;margin:auto'>
