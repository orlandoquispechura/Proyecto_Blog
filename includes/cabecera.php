<?php require_once('includes/conexion.php') ?>
<?php require_once('includes/helpers.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog de Videojuegos</title>
</head>

<body>
    <!--cabecera-->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">Blog de Videojuegos</a>
        </div>

        <!--menu-->

        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php
                $categorias = mostrarCategorias($db);
                foreach ($categorias as $categoria) :
                ?>
                    <li>
                        <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= ucwords($categoria['nombre']) ?></a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="#">Sobre Nosotros</a>
                </li>
                <li>
                    <a href="#">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    
    <div id="contenedor">