<?php

if (!isset($_POST['buscador'])) {
    header("Location: index.php");
}

?>

<?php require_once('includes/cabecera.php') ?>
<?php require_once('includes/lateral.php') ?>

<!--caja principal -->
<div id="principal">

    <h1>Busqueda: <?= $_POST['buscador'] ?></h1>

    <?php
    $entradas = buscarEntrada($db, $_POST['buscador']);
    
    if (!empty($entradas) && mysqli_num_rows($entradas)>=1) :
        foreach ($entradas as $entrada) :
    ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?= $entrada['titulo'] ?></h2>
                    <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                    <p><?= substr($entrada['descripcion'], 0, 180) . '....'  ?></p>
                </a>
            </article>
    <?php endforeach;
    else:
    ?>
     <div class="alerta">No hay entradas para esta Categoría</div>
     <?php endif; ?>

    <a class="enlace-entrada" href="index.php">Regresar a Inicio</a>
</div> <!-- fin del principal-->

<!--pie de pagina-->
<?php require_once('includes/pie.php') ?>