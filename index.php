<?php require_once('includes/cabecera.php') ?>

<?php require_once('includes/lateral.php') ?>

<!--caja principal -->
<div id="principal">
    <h1>Ultimas Entradas</h1>

    <?php
    $entradas = mostrarUltimasEntradas($db);
    
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
    <div id="ver-todas">
        <a  href="entradas.php">Ver todas las Entradas</a>
    </div>
</div> <!-- fin del principal-->

<!--pie de pagina-->
<?php require_once('includes/pie.php') ?>