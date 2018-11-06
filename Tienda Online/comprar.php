<?php 
require "init.php";
require "bbdd.php";
require "cabecera.php";
require "funciones.php";

$id = params('id');
if (!$id)
    die("No has seleccionado artículo");
$articulo = getArticulo($id);
if (!$articulo)
    die("ERROR: Articulo inexistente");


if (isset($_POST['comprar'])) { 
    $cantidad = params('cantidad');
    if(is_numeric($cantidad) && $cantidad>0) {
        //anadircarrito($id, $cantidad);
        echo "<h3>Artículo añadido al carrito</h3>";
        echo "<a href=carro.php class=boton>Ver Carrito</a> ";
        echo "<a href='index.php' class=boton>Continuar comprando</a>";
        die;
    } else {
        $error="Cantidad incorrecta";
    }
} else {
    $error="";
}
?>

<h3>Comprar artículo</h2>
<div style="background:#eeeedd;width:300;padding:10px">
    <fieldset>
        <form method=post>
            <b><?= $articulo['titulo'] ?></b>
            <br>Categoría: <?= $categorias[$articulo['cat']] ?>
            <br>Precio: <?= $articulo['precio'] ?> €<br><p>
                Cantidad: <input name="cantidad" size="2" value="1">
                <?php if($error) echo "<div class=error>$error</div>";?>
                <br><input type=submit class=boton name=comprar value="Añadir a carrito">   
        </form>
    </fieldset>
</div>