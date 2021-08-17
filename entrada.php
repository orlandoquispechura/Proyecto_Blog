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

    <h1><?= $entrada_new['titulo'] ?></h1>

    <h2><?= $entrada_new['categoria'] ?></h2>
    <h4><?= $entrada_new['fecha'] ?> | <?=$entrada_new['usuario']?></h4>
    <p><?= $entrada_new['descripcion'] ?></p>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_new['usuario_id']) : ?>
        <a class="enlace-entrada" href="editar-entrada.php?id=<?=$entrada_new['id']?>">Editar entrada</a>
        <a class="enlace-entrada" href="eliminar-entrada.php?id=<?=$entrada_new['id']?>">Eliminar entrada</a>
    <?php endif; ?>
    <a class="enlace-entrada" href="index.php">Regresar a Inicio</a>
</div> <!-- fin del principal-->

<!--pie de pagina-->
<?php require_once('includes/pie.php') ?>