<?php
//iniciar la session y la bd 
require_once('includes/conexion.php');

//recoger datos del formulario
if (isset($_POST)) {

    //borrar session antigua
    if (isset($_SESSION['error_login'])) {
        session_unset();
    }
    //recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //hacer una consulta a la bd para verificar si coincide con algun registro 
    $sql = "SELECT * FROM usuarios where email = '$email'";
    $login = mysqli_query($db, $sql);
    
    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        //comprobar la contrasena / cifrar
        $verificar = password_verify($password, $usuario['password']);

        if ($verificar) {
            //utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
            
        }else {
            //si algo falla enviar una session con el fallo
            $_SESSION['error_login'] = "La contraseña y/o email son incorrectos";
        }
    }else {
        // mensaje de error al no encontrar al usaurio 
        $_SESSION['error_login'] = "La contraseña y/o email son incorrectos";

    }
}
//redirigir al index de la pagina
header("Location: index.php");









