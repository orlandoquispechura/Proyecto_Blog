<?php

if (isset($_POST['submit'])) {

    require_once('includes/conexion.php');

    $nombre = isset($_POST['nombre']) ?  mysqli_real_escape_string($db, ucwords($_POST['nombre'])) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, ucwords($_POST['apellidos'])) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    // errores
    $errores = array();

    //validar los datos antes de guardarlo a la bd

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellidos'] = "Los apellidos no son válidos";
    }
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        //comprobar si el email ya exite
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);


        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
            //actualizamos un usuario en la bd
            $sql = "UPDATE usuarios SET nombre='$nombre', 
            apellidos='$apellidos', email='$email'
            WHERE id = " . $usuario['id'];

            $guardar = mysqli_query($db, $sql);

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "Se ha actualizado correctamente";
            } else {
                $_SESSION['errores']['general'] = "Error al actualizar !!";
            }
        } else {
            $_SESSION['errores'] = $errores;
            $_SESSION['errores']['general'] = "El email ya exíste !!";
        }
    }
}
header('Location: mis-datos.php');
