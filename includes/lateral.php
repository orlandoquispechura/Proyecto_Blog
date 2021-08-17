<!--barra lateral-->
<aside id="lateral">

    <div id="login" class="bloque">
        <h3>Buscador</h3>

        <form action="buscador.php" method="post">
            <input type="text" name="buscador" id="buscador">

            <input type="submit" value="Buscar">
        </form>
    </div>
    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class="bloque">
            <h3><?= "Bienvenido: " . ' ' . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3>
            <a href="crear-entrada.php" class="boton-salir boton-verde">Crear entrada</a>
            <a href="crear-categoria.php" class="boton-salir boton-azul">Crear categoría</a>
            <a href="mis-datos.php" class="boton-salir boton-naranja">Mis datos</a>
            <a href="cerrar.php" class="boton-salir">Salir de Blog</a>
        </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['usuario'])) : ?>
        <div id="login" class="bloque">
            <h3>Ingresar a Blog</h3>
            <?php if (isset($_SESSION['error_login'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login'] ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Ingresar">
            </form>
        </div>
        <div id="registro" class="bloque">
            <h3>Registrarse</h3>
            <?php if (isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado'] ?>
                </div>
            <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['errores']['general'] ?>
                </div>
            <?php endif; ?>

            <form action="registro.php" method="post">

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
                <?php echo isset($_SESSION['errores']) ?  mostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos">
                <?php echo isset($_SESSION['errores']) ?  mostrarErrores($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <?php echo isset($_SESSION['errores']) ?  mostrarErrores($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
                <?php echo isset($_SESSION['errores']) ?  mostrarErrores($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" name="submit" value="Registrarse">
            </form>
            <?php borrarErrores(); ?>
        </div>
    <?php endif; ?>
</aside>