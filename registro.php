<?php

if (isset($_POST['submit'])) {

    require_once('includes/conexion.php');

    // iniciar sesión
    if (!isset($_SESSION)) {
        session_start();
    }


    $nombre = isset($_POST['nombre']) ?  mysqli_real_escape_string($db, ucwords( $_POST['nombre'])) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, ucwords($_POST['apellidos'])) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

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
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía";
    }

    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        // ciframos el password para la bd
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //insertamos un usuario en la bd
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['completado'] = "Se registró correctamente";
        } else {
            $_SESSION['errores']['general'] = "Error al registrar !!";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
