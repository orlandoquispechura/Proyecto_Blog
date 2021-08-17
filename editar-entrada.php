<?php require_once('includes/redirecciones.php'); ?>
<?php require_once('includes/conexion.php') ?>
<?php require_once('includes/helpers.php') ?>
<?php
$entrada_new = mostrarEntrada($db, $_GET['id']);

if (!isset($entrada_new['id'])) {
    header("Location: index.php");
}
?>

<?php require_once('includes/cabecera.php') ?>
<?php require_once('includes/lateral.php') ?>


<!--caja principal -->
<div id="principal">

    <h1>Editar Entrada</h1>
    <p>Edita tu entrada <?= $entrada_new['titulo'] ?></p>
    <form action="guardar-entrada.php?editar=<?=$entrada_new['id']?>" method="post">
        <label for="titulo">Título de la entrada:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $entrada_new['titulo'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarErrores($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion" cols="80" rows="10"><?= $entrada_new['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ?  mostrarErrores($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría: </label>
        <select name="categoria">
            <option value="" selected disabled>Seleccione una Categoría</option>
            <?php
            $categorias = mostrarCategorias($db);
            if (!empty($categorias)) :

                foreach ($categorias as $categoria) :
            ?>
                    <option value="<?= $categoria['id'] ?>"
                    <?=($categoria['id']==$entrada_new['categoria_id'] ? 'selected = "selected"' : '')?>>
                    <?= $categoria['nombre'] ?></option>
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