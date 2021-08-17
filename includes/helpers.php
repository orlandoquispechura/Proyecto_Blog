
<?php

function mostrarErrores($errores, $campo)
{
    $alerta = "";
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
    }
    return $alerta;
}

function borrarErrores()
{
    $borrado = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }
    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }
    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}

function mostrarCategorias($db)
{
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($db, $sql);

    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    }
    return $resultado;
}
function mostrarCategoria($db, $id)
{
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categoria = mysqli_query($db, $sql);

    $resultado = array();
    if ($categoria && mysqli_num_rows($categoria) >= 1) {
        $resultado = mysqli_fetch_assoc($categoria);
    }
    return $resultado;
}

function mostrarUltimasEntradas($conexion)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
    INNER JOIN categorias c ON e.categoria_id = c.id
    ORDER BY e.id DESC LIMIT 4";

    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $resultado;
}
function mostrarTodasEntradas($conexion)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
    INNER JOIN categorias c ON e.categoria_id = c.id
    ORDER BY e.id DESC";

    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $resultado;
}

function mostrarEntradaCategoria($conexion, $categoria = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
    INNER JOIN categorias c ON e.categoria_id = c.id
    WHERE e.categoria_id = $categoria";

    $sql .= " ORDER BY e.id DESC";
  
    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $resultado;
}
function mostrarEntrada($db, $id)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradas e
    INNER JOIN categorias c ON e.categoria_id=c.id
    INNER JOIN usuarios u ON e.usuario_id=u.id
     WHERE e.id = $id";

    $entrada = mysqli_query($db, $sql);

    $resultado = array();
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}
function buscarEntrada($conexion, $buscador = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e 
    INNER JOIN categorias c ON e.categoria_id = c.id
    WHERE e.titulo LIKE '%$buscador%'";

    $sql .= " ORDER BY e.id DESC";
    
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $resultado;
}
