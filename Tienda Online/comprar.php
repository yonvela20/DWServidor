<?php 
require "init.php";
require "bbdd.php";
require "cabecera.php";
require "funciones.php";

$id = params('id');
$articulo = getArticulo($id);
$cantidad = params('cantidad');

if (isset($_POST['comprar'])) { 
    if(is_numeric($cantidad) && $cantidad>0) {
        //anadircarrito($id, $cantidad);
        echo "<h3>Artículo añadido al carrito</h3>";
        echo "<a href=carro.php class=boton>Ver Carrito</a> ";
        echo "<a href='index.php' class=boton>Continuar comprando</a>";
        die;
    } else {
        $error = "Cantidad incorrecta";
    }
} else {
    $error="";
}

?>

<h3>Comprar artículo</h2>
<div>
    <fieldset>
        <form method=post>
            <b><?= $articulo['titulo'] ?></b>
            <br>Categoría: <?= $categorias[$articulo['cat']] ?>
            <br>Precio: <?= $articulo['precio'] ?> €<br><p>
                Cantidad: <input name="cantidad" size="2" value="1">
                <?php 
                    if($error)
                        echo "<div class=error>cantidad incorrecta</div>";
                ?> 
                <br><br><input type=submit class=boton name=comprar value="Añadir al carrito">
                  
        </form>
    </fieldset>
</div>