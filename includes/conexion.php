<?php

$server='localhost';
$username='root';
$password='';
$database='blogvideojuego';

$db=mysqli_connect ($server, $username, $password, $database);

mysqli_query($db, "set NAMES 'utf8'");

//iniciar sesion

if (!isset($_SESSION)) {
    session_start();
}