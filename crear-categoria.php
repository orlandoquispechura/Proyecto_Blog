<?php require_once('includes/cabecera.php'); ?>
<?php require_once('includes/lateral.php'); ?>
<?php require_once('includes/redirecciones.php'); ?>

<!--caja principal -->
<div id="principal">
    <h1>Crear Categorías</h1>

    <p>Cree el nombre de la categoría para que los usuarios puedan crear sus entradas en el blog</p>
    <form action="guardar-categoria.php" method="post">
        <label for="nombre">Nombre de la Categoría:</label>
        <input type="text" name="nombre" id="nombre">
    <br>
        <input type="submit" value="Guardar">
    </form>


</div> <!-- fin del principal-->
<!--pie de pagina--> 
<?php require_once('includes/pie.php') ?>