<?php require_once('includes/redirecciones.php'); ?>
<?php require_once('includes/cabecera.php'); ?>
<?php require_once('includes/lateral.php'); ?>


<!--caja principal -->
<div id="principal">
    <h1>Crear Entradas</h1>
    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutas de nuetro contenido</p>
    <form action="guardar-entrada.php" method="post">
        <label for="titulo">Título de la entrada:</label>
        <input type="text" name="titulo" id="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion" cols="80" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría: </label>
        <select name="categoria">
            <option value="" selected disabled>Seleccione una Categoría</option>
            <?php
            $categorias = mostrarCategorias($db);
            if (!empty($categorias)) :

                foreach ($categorias as $categoria) :
            ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
            <?php endforeach;
            endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarErrores($_SESSION['errores_entrada'], 'categoria') : ''; ?>
        <br>
        <input type="submit" value="Guardar">
    </form>
            <?php borrarErrores(); ?>
</div> <!-- fin del principal-->
<!--pie de pagina-->
<?php require_once('includes/pie.php') ?>