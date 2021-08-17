<?php require_once('includes/cabecera.php') ?>

<?php require_once('includes/lateral.php') ?>

<!--caja principal -->
<div id="principal">
    <h1>Todas las Entradas</h1>

    <?php
    $entradas = mostrarTodasEntradas($db);

    if (!empty($entradas)) :
        foreach ($entradas as $entrada) :
    ?>
            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?=$entrada['titulo'] ?></h2>
                    <span class="fecha"><?=$entrada['categoria'].' | '. $entrada['fecha'] ?></span>
                    <p><?=substr($entrada['descripcion'], 0, 180).'....'  ?></p>
                </a>
            </article>
    <?php endforeach;
    endif;
    ?>
    <a class="enlace-entrada" href="index.php">Regresar a Inicio</a>
</div> <!-- fin del principal-->

<!--pie de pagina-->
<?php require_once('includes/pie.php') ?>